<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Arsipsuratmasuk_model extends CI_Model
{
    private $_table = "tb_arsip_suratmasuk";

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
        $id_suratmasuk = $this->db->escape_str($post['id_suratmasuk']);
        $no_box = $this->db->escape_str($post['no_box']);
        $no_rak = $this->db->escape_str($post['no_rak']);
        $no_fisis = $this->db->escape_str($post['no_fisis']);

        $data = array(
            "id_suratmasuk" => $id_suratmasuk,
            "no_box" => $no_box,
            "no_rak" => $no_rak,
            "no_fisis" => $no_fisis
        );

        $query = $this->db->insert($this->_table, $data);
        return $query;
    }

    public function update()
    {
        $post = $this->input->post();
        $id_arsipmasuk = $this->db->escape_str($post['id_arsipmasuk']);
        $no_box = $this->db->escape_str($post['no_box']);
        $no_rak = $this->db->escape_str($post['no_rak']);
        $no_fisis = $this->db->escape_str($post['no_fisis']);
        var_dump($post);
        $data = array(
            "no_box" => $no_box,
            "no_rak" => $no_rak,
            "no_fisis" => $no_fisis
        );
        $this->db->db_debug = FALSE;
        $this->db->where('id_arsipmasuk', $id_arsipmasuk);
        $query = $this->db->update($this->_table, $data);
        return $query;
        
    }

    public function delete()
    {
        if (isset($_GET['id_arsipmasuk'])) {
            $id = $_GET['id_arsipmasuk'];
            $sql  		= $this->db->query("SELECT * FROM $this->_table where id_arsipmasuk='".$id."'");
            $data 		= $sql->row_array();
            $total		= $sql->num_rows();
        
            // cek hasil query
            if ($total == 0) {
                $this->session->set_flashdata('failed', 'Gagal menghapus data');
                redirect('admin/arsip_suratmasuk');

            } else {
                $query = $this->db->delete($this->_table, array("id_arsipmasuk" => $id));
                if ($query){
                    $this->session->set_flashdata('success', 'Berhasil menghapus data');
                    redirect('admin/arsip_suratmasuk');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal menghapus data');
                    redirect('admin/arsip_suratmasuk');
                }
            }	
        }	
    }
}