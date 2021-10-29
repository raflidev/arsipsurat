<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Kota Samarinda </title>

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
                    $bulan = (isset($_GET['bulan'])) ?  $_GET['bulan'] : 0;
                    $tahun = (isset($_GET['tahun'])) ?  $_GET['tahun'] : 0;
                    if(isset($bulan) && isset($tahun)){
                      $sql1  		= $this->db->query("SELECT * FROM tb_suratkeluar where month(tanggalkeluar_suratkeluar) = ".$bulan." and year(tanggalkeluar_suratkeluar) = ".$tahun." order by id_suratkeluar asc");
                      $total		= $sql1->num_rows();
                    }
                  ?>
                  <!-- downloadlaporan_suratmasuk.php -->
                      <form action="<?= base_url('admin/laporan_suratkeluar') ?>"  name="download_suratmasuk" method="get" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="col-md-2 col-sm-2 col-xs-6">
                        <select name="bulan" class="select2_single form-control" tabindex="-1">
                            <?php
                              $array_bulan = array(
                                "01" => "Januari",
                                "02" => "Februari",
                                "03" => "Maret",
                                "04" => "April",
                                "05" => "Mei",
                                "06" => "Juni",
                                "07" => "Juli",
                                "08" => "Agustus",
                                "09" => "September",
                                "10" => "Oktober",
                                "11" => "November",
                                "12" => "Desember"
                              );

                              if(isset($_GET['bulan']) && isset($_GET['tahun'])){
                              echo "<option value='".$bulan."' hidden>".$array_bulan[$bulan]."</option>";
                              } else {
                                echo "<option selected disabled hidden>Pilih Bulan</option>";
                              } ?>
                            <?php
                              foreach ($array_bulan as $data => $value) {
                                echo "<option value='".$data."'>".$value."</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="tahun" class="select2_single form-control" tabindex="-1">
                            <?php
                              if(isset($_GET['bulan']) && isset($_GET['tahun'])){
                                echo "<option value='".$tahun."' hidden>".$tahun."</option>";
                                } else {
                                  echo "<option selected disabled hidden>Pilih Tahun </option>";
                                } 
                                for ($thn=2017;$thn<=date("Y");$thn++)
                                      {
                                       echo  '<option value="'.$thn.'">'.$thn.'</option>';
                                      }
                            ?>
                          </select>
                        </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Filter</button></a>
                  <?php
                    if($bulan != 0 && $tahun != 0 && $total != 0){ ?>
                      <a href="<?= base_url('admin/laporan_suratkeluar_pdf?bulan='.$bulan.'&tahun='.$tahun.'') ?>" target="_blank"class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan PDF</a></a>

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
                          <th width="14%">Aksi</th>
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
                              <td style="text-align:center;">
                              <a href= '.base_url('public/surat_keluar/').$data['file_suratkeluar'].'><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href='.base_url('admin/detail_suratkeluar').'?id_suratkeluar='.$data['id_suratkeluar'].'><button type="button" title="Detail" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                              <a href='.base_url('admin/edit_suratkeluar').'?id_suratkeluar='.$data['id_suratkeluar'].'><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href='.base_url('admin/delete_suratkeluar').'?id_suratkeluar='.$data['id_suratkeluar'].'><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a></td>
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