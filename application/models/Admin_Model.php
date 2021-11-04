<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    private $_table = "tb_admin";

    public $id_admin;
    public $nama_admin;
    public $username_admin;
    public $password;
    public $gambar;

    public function save()
    {
        $post = $this->input->post();
        $nama_admin	            = $this->db->escape_str($_POST['nama_admin']);
        $password	            = $this->db->escape_str(sha1($_POST['password']));
        $username_admin		= $this->db->escape_str($_POST['username_admin']);
        
        
        $data = array(
            'nama_admin' => $nama_admin,
            'username_admin' => $username_admin,
            'password' => $password,
        );
        $query = $this->db->insert($this->_table, $data);
        return $query;
    }

    public function update()
    {
        $id             = $this->db->escape_str($_POST['id_admin']);
        $nama_admin     = $this->db->escape_str($_POST['nama_admin']);
        $password       = $this->db->escape_str(sha1($_POST['password']));
        $username_admin = $this->db->escape_str($_POST['username_admin']);
        
        
        $sql  		= $this->db->query("SELECT * FROM $this->_table where id_admin='".$id."'");
        $data 		= $sql->row_array();

        $data = array(
            'nama_admin' => $nama_admin,
            'username_admin' => $username_admin,
            'password' => $password,
        );

        $this->db->where('id_admin', $id);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function delete()
    {
        if (isset($_GET['id_admin'])) {
            $id = $_GET['id_admin'];
        
            $sql2  		= $this->db->query("SELECT * FROM $this->_table where id_admin='".$id."'");
            $data2 		=  $sql2->row_array();
            $total		= $sql2->num_rows();
    
            if ($total == 0) {
                $this->session->set_flashdata('failed', 'Gagal menghapus data');
                redirect('admin/admin');
            }else{
                $query = $this->db->delete($this->_table, array("id_admin" => $id));
                if ($query){
                    $this->session->set_flashdata('success', 'Berhasil menghapus data');
                    redirect('admin/admin');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal menghapus data');
                    redirect('admin/admin');
                }
            }
        }	
    }
}
	