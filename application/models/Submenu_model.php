<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submenu_model extends CI_Model
{
    // Mengambil data submenu beserta menu dari admin_menu
    public function getSubMenu()
    {
        $query = "SELECT `admin_sub_menu`.*, `admin_menu`.`menu`
                  FROM `admin_sub_menu`
                  JOIN `admin_menu`
                  ON `admin_sub_menu`.`menu_id` = `admin_menu`.`id`";

        return $this->db->query($query)->result_array();
    }

    // Menghapus submenu berdasarkan ID
    public function delete_submenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin_sub_menu');
    }

    // Mengambil data submenu berdasarkan ID
    public function ambil_id_submenu($id)
    {
        return $this->db->get_where('admin_sub_menu', ['id' => $id])->row_array();
    }

    // Menambahkan method untuk mengambil submenu berdasarkan ID
    public function getSubmenuById($id)
    {
        return $this->db->get_where('admin_sub_menu', ['id' => $id])->row_array();
    }

    // Memperbarui submenu berdasarkan ID
    public function updateSubmenu($id)
    {
        $data = [
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
        ];

        $this->db->where('id', $id);
        $this->db->update('admin_sub_menu', $data);
    }
}
?>