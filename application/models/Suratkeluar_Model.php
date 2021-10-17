<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Suratkeluar_model extends CI_Model
{
    private $_table = "tb_suratkeluar";

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
        $tanggalkeluar_suratkeluar	        = $this->db->escape_str($_POST['tanggalkeluar_suratkeluar']);
        $kode_suratkeluar	                = $this->db->escape_str($_POST['kode_suratkeluar']);
        $nomor_suratkeluar	                = $this->db->escape_str($_POST['nomor_suratkeluar']);
        $nama_bagian	                    = $this->db->escape_str($_POST['nama_bagian']);
        $tanggalsurat_suratkeluar           = $this->db->escape_str($_POST['tanggalsurat_suratkeluar']);
        $kepada_suratkeluar		            = $this->db->escape_str($_POST['kepada_suratkeluar']);
        $perihal_suratkeluar   	            = $this->db->escape_str($_POST['perihal_suratkeluar']);
        $operator	                        = $this->db->escape_str($_POST['operator']);
        
            date_default_timezone_set('Asia/Jakarta'); 
            $tanggal_entry  = date("Y-m-d H:i:s");
            $thnNow = date("Y");
        
        $nama_file_lengkap 		= $_FILES['file_suratkeluar']['name'];
        $nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
        $ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
        $tipe_file 		= $_FILES['file_suratkeluar']['type'];
        $ukuran_file 	= $_FILES['file_suratkeluar']['size'];
        $tmp_file 		= $_FILES['file_suratkeluar']['tmp_name'];
        
        $tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
        $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));
        $ambilnomor                 = substr("$nomor_suratkeluar",0,4);

       
        if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){		
            
            
            $nama_baru = $thnNow.'-'.$ambilnomor. $ext_file;
            $path = "./public/surat_keluar/".$nama_baru;
            move_uploaded_file($tmp_file, $path);
            

            $data = array(
                'tanggalkeluar_suratkeluar' => $tgl_keluar,
                'kode_suratkeluar' => $kode_suratkeluar,
                'nomor_suratkeluar' => $nomor_suratkeluar,
                'nama_bagian' => $nama_bagian,
                'tanggalsurat_suratkeluar' => $tgl_surat,
                'kepada_suratkeluar' => $kepada_suratkeluar,
                'perihal_suratkeluar' => $perihal_suratkeluar,
                'file_suratkeluar' => $nama_baru,
                'operator' => $operator,
                'tanggal_entry' => $tanggal_entry,
            );
       
            $this->db->db_debug = FALSE;
            $query = $this->db->insert($this->_table, $data);
            return $query;
        }
    }

    public function update()
    {
        $post = $this->input->post();

        $id				           		    = $this->db->escape_str($_POST['id_suratkeluar']);
        $tanggalkeluar_suratkeluar	        = $this->db->escape_str($_POST['tanggalkeluar_suratkeluar']);
        $kode_suratkeluar	                = $this->db->escape_str($_POST['kode_suratkeluar']);
        $nomor_suratkeluar	                = $this->db->escape_str($_POST['nomor_suratkeluar']);
        $nama_bagian	                    = $this->db->escape_str($_POST['nama_bagian']);
        $tanggalsurat_suratkeluar           = $this->db->escape_str($_POST['tanggalsurat_suratkeluar']);
        $kepada_suratkeluar		            = $this->db->escape_str($_POST['kepada_suratkeluar']);
        $perihal_suratkeluar   	            = $this->db->escape_str($_POST['perihal_suratkeluar']);
        $operator	                        = $this->db->escape_str($_POST['operator']);

        $file_suratkeluar			            = $_FILES['file_suratkeluar']['name'];
        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
        $tgl_keluar                 = date('Y-m-d H:i:s', strtotime($tanggalkeluar_suratkeluar));
        $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratkeluar));
        $ambilnomor                 = substr("$nomor_suratkeluar",0,4);
        
        $sql  		= $this->db->query("SELECT * FROM tb_suratkeluar where id_suratkeluar='".$id."'");
        $data 		= $sql->result_array();
        $tipe_file 		= $_FILES['file_suratkeluar']['type'];
        $ukuran_file 	= $_FILES['file_suratkeluar']['size'];
		if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){	
			unlink("./public/surat_keluar/".$data['file_suratkeluar']);
			$ext_file		= substr($file_suratkeluar, strripos($file_suratkeluar, '.'));			
			$tmp_file 		= $_FILES['file_suratkeluar']['tmp_name'];
			
			$nama_baru = $thnNow.'-'.$ambilnomor. $ext_file;
			$path = "./public/surat_keluar/".$nama_baru;
			move_uploaded_file($tmp_file, $path);
			
			$data = array( 
                    'tanggalkeluar_suratkeluar'   => $tgl_keluar,
                    'kode_suratkeluar'    		=> $kode_suratkeluar,
                    'nomor_suratkeluar' 			=> $nomor_suratkeluar,
                    'nama_bagian'                 => $nama_bagian,
                    'tanggalsurat_suratkeluar'	=> $tgl_surat,
                    'kepada_suratkeluar'          => $kepada_suratkeluar,
                    'perihal_suratkeluar'		    => $perihal_suratkeluar,
                    'operator'            	    => $operator,
                    'tanggal_entry'               => $tanggal_entry,
                    'file_suratkeluar'			=> $nama_baru,
                );
            $this->db->db_debug = FALSE;
            $this->db->where('id_suratkeluar', $id);
            $query = $this->db->update($this->_table, $data);
            return $query;
        }
        
    }

    public function delete()
    {
        if (isset($_GET['id_suratkeluar'])) {
            $id = $_GET['id_suratkeluar'];
            $sql  		= $this->db->query("SELECT * FROM tb_suratkeluar where id_suratkeluar='".$id."'");
            $data 		= $sql->row_array();
            $total		= $sql->num_rows();
        
            // cek hasil query
            if ($total == 0) {
                $this->session->set_flashdata('failed', 'Gagal menghapus data');
                redirect('admin/suratkeluar');

            } else {
                $query = $this->db->delete($this->_table, array("id_suratkeluar" => $id));
                if ($query){
                    unlink("./public/surat_keluar/".$data['file_suratkeluar']);
                    $this->session->set_flashdata('success', 'Berhasil menghapus data');
                    redirect('admin/suratkeluar');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal menghapus data');
                    redirect('admin/suratkeluar');
                }
            }	
        }	
    }
}