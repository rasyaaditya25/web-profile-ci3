    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Portfolio extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Portfolio_model');
            $this->load->library('form_validation');
        }

        public function index()
        {
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

            // Fetch all portfolio data
            $data['portfolios'] = $this->Portfolio_model->get_all_portfolios();

            // Load views
            $data['title'] = 'Project';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('portfolio/index', $data);
            $this->load->view('templates/footer');
        }

        public function web()
        {
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();;

            // Fetch all portfolio data
            $data['portfolios'] = $this->Portfolio_model->get_portfolios_by_category('Website');

            $data['title'] = 'Website Project';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('portfolio/portfolio_web', $data);
            $this->load->view('templates/footer');
        }

        public function games()
        {
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            // Fetch portfolio data based on 'Games' category
            $data['portfolios'] = $this->Portfolio_model->get_portfolios_by_category('Games');

            $data['title'] = 'Games Project';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('portfolio/portfolio_games', $data); // View for games
            $this->load->view('templates/footer');
        }

        public function addPortfolio()
        {
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('tentang', 'About Project', 'required');
            $this->form_validation->set_rules('judul_portfolio', 'Title Project', 'required');
            $this->form_validation->set_rules('deskripsi_portfolio', 'Description', 'required');
            $this->form_validation->set_rules('linking', 'URL Project', 'valid_url');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">All fields are required!</div>');
                redirect('portfolio');
            } else {
                $config['upload_path'] = './assets/img/portfolio_photo/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 5120; // Maximum size in KB (5MB)
    
                $this->load->library('upload', $config);

                $portfolio_foto = 'default.jpg'; // Default image
                if (!empty($_FILES['portfolio_foto']['name'])) {
                    if ($this->upload->do_upload('portfolio_foto')) {
                        $portfolio_foto = $this->upload->data('file_name'); // Get uploaded file name
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                        redirect('portfolio');
                    }
                }

                $data = [
                    'category' => $this->input->post('category'),
                    'tentang' => $this->input->post('tentang'),
                    'judul_portfolio' => $this->input->post('judul_portfolio'),
                    'deskripsi_portfolio' => $this->input->post('deskripsi_portfolio'),
                    'portfolio_foto' => $portfolio_foto,
                    'linking' => $this->input->post('linking'),
                ];

                if ($this->Portfolio_model->insert_portfolio($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">New project added successfully!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed to add new project!</div>');
                }
                redirect('portfolio');
            }
        }


        public function portfolio_edit($id)
        {
            $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'Edit Portfolio';

            // Get portfolio data by ID
            $data['portfolio'] = $this->Portfolio_model->get_portfolio_by_id($id);

            if (!$data['portfolio']) {
                show_404();
            }

            // Form validation rules
            $this->form_validation->set_rules('tentang', 'About Project', 'required');
            $this->form_validation->set_rules('judul_portfolio', 'Title Project', 'required');
            $this->form_validation->set_rules('deskripsi_portfolio', 'Description Project', 'required');
            $this->form_validation->set_rules('linking', 'Project URL', 'required|valid_url');

            if ($this->form_validation->run() == false) {
                // Load views
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('portfolio/portfolio_edit', $data);
                $this->load->view('templates/footer');
            } else {
                $postData = [
                    'category' => $this->input->post('category'),
                    'tentang' => $this->input->post('tentang'),
                    'judul_portfolio' => $this->input->post('judul_portfolio'),
                    'deskripsi_portfolio' => $this->input->post('deskripsi_portfolio'),
                    'linking' => $this->input->post('linking'),
                ];

                // Handle file upload
                if (!empty($_FILES['portfolio_foto']['name'])) {
                    $config['upload_path'] = './assets/img/portfolio_photo/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = 5120; // 5MB
    
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('portfolio_foto')) {
                        // Delete old image if it exists
                        $old_image = $data['portfolio']['portfolio_foto'];
                        if ($old_image && file_exists('./assets/img/portfolio_photo/' . $old_image)) {
                            unlink('./assets/img/portfolio_photo/' . $old_image);
                        }

                        // Update with new image name
                        $postData['portfolio_foto'] = $this->upload->data('file_name');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                        redirect('portfolio/edit/' . $id);
                    }
                }

                // Update portfolio data
                if ($this->Portfolio_model->update_portfolio($id, $postData)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Portfolio updated successfully!</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed to update portfolio!</div>');
                }
                redirect('portfolio');
            }
        }

        public function deletePortfolio($id)
        {
            // Ambil data portfolio berdasarkan ID
            $portfolio = $this->Portfolio_model->get_portfolio_by_id($id);

            // Hapus file gambar jika ada
            if ($portfolio && file_exists('./assets/img/portfolio_photo/' . $portfolio['portfolio_foto'])) {
                unlink('./assets/img/portfolio_photo/' . $portfolio['portfolio_foto']);
            }

            // Hapus data dari database
            $this->Portfolio_model->delete_portfolio($id);

            // Redirect kembali ke halaman portfolio dengan pesan sukses
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Project deleted successfully!</div>');
            redirect('portfolio');
        }


    }