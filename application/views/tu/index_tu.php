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
              <div class="title_right">
                <h2>Bagian > <small>Data Kepala Sekolah</small></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                  <?php
                    if (isset($_SESSION['success'])) {?>
                      <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $_SESSION['success']; ?>
                      </div>
                    <?php } else if(isset($_SESSION['failed'])) {
                  ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= $_SESSION['failed']; ?>
                      </div>
                  <?php } ?>
                    <h2>Data ><small>Kepala Sekolah</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="x_content">
                             <?php
                              $sql1  		=  $this->db->query("SELECT * FROM tb_tu order by id_tu asc");
                              $total		= $sql1->num_rows();
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data TU</h2></center>";
                              }
                              else{?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="15%">ID TU</th>
                          <th width="10%">Nama Kepala Tata Usaha</th>
                          <th width="10%">TTD</th>
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                            <?php
                            foreach($sql1->result_array() as $data){ ?>
                              <tr>
                              <td>	<?= $data['id_tu']?>		</td>
                              <td>	<?= $data['nama_tu']?>  		</td>
                              <?php 
                                if($data['ttd'] != NULL){ ?>
                                  <td> <img width="150" src="<?= base_url("/public/assets/ttd/").$data['ttd']?>" alt=""> </td>
                                  <?php }else{ ?>
                                    <td> </td>
                               <?php } ?>
                              <td style="text-align:center;">
                              <a href=<?=base_url('admin/edit_tu')?>?id_tu=<?=$data['id_tu']?>><button type="button" title="Edit" class="btn btn-success btn-xs"><i class="fa  fa-edit"></i></button></a>
                              </tr>';
                            <?php }
                            ?>
                      </tbody>
                    </table>
                  <?php } ?>
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