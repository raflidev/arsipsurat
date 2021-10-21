<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian_Model extends CI_Model
{
    private $_table = "tb_bagian";

    public $id_admin;
    public $nama_admin;
    public $username_admin;
    public $password;
    public $gambar;

    public function save()
    {
        $post = $this->input->post();
        $nama_bagian	            = $this->db->escape_str($_POST['nama_bagian']);
        $username_admin_bagian		= $this->db->escape_str($_POST['username_admin_bagian']);
        $password_bagian 	        = $this->db->escape_str(sha1($_POST['password_bagian']));
        $nama_lengkap	            = $this->db->escape_str($_POST['nama_lengkap']);
        $tanggal_lahir_bagian       = $this->db->escape_str($_POST['tanggal_lahir_bagian']);
        $alamat			            = $this->db->escape_str($_POST['alamat']);
        $no_hp_bagian	   	        = $this->db->escape_str($_POST['no_hp_bagian']);
        
        
        
        $tgl_lahir                  = date('Y-m-d', strtotime($tanggal_lahir_bagian));
        
        $data = array(
            'nama_bagian' => $nama_bagian,
            'username_admin_bagian' => $username_admin_bagian,
            'password_bagian' => $password_bagian,
            'nama_lengkap' => $nama_lengkap,
            'tanggal_lahir_bagian' => $tgl_lahir,
            'alamat' => $alamat,
            'no_hp_bagian' => $no_hp_bagian,
        );
        $query = $this->db->insert($this->_table, $data);
        return $query;
    }

    public function update()
    {
        $id				            = $this->db->escape_str($_POST['id_bagian']);
        $nama_bagian	            = $this->db->escape_str($_POST['nama_bagian']);
        $username_admin_bagian		= $this->db->escape_str($_POST['username_admin_bagian']);
        $password_bagian 	        = $this->db->escape_str(sha1($_POST['password_bagian']));
        $nama_lengkap	            = $this->db->escape_str($_POST['nama_lengkap']);
        $tanggal_lahir_bagian       = $this->db->escape_str($_POST['tanggal_lahir_bagian']);
        $alamat			            = $this->db->escape_str($_POST['alamat']);
        $no_hp_bagian	   	        = $this->db->escape_str($_POST['no_hp_bagian']);
        $tgl_lahir                  = date('Y-m-d', strtotime($tanggal_lahir_bagian));
        
        $sql  		= $this->db->query("SELECT * FROM tb_bagian where id_bagian='".$id."'");
        $data 		= $sql->row_array();


        $data = array(
            'nama_bagian' => $nama_bagian,
            'username_admin_bagian' => $username_admin_bagian,
            'password_bagian' => $password_bagian,
            'nama_lengkap' => $nama_lengkap,
            'tanggal_lahir_bagian' => $tgl_lahir,
            'alamat' => $alamat,
            'no_hp_bagian' => $no_hp_bagian,
        );

        $this->db->where('id_bagian', $id);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function delete()
    {
        if (isset($_GET['id_bagian'])) {

            $id = $_GET['id_bagian'];
                
        
            $sql2  		= $this->db->query("SELECT * FROM tb_bagian where id_bagian='".$id."'");
            $data2 		=  $sql2->row_array();
            $total		= $sql2->num_rows();
    
            if ($total == 0) {
                $this->session->set_flashdata('failed', 'Gagal menghapus data');
                redirect('admin/bagian');
            }else{
                $query = $this->db->delete($this->_table, array("id_bagian" => $id));
                if ($query){
                    $this->session->set_flashdata('success', 'Berhasil menghapus data');
                    redirect('admin/bagian');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal menghapus data');
                    redirect('admin/bagian');
                }
            }
        }	
    }
}
	