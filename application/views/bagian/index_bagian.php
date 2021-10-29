<!DOCTYPE html>
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
                <h2>Bagian > <small>Data Bagian</small></h2>
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
                    <h2>Data ><small> Bagian</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <a href="<?= base_url('admin/input_bagian') ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Bagian</button></a>
                  <div class="x_content">
                  <div class="x_content">
                             <?php
                              $sql1  		=  $this->db->query("SELECT * FROM tb_bagian order by id_bagian asc");
                              $total		= $sql1->num_rows();
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data Bagian</h2></center>";
                              }
                              else{?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="15%">Nama Bagian</th>
                          <th width="10%">Username Admin</th>
                          <th width="15%">Nama</th>
                          <th width="10%">Tanggal Lahir</th>
                          <th width="20%">Alamat</th>
                          <th width="10%">No HP</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                            <?php
                            foreach($sql1->result_array() as $data){
                              echo'<tr>
                              <td>	'. $data['nama_bagian'].'		</td>
                              <td>	'. $data['username_admin_bagian'].'	</td>
                              <td>	'. $data['nama_lengkap'].'  		</td>
                              <td>	'. $data['tanggal_lahir_bagian'].'  	</td>
                              <td>	'. $data['alamat'].'		</td>
                              <td>  '. $data['no_hp_bagian'].'  </td>  
                              <td style="text-align:center;">
                              <a href='.base_url('admin/detail_bagian').'?id_bagian='.$data['id_bagian'].'><button type="button" title="Detail" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                              <a href='.base_url('admin/edit_bagian').'?id_bagian='.$data['id_bagian'].'><button type="button" title="Edit" class="btn btn-success btn-xs"><i class="fa  fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href="'.base_url('admin/delete_bagian').'?id_bagian='.$data['id_bagian'].'"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a></td>
                              </tr>';
                            }
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