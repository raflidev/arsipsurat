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
        if(isset($_SESSION['v4lid'])){
            redirect('admin');
        }
		$this->load->view('login/login_index');
	}
    public function check()
    {
        
        $post = $this->input->post();
        $username = $this->db->escape_str($post['username_admin']);
        $password = $this->db->escape_str(sha1($post['password']));
        $query = $this->db->query("SELECT * FROM tb_admin WHERE username_admin='$username' AND password='$password'");
        $data = $query->row_array();

        if(isset($data)){
            $this->session->set_userdata('v4lid', 'yes');
            $this->session->set_userdata('username', $data['username_admin']);
            $this->session->set_userdata('nama', $data['nama_admin']);
            $this->session->set_userdata('id', $data['id_admin']);
            $this->session->set_flashdata("success", "Login berhasil");
            redirect('admin');
        }else{
            $this->session->set_flashdata("failed", "username atau password anda salah");
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('v4lid','username','nama','id');

        redirect('login');
    }
}