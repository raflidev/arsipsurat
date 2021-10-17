<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model("suratmasuk_model");
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

    public function suratmasuk()
    { 
        $this->load->view('admin/admin_suratmasuk');
    }

    public function suratkeluar()
    { 
        $this->load->view('admin/admin_suratkeluar');
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
}