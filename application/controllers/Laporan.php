<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Class untuk membuat laporan

class Laporan extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    /**
    * Fungsi untuk menampilkan menu laporan penerima bantuan
    * @param none
    * @return void
    **/
    public function laporan_pdf(){

        $this->db->select();
        $data['suratmasuk'] = $this->db->get("tb_suratmasuk");
    
        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    
    
    }
}