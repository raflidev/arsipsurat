<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "tb_admin";

    public $id_admin;
    public $nama_admin;
    public $username_admin;
    public $password;
    public $gambar;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();    
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_admin' => $id]->row());
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_admin = $post['nama'];
    }
}