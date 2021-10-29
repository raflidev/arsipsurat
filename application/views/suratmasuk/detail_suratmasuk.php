<!DOCTYPE html>
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
                    <h2>Surat Masuk ><small>Detail Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                     <?php
                     $id		= $this->db->escape_str($_GET['id_suratmasuk']);
                     $sql  		= $this->db->query("SELECT * FROM tb_suratmasuk where id_suratmasuk='".$id."'");
                     $data 		= $sql->row_array();?>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Surat Masuk </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>   
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="40%">Tanggal Masuk</td>
                          <td><?php echo $data['tanggalmasuk_suratmasuk']?></td>
                        </tr>
                        <tr>
                          <td>Kode Surat</td>
                          <td><?php echo $data['kode_suratmasuk']?></td>
                        </tr>
                        <tr>
                          <td>Nomor Urut</td>
                          <td><?php echo $data['nomorurut_suratmasuk']?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat</td>
                          <td><?php echo $data['nomor_suratmasuk']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Surat</td>
                          <td><?php echo $data['tanggalsurat_suratmasuk']?></td>
                        </tr>
                        <tr>
                          <td>Pengirim</td>
                          <td><?php echo $data['pengirim']?></td>
                        </tr>
                        <tr>
                          <td>Kepada</td>
                          <td><?php echo $data['kepada_suratmasuk']?></td>
                        </tr>
                        <tr>
                          <td>Perihal</td>
                          <td><?php echo $data['perihal_suratmasuk']?></td>
                        </tr>
                        <tr>
                          <td>File</td>
                          <td><a href= "<?= base_url('public/surat_masuk/'.$data['file_suratmasuk'].'')?>"><b>Unduh File</b></a></td>
                        </tr>
                        <tr>
                          <td>Operator</td>
                          <td><?php echo $data['operator']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Entry</td>
                          <td><?php echo $data['tanggal_entry']?></td>
                        </tr>
                        <tr>
                          <td>Disposisi 1</td>
                          <td><?php echo $data['disposisi1']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 1</td>
                          <td><?php echo $data['tanggal_disposisi1']?></td>
                        </tr>
                        <tr>
                          <td>Disposisi 2</td>
                          <td><?php echo $data['disposisi2']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 2</td>
                          <td><?php echo $data['tanggal_disposisi2']?></td>
                        </tr>
                         <tr>
                          <td>Disposisi 3</td>
                          <td><?php echo $data['disposisi3']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Disposisi 3</td>
                          <td><?php echo $data['tanggal_disposisi3']?></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="text-right">
                   <a href="<?= base_url('admin/suratmasuk') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>

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
