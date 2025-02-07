<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    // Menarik data dari admin_menu
    public function getMenu()
    {
        return $this->db->get('admin_menu')->result_array();
    }

    // Menarik data admin_menu berdasarkan ID
    public function getMenuById($id)
    {
        return $this->db->get_where('admin_menu', ['id' => $id])->row_array();
    }

    // Menambah menu baru ke admin_menu
    public function addMenu()
    {
        $data = [
            'menu' => $this->input->post('menu', true)
        ];
        $this->db->insert('admin_menu', $data);
    }

    // Memperbarui menu yang ada di admin_menu berdasarkan ID
    public function updateMenu($id)
    {
        $data = [
            'menu' => $this->input->post('menu', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('admin_menu', $data);
    }

    // Menghapus menu di admin_menu berdasarkan ID
    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin_menu');
    }

    // Menarik data dari admin_sub_menu berdasarkan menu_id
    public function getSubMenuByMenuId($menuId)
    {
        return $this->db->get_where('admin_sub_menu', ['menu_id' => $menuId])->result_array();
    }

    // Menambah sub menu baru ke admin_sub_menu
    public function addSubMenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu_id', true),
            'sub_menu' => $this->input->post('sub_menu', true)
        ];
        $this->db->insert('admin_sub_menu', $data);
    }

    // Memperbarui sub menu berdasarkan ID
    public function updateSubMenu($id)
    {
        $data = [
            'sub_menu' => $this->input->post('sub_menu', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('admin_sub_menu', $data);
    }

    // Menghapus sub menu berdasarkan ID
    public function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin_sub_menu');
    }
}
?>