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
                <h3>Surat Masuk</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Masuk ><small>Tambah Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?=base_url('admin/add_suratmasuk')?>"  name="formsuratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input type='text' id="tanggalmasuk_suratmasuk" name="tanggalmasuk_suratmasuk" required="required" class="form-control" required="required" readonly="readonly" />
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
                          <input type="text" onkeyup="validAngka(this)" id="kode_suratmasuk" name="kode_suratmasuk" required="required" maxlength="7" placeholder="Masukkan Kode Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <?php
                          $sql2 		= $this->db->query("SELECT * FROM tb_suratmasuk ORDER BY nomorurut_suratmasuk DESC LIMIT 1");
                          $data     = $sql2->row_array();
                          $jumlah   = $sql2->num_rows();
                          $nomor = $data['nomorurut_suratmasuk'];
                          
                          
                          if ($jumlah =0){
                            $nomorbaru = "0001";
                          } else {
                            $nomormax = substr($nomor,0,4);
                            $nomorbaru = intval($nomormax)+1;
                            }

                            ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Urut <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo "$nomorbaru" ?>" type="text" onkeyup="validAngka(this)" id="nomorurut_suratmasuk" name="nomorurut_suratmasuk" required="required" maxlength="4" placeholder="Masukkan Nomor Urut Surat" class="form-control col-md-7 col-xs-12">
                          <br>Nomor Urut harus 4 Digit (Pastikan Lihat Nomor Sebelumnya)</br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="nomor_suratmasuk" name="nomor_suratmasuk" required="required" maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Surat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggal_suratmasuk" placeholder="First Name" aria-describedby="inputSuccess2Status3" required="required" readonly="readonly">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </fieldset>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pengirim <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="pengirim" name="pengirim" required="required" placeholder="Masukkan Asal/Pengirim Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Kepada <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="kepada_suratmasuk" name="kepada_suratmasuk" required="required" placeholder="Masukkan Tujuan Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="perihal_suratmasuk" name="perihal_suratmasuk" required="required" class="form-control" rows="3" placeholder='Masukkan Perihal Surat'></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="file_suratmasuk" accept="application/pdf" type="file" id="file_suratmasuk" class="form-control" autocomplete="off" required="required"/> *max 10mb 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $_SESSION['nama'];?>" type="text" id="operator" name="operator"  readonly="readonly" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 1 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi1" class="select2_single form-control" tabindex="-1">
                            <option></option>
                                <?php
                                $sql  		= $this->db->query("SELECT nama_bagian FROM tb_bagian");
                                foreach ($sql->result_array() as $data){
                                      echo '<option value="'.$data['nama_bagian'].'">'.$data['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 1 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                            <input type='text' id="tanggal_disposisi1" name="tanggal_disposisi1" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 2 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi2" class="select2_single form-control" tabindex="-1">
                            <option></option>
                                <?php
                                $sql  		= $this->db->query("SELECT nama_bagian FROM tb_bagian");                        
                                $query  	= mysqli_query($db, $sql);
                                foreach ($sql->result_array() as $data){
                                      echo '<option value="'.$data['nama_bagian'].'">'.$data['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 2</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' id="tanggal_disposisi2" name="tanggal_disposisi2" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi 3 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi3" class="select2_single form-control" tabindex="-1">
                            <option></option>
                                <?php
                                $sql  		= $this->db->query("SELECT nama_bagian FROM tb_bagian");                        
                                foreach ($sql->result_array() as $data){
                                      echo '<option value="'.$data['nama_bagian'].'">'.$data['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi 3 </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='datetimepicker7'>
                            <input type='text' id="tanggal_disposisi3" name="tanggal_disposisi3" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?= base_url('admin/suratmasuk')?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                          <button type="submit" name="input" value="Simpan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
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
