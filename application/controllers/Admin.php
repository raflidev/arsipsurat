<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model("suratmasuk_model");
        $this->load->model("suratkeluar_model");
        $this->load->model("arsipsuratmasuk_model");
        $this->load->model("bagian_model");
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
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $query = $this->db->query("select * from tb_suratmasuk where month(tanggalmasuk_suratmasuk) = ".$bulan." and year(tanggalmasuk_suratmasuk) = ".$tahun." order by id_suratmasuk asc");
        // var_dump($query);

        $nama_bulan = "";
        if($bulan == "01"){
            $nama_bulan = "JANUARI";
        }if($bulan == "02"){
            $nama_bulan = "FEBRUARI";
        }if($bulan == "03"){
            $nama_bulan = "MARET";
        }if($bulan == "04"){
            $nama_bulan = "APRIL";
        }if($bulan == "05"){
            $nama_bulan = "MEI";
        }if($bulan == "06"){
            $nama_bulan = "JUNI";
        }if($bulan == "07"){
            $nama_bulan = "JULI";
        }if($bulan == "08"){
            $nama_bulan = "AGUSTUS";
        }if($bulan == "09"){
            $nama_bulan = "SEPTEMBER";
        }if($bulan == "10"){
            $nama_bulan = "OKTOBER";
        }if($bulan == "11"){
            $nama_bulan = "NOVEMBER";
        }if($bulan == "12"){
            $nama_bulan = "DESEMBER";
        }

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'LAPORAN SURAT MASUK',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,7,"BULAN ".$nama_bulan." TAHUN ".$tahun." ",0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(7,6,'No',1,0);
        $pdf->Cell(29,6,'Tanggal Masuk',1,0);
        $pdf->Cell(12,6,'Kode',1,0);
        $pdf->Cell(55,6,'Pengirim',1,0);
        $pdf->Cell(55,6,'Nomor Surat',1,0);
        $pdf->Cell(35,6,'Kepada',1,1);
        $pdf->SetFont('Arial','',10);
        $i = 1;

        foreach ($query->result() as $row){
            $pdf->Cell(7,6,$i,1,0);
            $pdf->Cell(29,6,date("d-m-Y", strtotime($row->tanggalmasuk_suratmasuk)),1,0);
            $pdf->Cell(12,6,$row->kode_suratmasuk,1,0);
     
            if (strlen($row->pengirim) > 21){
                $pdf->Cell(55,6,substr($row->pengirim,0,21)."...",'LRTB', 'L', false);
            }else{
                $pdf->Cell(55,6,$row->pengirim,'LRTB', 'L', false);
            }
            $pdf->Cell(55,6,$row->nomor_suratmasuk,1,0); 
            $pdf->Cell(35,6,$row->kepada_suratmasuk,1,0);
            $pdf->Ln();
            $i++;
        }

        $pdf->Output();
    }

    public function laporan_suratmasuk_excel()
    {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Masuk');
        $sheet->setCellValue('C1', 'Kode');
        $sheet->setCellValue('D1', 'Pengirim');
        $sheet->setCellValue('E1', 'Nomor Surat');
        $sheet->setCellValue('F1', 'Kepada');

        $no = 1;
        $x = 2;
        $query = $this->db->query("select * from tb_suratmasuk where month(tanggalmasuk_suratmasuk) = ".$bulan." and year(tanggalmasuk_suratmasuk) = ".$tahun." order by id_suratmasuk asc");
        foreach($query->result() as $row) {
            $sheet->setCellValue('A'.$x, $no++);
            $sheet->setCellValue('B'.$x, date("d-m-Y", strtotime($row->tanggalmasuk_suratmasuk)));
            $sheet->setCellValue('C'.$x, $row->kode_suratmasuk);
            $sheet->setCellValue('D'.$x, $row->pengirim);
            $sheet->setCellValue('E'.$x, $row->nomor_suratmasuk);
            $sheet->setCellValue('F'.$x, $row->kepada_suratmasuk);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = "suratmasuk-$tahun-$bulan";
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function laporan_suratkeluar()
    {
        $this->load->view('laporan/laporan_suratkeluar');
    }

    public function laporan_suratkeluar_pdf()
    {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $query = $this->db->query("SELECT * FROM tb_suratkeluar where month(tanggalkeluar_suratkeluar) = ".$bulan." and year(tanggalkeluar_suratkeluar) = ".$tahun." order by id_suratkeluar asc");

        $nama_bulan = "";
        if($bulan == "01"){
            $nama_bulan = "JANUARI";
        }else if($bulan == "02"){
            $nama_bulan = "FEBRUARI";
        }else if($bulan == "03"){
            $nama_bulan = "MARET";
        }else if($bulan == "04"){
            $nama_bulan = "APRIL";
        }else if($bulan == "05"){
            $nama_bulan = "MEI";
        }else if($bulan == "06"){
            $nama_bulan = "JUNI";
        }else if($bulan == "07"){
            $nama_bulan = "JULI";
        }else if($bulan == "08"){
            $nama_bulan = "AGUSTUS";
        }else if($bulan == "09"){
            $nama_bulan = "SEPTEMBER";
        }else if($bulan == "10"){
            $nama_bulan = "OKTOBER";
        }else if($bulan == 11){
            $nama_bulan = "NOVEMBER";
        }else if($bulan == "12"){
            $nama_bulan = "DESEMBER";
        }

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'LAPORAN SURAT KELUAR',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,7,"BULAN ".$nama_bulan." TAHUN ".$tahun." ",0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(7,6,'No',1,0);
        $pdf->Cell(29,6,'Tanggal Masuk',1,0);
        $pdf->Cell(12,6,'Kode',1,0);
        $pdf->Cell(30,6,'Nama Bagian',1,0);
        $pdf->Cell(55,6,'Kepada',1,0);
        $pdf->Cell(60,6,'Perihal',1,1);
        $pdf->SetFont('Arial','',10);
        $i = 1;

        foreach ($query->result() as $row){
            $pdf->Cell(7,6,$i,1,0);
            $pdf->Cell(29,6,date("d-m-Y", strtotime($row->tanggalkeluar_suratkeluar)),1,0);
            $pdf->Cell(12,6,$row->kode_suratkeluar,1,0);
     
            if (strlen($row->nama_bagian) > 21){
                $pdf->Cell(30,6,substr($row->nama_bagian,0,21)."...",'LRTB', 'L', false);
            }else{
                $pdf->Cell(30,6,$row->nama_bagian,'LRTB', 'L', false);
            }

            if (strlen($row->kepada_suratkeluar) > 26){
                $pdf->Cell(55,6,substr($row->kepada_suratkeluar,0,26)."...",'LRTB', 'L', false);
            }else{
                $pdf->Cell(55,6,$row->kepada_suratkeluar,'LRTB', 'L', false);
            }
            // $pdf->Cell(55,6,$row->kepada_suratkeluar,1,0); 
            if (strlen($row->perihal_suratkeluar) > 30){
                $pdf->Cell(60,6,substr($row->perihal_suratkeluar,0,30)."...",'LRTB', 'L', false);
            }else{
                $pdf->Cell(60,6,$row->perihal_suratkeluar,'LRTB', 'L', false);
            }
            // $pdf->Cell(60,6,$row->perihal_suratkeluar,1,0);
            $pdf->Ln();
            $i++;
        }

        $pdf->Output();
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
}