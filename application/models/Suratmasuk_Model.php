<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Suratmasuk_model extends CI_Model
{
    private $_table = "tb_suratmasuk";

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
        $tanggalmasuk_suratmasuk = $this->db->escape_str($post['tanggalmasuk_suratmasuk']);
        $kode_suratmasuk = $this->db->escape_str($post['kode_suratmasuk']);
        $nomorurut_suratmasuk = $this->db->escape_str($post['nomorurut_suratmasuk']);
        $nomor_suratmasuk = $this->db->escape_str($post['nomor_suratmasuk']);
        $tanggalsurat_suratmasuk = $this->db->escape_str($post['tanggalsurat_suratmasuk']);
        $pengirim = $this->db->escape_str($post['pengirim']);
        $kepada_suratmasuk = $this->db->escape_str($post['kepada_suratmasuk']);
        $perihal_suratmasuk = $this->db->escape_str($post['perihal_suratmasuk']);
        $operator = $this->db->escape_str($post['operator']);
        $disposisi1 = $this->db->escape_str($post['disposisi1']);
        $tanggal_disposisi1 = $this->db->escape_str($post['tanggal_disposisi1']);
        $disposisi2 = $this->db->escape_str($post['disposisi2']);
        $tanggal_disposisi2 = $this->db->escape_str($post['tanggal_disposisi2']);
        $disposisi3 = $this->db->escape_str($post['disposisi3']);
        $tanggal_disposisi3 = $this->db->escape_str($post['tanggal_disposisi3']);

        date_default_timezone_set('Asia/Jakarta'); 
		$tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
	
        $nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
        $nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
        $ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
        $tipe_file 		= $_FILES['file_suratmasuk']['type'];
        $ukuran_file 	= $_FILES['file_suratmasuk']['size'];
        $tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
        
        $tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
        $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
        $tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
        $tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
        $tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));
        if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){		
            
            $nama_baru = $thnNow.'-'.$nomorurut_suratmasuk . $ext_file;
            $path = "./public/surat_masuk/".$nama_baru;
            move_uploaded_file($tmp_file, $path);

            $data = array(
                'tanggalmasuk_suratmasuk' => $tgl_masuk,
                'kode_suratmasuk' => $kode_suratmasuk,
                'nomorurut_suratmasuk' => $nomorurut_suratmasuk,
                'nomor_suratmasuk' => $nomor_suratmasuk,
                'tanggalsurat_suratmasuk' => $tgl_masuk,
                'pengirim' => $pengirim,
                'kepada_suratmasuk' => $kepada_suratmasuk,
                'perihal_suratmasuk' => $perihal_suratmasuk,
                'file_suratmasuk' => $nama_baru,
                'operator' => $operator,
                'tanggal_entry' => $tanggal_entry,
                'disposisi1' =>  $disposisi1,
                'tanggal_disposisi1' => $tgl_disp1,
                'disposisi2' => $disposisi2,
                'tanggal_disposisi2' => $tgl_disp2,
                'disposisi3' => $disposisi3,
                'tanggal_disposisi3' => $tgl_disp3,
            );
            $this->db->db_debug = FALSE;
            $query = $this->db->insert($this->_table, $data);
            return $query;
        }
    }

    public function update()
    {
        $post = $this->input->post();
        $id = $this->db->escape_str($post['id_suratmasuk']);
        $tanggalmasuk_suratmasuk = $this->db->escape_str($post['tanggalmasuk_suratmasuk']);
        $kode_suratmasuk = $this->db->escape_str($post['kode_suratmasuk']);
        $nomorurut_suratmasuk = $this->db->escape_str($post['nomorurut_suratmasuk']);
        $nomor_suratmasuk = $this->db->escape_str($post['nomor_suratmasuk']);
        $tanggalsurat_suratmasuk = $this->db->escape_str($post['tanggalsurat_suratmasuk']);
        $pengirim = $this->db->escape_str($post['pengirim']);
        $kepada_suratmasuk = $this->db->escape_str($post['kepada_suratmasuk']);
        $perihal_suratmasuk = $this->db->escape_str($post['perihal_suratmasuk']);
        $operator = $this->db->escape_str($post['operator']);
        $disposisi1 = $this->db->escape_str($post['disposisi1']);
        $tanggal_disposisi1 = $this->db->escape_str($post['tanggal_disposisi1']);
        $disposisi2 = $this->db->escape_str($post['disposisi2']);
        $tanggal_disposisi2 = $this->db->escape_str($post['tanggal_disposisi2']);
        $disposisi3 = $this->db->escape_str($post['disposisi3']);
        $tanggal_disposisi3 = $this->db->escape_str($post['tanggal_disposisi3']);

        date_default_timezone_set('Asia/Jakarta'); 
        $tanggal_entry  = date("Y-m-d H:i:s");
        $thnNow = date("Y");
    
        $nama_file_lengkap 		= $_FILES['file_suratmasuk']['name'];
        $nama_file 		= substr($nama_file_lengkap, 0, strripos($nama_file_lengkap, '.'));
        $ext_file		= substr($nama_file_lengkap, strripos($nama_file_lengkap, '.'));
        $tipe_file 		= $_FILES['file_suratmasuk']['type'];
        $ukuran_file 	= $_FILES['file_suratmasuk']['size'];
        $tmp_file 		= $_FILES['file_suratmasuk']['tmp_name'];
        
        $tgl_masuk                  = date('Y-m-d H:i:s', strtotime($tanggalmasuk_suratmasuk));
        $tgl_surat                  = date('Y-m-d', strtotime($tanggalsurat_suratmasuk));
        $tgl_disp1                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi1));
        $tgl_disp2                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi2));
        $tgl_disp3                  = date('Y-m-d H:i:s', strtotime($tanggal_disposisi3));

        if (($tipe_file == "application/pdf") and ($ukuran_file <= 10340000)){		
            
            $nama_baru = $thnNow.'-'.$nomorurut_suratmasuk . $ext_file;
            $path = "./public/surat_masuk/".$nama_baru;
            move_uploaded_file($tmp_file, $path);

            $data = array(
                'tanggalmasuk_suratmasuk' => $tgl_masuk,
                'kode_suratmasuk' => $kode_suratmasuk,
                'nomorurut_suratmasuk' => $nomorurut_suratmasuk,
                'nomor_suratmasuk' => $nomor_suratmasuk,
                'tanggalsurat_suratmasuk' => $tgl_masuk,
                'pengirim' => $pengirim,
                'kepada_suratmasuk' => $kepada_suratmasuk,
                'perihal_suratmasuk' => $perihal_suratmasuk,
                'file_suratmasuk' => $nama_baru,
                'operator' => $operator,
                'tanggal_entry' => $tanggal_entry,
                'disposisi1' =>  $disposisi1,
                'tanggal_disposisi1' => $tgl_disp1,
                'disposisi2' => $disposisi2,
                'tanggal_disposisi2' => $tgl_disp2,
                'disposisi3' => $disposisi3,
                'tanggal_disposisi3' => $tgl_disp3,
            );
            $this->db->db_debug = FALSE;
            $this->db->where('id_suratmasuk', $id);
            $query = $this->db->update($this->_table, $data);
            return $query;
        }
        
    }

    public function delete()
    {
        if (isset($_GET['id_suratmasuk'])) {
            $id = $_GET['id_suratmasuk'];
            $sql  		= $this->db->query("SELECT * FROM tb_suratmasuk where id_suratmasuk='".$id."'");
            $data 		= $sql->row_array();
            $total		= $sql->num_rows();
        
            // cek hasil query
            if ($total == 0) {
                $this->session->set_flashdata('failed', 'Gagal menghapus data');
                redirect('admin/suratmasuk');

            } else {
                $query = $this->db->delete($this->_table, array("id_suratmasuk" => $id));
                if ($query){
                    unlink("./public/surat_masuk/".$data['file_suratmasuk']);
                    $this->session->set_flashdata('success', 'Berhasil menghapus data');
                    redirect('admin/suratmasuk');
                } else {
                    $this->session->set_flashdata('failed', 'Gagal menghapus data');
                    redirect('admin/suratmasuk');
                }
            }	
        }	
    }
}