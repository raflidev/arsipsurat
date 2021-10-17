<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Arsip Surat Kota Samarinda </title>
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
                    <h2>Surat Keluar ><small>Detail Surat Keluar</small></h2>
                    <div class="clearfix"></div>
                  </div>
                     <?php
                     $id			= $this->db->escape_str($_GET['id_suratkeluar']);
                     $sql  		= $this->db->query("SELECT * FROM tb_suratkeluar where id_suratkeluar='".$id."'");
                     $data 		= $sql->row_array();?>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Surat Keluar </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>   
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="40%">Tanggal Keluar</td>
                          <td><?php echo $data['tanggalkeluar_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Kode Surat</td>
                          <td><?php echo $data['kode_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat</td>
                          <td><?php echo $data['nomor_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Nama Bagian</td>
                          <td><?php echo $data['nama_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Surat</td>
                          <td><?php echo $data['tanggalsurat_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Kepada</td>
                          <td><?php echo $data['kepada_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>Perihal</td>
                          <td><?php echo $data['perihal_suratkeluar']?></td>
                        </tr>
                        <tr>
                          <td>File</td>
                          <td><a href= "<?php echo 'surat_keluar/'.$data['file_suratkeluar'].''?>"><b>Unduh File</b></a></td>
                        </tr>
                        <tr>
                          <td>Operator</td>
                          <td><?php echo $data['operator']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Entry</td>
                          <td><?php echo $data['tanggal_entry']?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="text-right">
                   <a href="<?= base_url('admin/suratkeluar') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>

                  </div>
                     
                    </div>
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
