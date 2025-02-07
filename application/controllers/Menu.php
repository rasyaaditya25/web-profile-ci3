<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->model('Submenu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->getMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success">New menu added!</div>');
            redirect('menu');
        }
    }

    public function edit_menu($id)
    {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->getMenuById($id);

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->updateMenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Menu updated successfully!</div>');
            redirect('menu');
        }
    }

    public function delete_menu($id)
    {
        $this->Menu_model->deleteMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Menu deleted!</div>');
        redirect('menu');
    }

    public function Submenu()
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['subMenu'] = $this->Submenu_model->getSubMenu();
        $data['menu'] = $this->db->get('admin_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('admin_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function delete_submenu($id)
    {
        $this->Submenu_model->delete_submenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been deleted!</div>');
        redirect('menu/submenu');
    }

    public function edit_submenu($id)
    {
        $data['title'] = 'Edit Submenu';
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->Submenu_model->getSubmenuById($id);

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Submenu_model->updateSubmenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Submenu has been updated!</div>');
            redirect('menu/submenu');
        }
    }
}
