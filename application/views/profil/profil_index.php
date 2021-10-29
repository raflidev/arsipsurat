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
            $this->load->view('admin/admin_header');
        ?>
        <!-- /Profile and Sidebarmenu -->

        <!-- top navigation -->
        <?php
            $this->load->view('admin/admin_sidebar');
        ?>
        <!-- /top navigation --> 

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profil Admin</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin ><small>Detail Admin</small></h2>
                    <div class="clearfix"></div>
                  </div>
                      <?php
                      $id			= $_SESSION['id'];
                      if($this->session->userdata('v4lid') == "bagian"){
                          $query = $this->db->query("SELECT * FROM tb_bagian where id_bagian='".$id."'");
                      }else{
                          $query  	= $this->db->query("SELECT * FROM tb_admin where id_admin='".$id."'");
                      }
                      $data 	= $query->row_array();
                      ?>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Detail Admin </h2>
                        </div>
                      </div>
                      <div class="x_content">
                    </div>
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <td>ID</td>
                          <td><?php 
                        if($this->session->userdata('v4lid') == "bagian"){
                            echo $data['id_bagian'];
                        }else{
                            echo $data['id_admin'];
                        }
                          ?></td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td><?php 
                        if($this->session->userdata('v4lid') == "bagian"){
                            echo $data['nama_bagian'];
                        }else{
                            echo $data['nama_admin'];
                        }
                          ?></td>
                        </tr>
                        <tr>
                          <td>Username</td>
                          <td><?php 
                        if($this->session->userdata('v4lid') == "bagian"){
                            echo $data['username_admin_bagian'];
                        }else{
                            echo $data['username_admin'];
                        }
                          ?></td>
                        </tr>
                      </tbody>
                    </table>

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

  </body>
</html>