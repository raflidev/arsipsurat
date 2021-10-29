<!DOCTYPE html>
<?php
if($this->session->userdata('v4lid') == "bagian"){
  $this->session->set_flashdata('failed', 'Anda tidak punya hak akses');
  redirect('admin');
}
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Arsip Surat SMK 10 November </title>
    <?php
        $this->load->view('templates/tem_header');
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Profile and Sidebarmenu -->
        <?php
        $this->load->view('admin/admin_sidebar');
    ?>
        <!-- /Profile and Sidebarmenu -->

        <!-- top navigation -->
        <?php
        $this->load->view('admin/admin_header');
    ?>
        <!-- /top navigation -->   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Surat Keluar</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Keluar ><small>Edit Surat Keluar</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?= base_url('admin/update_suratkeluar') ?>" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <?php
                            $id			= $this->db->escape_str($_GET['id_suratkeluar']);
                            $sql  		= $this->db->query("SELECT * FROM tb_suratkeluar where id_suratkeluar='".$id."'");
                            $data 		= $sql->row_array();
                            $tgl_keluar = $data['tanggalkeluar_suratkeluar'];
                            $tgl_keluar = date('m-d-Y H:i:s', strtotime($tgl_keluar));
                            $tgl_surat = $data['tanggalsurat_suratkeluar'];
                            $tgl_surat = date('m-d-Y', strtotime($tgl_surat));?>
                            
                      <input type=hidden name="id_suratkeluar" value="<?php echo $id;?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Keluar <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input value="<?php echo "$tgl_keluar" ?>" type='text' id="tanggalkeluar_suratkeluar" name="tanggalkeluar_suratkeluar" required="required" class="form-control" required="required" readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kode Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['kode_suratkeluar'];?>" type="text" onkeyup="validAngka(this)" id="kode_suratkeluar" name="kode_suratkeluar" required="required" maxlength="7" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                          <br><a href= "file/kode_klasifikasi_surat.xlsx"><b>Lihat Kode Klasifikasi Surat</b></a></br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['nomor_suratkeluar'];?>" type="text" id="nomor_suratkeluar" name="nomor_suratkeluar" required="required" maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                          <br>4 Digit Awal merupakan Nomor Surat (Pastikan Lihat Nomor Sebelumnya)</br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Bagian <span class="required">*</span> </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="nama_bagian" class="select2_single form-control" tabindex="-1">
                            <option value="<?php echo $data['nama_bagian'];?>"><?php echo $data['nama_bagian'];?></option>
                            <option></option>
                                <?php
                                $sql2  		= $this->db->query("SELECT nama_bagian FROM tb_bagian");
                                foreach ($sql2->result_array() as $data2){
                                      echo '<option value="'.$data2['nama_bagian'].'">'.$data2['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                                <input value="<?php echo "$tgl_surat" ?>" type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggalsurat_suratkeluar" placeholder="First Name" aria-describedby="inputSuccess2Status3" required="required" readonly="readonly">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </fieldset>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $data['kepada_suratkeluar'];?>" type="text" id="kepada_suratkeluar" name="kepada_suratkeluar" required="required" placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="perihal_suratkeluar" name="perihal_suratkeluar" required="required" class="form-control" rows="3" placeholder='Masukkan Perihal Surat'><?php echo $data['perihal_suratkeluar'];?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="file_suratkeluar" required="required" accept="application/pdf" type="file" id="file_suratkeluar" class="form-control" autocomplete="off"/><a href= "<?php echo 'surat_keluar/'.$data['file_suratkeluar'].''?>"><b>Lihat File Sebelumnya</b></a></input> (Maksimal 10 MB )
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator <span class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $_SESSION['nama'];?>" type="text" id="operator" name="operator" required="required" readonly="readonly" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="datasuratkeluar.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                          <button type="submit" name="update" value="Update" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <?php
        $this->load->view('templates/tem_footer');
    ?>
<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
<script language='javascript'>
function validAngka(a)
{
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
}
</script>
  </body>
</html>
