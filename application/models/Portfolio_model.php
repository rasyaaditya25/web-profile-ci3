<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio_model extends CI_Model
{
    // Method untuk mengambil semua data portfolio
    public function get_all_portfolios()
    {
        return $this->db->get('portfolio')->result_array();
    }
    // Method untuk mengambil portfolio berdasarkan kategori
    public function get_portfolios_by_category($category)
    {
        $this->db->where('category', $category);
        return $this->db->get('portfolio')->result_array();
    }
    public function insert_portfolio($data)
    {
        return $this->db->insert('portfolio', $data);
    }

    public function get_portfolio_by_id($id)
    {
        return $this->db->get_where('portfolio', ['id_portfolio' => $id])->row_array();
    }

    public function update_portfolio($id, $data)
    {
        $this->db->where('id_portfolio', $id);
        return $this->db->update('portfolio', $data);
    }

    public function delete_portfolio($id)
    {
        $this->db->where('id_portfolio', $id);
        $this->db->delete('portfolio');
    }
}
