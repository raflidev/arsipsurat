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

    <?php $this->load->view('templates/tem_header'); ?>
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
                <h3>Bagian</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bagian ><small>Detail Bagian</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                     $id			= $this->db->escape_str($_GET['id_bagian']);
                     $sql  		= $this->db->query("SELECT * FROM tb_bagian where id_bagian='".$id."'");
                     $data 		= $sql->row_array();?>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Bagian </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td width="50%">ID</td>
                          <td><?php echo $data['id_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Nama Bagian</td>
                          <td><?php echo $data['nama_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Username Admin Bagian</td>
                          <td><?php echo $data['username_admin_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Nama Lengkap</td>
                          <td><?php echo $data['nama_lengkap']?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td><?php echo $data['tanggal_lahir_bagian']?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td><?php echo $data['alamat']?></td>
                        </tr>
                           <tr>
                          <td>No HP</td>
                          <td><?php echo $data['no_hp_bagian']?></td>
                        </tr>
                      </tbody>
                    </table> 
                    <div class="text-right">
                   <a href="<?= base_url('admin/bagian') ?>" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a></div>
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

    <?php $this->load->view('templates/tem_footer'); ?>
    	<script>
      $(document).ready(function() {
      $('#example').DataTable();
      } );
	  </script>
    <script type="text/javascript" language="JavaScript">
        function konfirmasi()
        {
        tanya = confirm("Anda Yakin Akan Menghapus Data ?");
        if (tanya == true) return true;
        else return false;
        }
    </script>

  </body>
</html>