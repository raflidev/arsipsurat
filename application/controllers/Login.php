<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

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
		$this->load->helper('url');
		$this->load->view('login/index');
	}
}