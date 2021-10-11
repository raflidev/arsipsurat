<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    /**
    *
    * @param none
    * @return void
    **/
    public function index()
	{
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
}