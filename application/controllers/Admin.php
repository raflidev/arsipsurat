<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model("suratmasuk_model");
        $this->load->model("suratkeluar_model");
        $this->load->model("arsipsuratmasuk_model");
        $this->load->model("arsipsuratkeluar_model");
        $this->load->model("bagian_model");
        $this->load->model("admin_model");
        $this->load->model("tu_model");
    }

    /**
    *
    * @param none
    * @return void
    **/
    public function index()
	{
        if (!isset($_SESSION['v4lid'])){
            redirect('login');
        }
		$this->load->view('admin/admin_index');
	}

    // CRUD SURATMASUK

    public function suratmasuk()
    { 
        $this->load->view('admin/admin_suratmasuk');
    }

    public function input_suratmasuk()
    {
        $this->load->view('suratmasuk/input_suratmasuk');
    }

    public function edit_suratmasuk()
    {
        $this->load->view('suratmasuk/edit_suratmasuk');
    }

    public function add_suratmasuk()
    {
        $query = $this->suratmasuk_model->save();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Input");
            redirect('admin/suratmasuk');       
        }else{
            $db_error =$this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/suratmasuk');       

        }
	}

    public function update_suratmasuk()
    {
        $query = $this->suratmasuk_model->update();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Edit");
            redirect('admin/suratmasuk');       
        }else{
            $db_error =$this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/suratmasuk');       

        }
    }

    public function delete_suratmasuk()
    {
        $this->suratmasuk_model->delete();
    }

    public function detail_suratmasuk()
    {
        $this->load->view('suratmasuk/detail_suratmasuk');
    }


    // CRUD SURATKELUAR

    public function suratkeluar()
    { 
        $this->load->view('admin/admin_suratkeluar');
    }

    public function input_suratkeluar()
    {
        $this->load->view('suratkeluar/input_suratkeluar');
    }

    public function edit_suratkeluar()
    {
        $this->load->view('suratkeluar/edit_suratkeluar');
    }

    public function add_suratkeluar()
    {
        $query = $this->suratkeluar_model->save();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Input");
            redirect('admin/suratkeluar');       
        }else{
            $db_error =$this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/suratkeluar');       

        }
    }

    public function update_suratkeluar()
    {
        $query = $this->suratkeluar_model->update();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Edit");
            redirect('admin/suratkeluar');       
        }else{
            $db_error =$this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/suratkeluar');       

        }
    }

    public function delete_suratkeluar()
    {
        $this->suratkeluar_model->delete();
    }

    public function detail_suratkeluar()
    {
        $this->load->view("suratkeluar/detail_suratkeluar");
    }

    // CRUD BAGIAN

    public function bagian()
    {
        $this->load->view('bagian/index_bagian');
    }

    public function detail_bagian()
    {
        $this->load->view('bagian/detail_bagian');
    }

    public function input_bagian()
    {
        $this->load->view('bagian/input_bagian');
    }
    
    public function add_bagian()
    {
        $query = $this->bagian_model->save();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Input");
            redirect('admin/bagian');       
        }else{
            $db_error = $this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/bagian');       

        }
    }

    public function edit_bagian()
    {
        $this->load->view('bagian/edit_bagian');
    }

    public function update_bagian()
    {
        $query = $this->bagian_model->update();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Edit");
            redirect('admin/bagian');       
        }else{
            $db_error =$this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/bagian');       

        }
    }

    public function delete_bagian()
    {
        $this->bagian_model->delete();
    }

    // LAPORAN SURAT MASUK


    public function laporan_suratmasuk()
    {
        $this->load->view('laporan/laporan_suratmasuk');
    }

    public function laporan_suratmasuk_pdf()
    {
        $from = date('Y-m-d', strtotime($_GET['from']));
        $to = date('Y-m-d', strtotime($_GET['to']) + 86400);
        $data['suratmasuk'] = $this->db->query("SELECT * FROM tb_suratmasuk where tanggalmasuk_suratmasuk between '$from' and '$to' order by id_suratmasuk asc");

        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-SM.pdf";
        $this->pdf->load_view('laporan/laporan_suratmasuk_pdf', $data);
    }


    public function laporan_suratkeluar()
    {
        $this->load->view('laporan/laporan_suratkeluar');
    }

    public function laporan_suratkeluar_pdf()
    {
        $from = date('Y-m-d', strtotime($_GET['from']));
        $to = date('Y-m-d', strtotime($_GET['to']) + 86400);
        $data['suratkeluar'] = $this->db->query("SELECT * FROM tb_suratkeluar where tanggalkeluar_suratkeluar between '$from' and '$to' order by id_suratkeluar asc");

        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-SK.pdf";
        $this->pdf->load_view('laporan/laporan_suratkeluar_pdf', $data);
    }

    // ARSIP

    public function arsip_suratmasuk()
    {
        $this->load->view('arsip/arsip_suratmasuk');
    }

    public function input_arsip_suratmasuk()
    {
        $id = $_GET['id_suratmasuk'];
        $query = $this->db->get_where("tb_arsip_suratmasuk", array('id_suratmasuk' => $id));
        if($query->num_rows() > 0){
            $this->session->set_flashdata("failed", "Surat sudah diarsipkan, silakan cek di menu arsip");
            redirect('admin/suratmasuk');
        }else{
            $this->load->view('arsip/input_arsip_suratmasuk');
        }

    }

    public function add_arsip_suratmasuk()
    {
        $query = $this->arsipsuratmasuk_model->save();
        if ($query == true) {
            $this->session->set_flashdata("success","Arsip berhasil");
            redirect('admin/suratmasuk');       
        }else{
            $db_error = $this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/suratmasuk');
        }
    }

    public function edit_arsip_suratmasuk()
    {
        $this->load->view('arsip/edit_arsip_suratmasuk');
    }

    public function update_arsip_suratmasuk()
    {
        $query = $this->arsipsuratmasuk_model->update();
        if ($query == true) {
            $this->session->set_flashdata("success","Arsip berhasil");
            redirect('admin/arsip_suratmasuk');       
        }else{
            $db_error = $this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/arsip_suratmasuk');
        }
    }

    public function delete_arsip_suratmasuk()
    {
        $this->arsipsuratmasuk_model->delete();
    }

    // DISPOSISI

    public function input_disposisi_suratmasuk()
    {
        $this->load->view('disposisi/input_disposisi_suratmasuk');
    }

    public function add_disposisi_suratmasuk()
    {
        $post = $this->input->post();
        $data = array(
            'id_suratmasuk' => $post['id_suratmasuk'],
            'pesan' => $post['pesan'],
            'id_bagian' => $this->session->userdata('id'),
        );
        $id_bagian = $this->session->userdata('id');
        $query2 = $this->db->query("SELECT * FROM tb_disposisi where id_suratmasuk = $post[id_suratmasuk] and id_bagian=$id_bagian");
        $num = $query2->num_rows();
        if($num > 0){
            $data = array(
                'pesan' => $post['pesan'],
            );

            $this->db->where('id_bagian', $id_bagian);
            $this->db->where('id_suratmasuk', $post['id_suratmasuk']);
            $query = $this->db->update('tb_disposisi', $data);
            if ($query == true) {
                $this->session->set_flashdata("success","Pesan berhasil diupdate");
                redirect('admin/suratmasuk');       
            }else{
                $db_error = $this->db->error();
                $this->session->set_flashdata("failed",$db_error['message']);
                redirect('admin/suratmasuk');
            }
            
        }else{
            $query = $this->db->insert("tb_disposisi", $data);
            if ($query == true) {
                $this->session->set_flashdata("success","Pesan berhasil ditambahakan");
                redirect('admin/suratmasuk');       
            }else{
                $db_error = $this->db->error();
                $this->session->set_flashdata("failed",$db_error['message']);
                redirect('admin/suratmasuk');
            }
        }

    }

    public function detail_disposisi()
    {
        $this->load->view('disposisi/detail_disposisi_suratmasuk');
    }

    // ARSIP SURAT KELUAR
    public function arsip_suratkeluar()
    {
        $this->load->view('arsip/arsip_suratkeluar');
    }

    public function input_arsip_suratkeluar()
    {
        $id = $_GET['id_suratkeluar'];
        $query = $this->db->get_where("tb_arsip_suratkeluar", array('id_suratkeluar' => $id));
        if($query->num_rows() > 0){
            $this->session->set_flashdata("failed", "Surat sudah diarsipkan, silakan cek di menu arsip");
            redirect('admin/suratkeluar');
        }else{
            $this->load->view('arsip/input_arsip_suratkeluar');
        }

    }

    public function add_arsip_suratkeluar()
    {
        $query = $this->arsipsuratkeluar_model->save();
        if ($query == true) {
            $this->session->set_flashdata("success","Arsip berhasil");
            redirect('admin/suratkeluar');       
        }else{
            $db_error = $this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/suratkeluar');
        }
    }

    public function edit_arsip_suratkeluar()
    {
        $this->load->view('arsip/edit_arsip_suratkeluar');
    }

    public function update_arsip_suratkeluar()
    {
        $query = $this->arsipsuratkeluar_model->update();
        if ($query == true) {
            $this->session->set_flashdata("success","Arsip berhasil");
            redirect('admin/arsip_suratkeluar');       
        }else{
            $db_error = $this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/arsip_suratkeluar');
        }
    }

    public function delete_arsip_suratkeluar()
    {
        $this->arsipsuratkeluar_model->delete();
    }

    // PROFIL
    public function profile()
    {
        $this->load->view('profil/profil_index');
    }


    // ADMIN

    public function admin()
    {
        $this->load->view('data_admin/index_admin');
    }

    public function input_admin()
    {
        $this->load->view('data_admin/input_admin');
    }

    public function add_admin()
    {
        $query = $this->admin_model->save();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Input");
            redirect('admin/admin');       
        }else{
            $db_error = $this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/admin');       

        }
    }

    public function edit_admin()
    {
        $this->load->view('data_admin/edit_admin');
    }

    public function update_admin()
    {
        $query = $this->admin_model->update();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Edit");
            redirect('admin/admin');       
        }else{
            $db_error =$this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/admin');       

        }
    }

    public function delete_admin()
    {
        $this->admin_model->delete();
    }

    // KEPALA SEKOLAH

    public function tu()
    {
        $this->load->view('tu/index_tu');
    }

    public function edit_tu()
    {
        $this->load->view('tu/edit_tu');
    }

    public function update_tu()
    {
        $query = $this->tu_model->update();
        if ($query == true) {
            $this->session->set_flashdata("success","Data berhasil di Edit");
            redirect('admin/tu');       
        }else{
            $db_error =$this->db->error();
            $this->session->set_flashdata("failed",$db_error['message']);
            redirect('admin/tu');       

        }
    }
}