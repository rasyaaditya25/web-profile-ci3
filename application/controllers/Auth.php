<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database(); // Pastikan database telah dimuat
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->_load_views('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email]', [
            'is_unique' => 'This email has already been registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]', [
            'matches' => 'Passwords do not match!',
            'min_length' => 'Password must be at least 6 characters long!'
        ]);
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->_load_views('auth/registration', $data);
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $this->db->db_select('web_profile'); // Pilih database
            $this->db->insert('admin', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your account has been created. Please login!</div>');
            redirect('auth');
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Mengambil data dari tabel admin pada database web_profile
        $this->db->db_select('web_profile'); // Pilih database
        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'email' => $admin['email'],
                    'username' => $admin['username'],
                    'id' => $admin['id']
                ];
                $this->session->set_userdata($data);
                redirect('admin/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    private function _load_views($view, $data = [])
    {
        $this->load->view('templates/auth_header', $data);
        $this->load->view($view);
        $this->load->view('templates/auth_footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}