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
        // var_dump($this->db->get('tb_admin')->result());
		$this->load->helper('url');
		$this->load->view('admin/admin_index');
	}
}