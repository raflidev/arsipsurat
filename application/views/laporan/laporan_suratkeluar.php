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
                <h2>Surat Masuk > <small>Laporan Surat Keluar</small></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data<small>Surat Keluar</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <?php
                    $from = isset($_GET['from']) ?  (date('Y-m-d', strtotime($_GET['from']))) : 0;
                    $to = isset($_GET['to']) ?  (date('Y-m-d', strtotime($_GET['to']))) : 0;
                    if(isset($from) && isset($to)){
                      $sql1  		= $this->db->query("SELECT * FROM tb_suratkeluar where tanggalkeluar_suratkeluar between '$from' and '$to' order by id_suratkeluar asc");
                      $total		= $sql1->num_rows();
                    }
                  ?>
                      <form action="<?= base_url('admin/laporan_suratkeluar') ?>"  name="download_suratmasuk" method="get" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="col-md-2 col-sm-2 col-xs-6">
                        <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                  <input type="text" value="<?= (isset($_GET['from'])) ? $_GET['from'] : date("m/d/Y")?>" class="form-control has-feedback-left" value="11/14/2001" id="single_cal3" name="from" aria-describedby="inputSuccess2Status3">
                                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                  <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </fieldset>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                        <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                  <input type="text" value="<?= (isset($_GET['to'])) ? $_GET['to'] : date("m/d/Y")?>" class="form-control has-feedback-left" id="single_cal4" name="to" aria-describedby="inputSuccess2Status4">
                                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                  <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </fieldset>
                        </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Filter</button></a>
                  <?php
                    if($total != 0){ ?>
                      <a href="<?= base_url('admin/laporan_suratkeluar_pdf?from='.$from.'&to='.$to.'') ?>" target="_blank"class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan PDF</a></a>

                    <?php }
                    ?>

                  </form>
                  <div class="x_content">
                              <?php
                                if ($total == 0) {
                                  echo"<center><h2>Belum Ada Data Surat Masuk</h2></center>";
                                }
                                else{?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th width="15%">Nomor Surat</th>
                          <th width="10%">Tanggal Keluar</th>
                          <th width="5%">Kode Surat</th>
                          <th width="10%">Tanggal Surat</th>
                          <th width="10%">Bagian</th>
                          <th width="15%">Kepada</th>
                          <th width="21%">Perihal</th>
                        </tr>
                      </thead>


                      <tbody>
                            <?php
                            
                            foreach($sql1->result_array() as $data){
                              echo'<tr>
                              <td>	'. $data['nomor_suratkeluar'].'  	</td>
                              <td>	'. $data['tanggalkeluar_suratkeluar'].'		</td>
                              <td>	'. $data['kode_suratkeluar'].'	</td>
                              <td>	'. $data['tanggalsurat_suratkeluar'].'	</td>
                              <td>	'. $data['nama_bagian'].'  		</td>
                              <td>	'. $data['kepada_suratkeluar'].'  		</td>
                              <td>  '. $data['perihal_suratkeluar'].'  </td> 
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