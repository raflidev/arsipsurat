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
        //include("sidebarmenu.php");
        $this->load->view('admin/admin_sidebar');
        ?>
        <!-- /Profile and Sidebarmenu -->
        
        <!-- top navigation -->
        <?php
        //include("header.php");
        $this->load->view('admin/admin_header');

        ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php
                          if (isset($_SESSION['success'])) {?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?= $_SESSION['success']; ?>
                            </div>
                         <?php }
                        ?>
                            <br><br> 
                            <center>
                             <h1>Selamat Datang Di Sistem Informasi Pengelolaan Surat Menyurat dan Kearsipan SMK 10 November</h1>
                            </center>
                            <br><br>  
                        </div>
                      </div>
                                <?php
                                $sql1= $this->db->query("SELECT * FROM tb_suratmasuk");
                                $jumlah1   = $sql1->num_rows();
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-inbox"></i>
                          </div>
                          <div class="count"><?php echo "$jumlah1" ?></div>
                          <h3>Surat Masuk</h3>
                          <p>Telah diarsipkan</p>
                        </div>
                      </div>
                                <?php
                                $sql2 = $this->db->query("SELECT * FROM tb_suratkeluar");
                                $jumlah2   = $sql2->num_rows();
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-send"></i>
                          </div>
                          <div class="count"><?php echo "$jumlah2" ?></div>
                          <h3>Surat Keluar</h3>
                          <p>Telah Diarsipkan</p>
                        </div>
                      </div>
                                 <?php
                                $sql3 = $this->db->query("SELECT * FROM tb_bagian");
                                $jumlah3   = $sql3->num_rows();
                                  ?>
                      <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-group (alias)"></i>
                          </div>
                          <div class="count"><?php echo "$jumlah3" ?></div>

                          <h3>Bagian</h3>
                          <p>Telah Didaftarkan</p>
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
