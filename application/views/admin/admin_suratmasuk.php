<!DOCTYPE html>
<?php
// session_start();
// include "login/ceksession.php";
?>
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
                <h2>Surat Masuk > <small>Data Surat Masuk</small></h2>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data<small>Surat Masuk</small></h2>
                    <div class="clearfix"></div>
                  </div>
                      <form action="downloadlaporan_suratmasuk.php"  name="download_suratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="bulan" class="select2_single form-control" tabindex="-1">
                            <option>Pilih Bulan</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6">
                          <select name="tahun" class="select2_single form-control" tabindex="-1">
                            <option>Pilih Tahun</option>
                            <?php
                                for ($tahun=2017;$tahun<=2022;$tahun++)
                                      {
                                       echo  '<option value="'.$tahun.'">'.$tahun.'</option>';
                                      }
                            ?>
                          </select>
                        </div>
                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Unduh Laporan Surat Masuk</button></a>
                  <a href="<?= base_url('admin/input_suratmasuk') ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Surat Masuk</button></a>
                  </form>
                  <div class="x_content">
                  <div class="x_content">
                              <?php
                              $sql1  		= $this->db->query("SELECT * FROM tb_suratmasuk order by id_suratmasuk asc");
                              $total		= $sql1->num_rows();
                              if ($total == 0) {
                                echo"<center><h2>Belum Ada Data Surat Masuk</h2></center>";
                              }
                              else{?>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="3%">No Urut</th>
                          <th width="10%">Tanggal Masuk</th>
                          <th width="3%">Kode Surat</th>
                          <th width="10%">Tanggal Surat</th>
                          <th width="14%">Pengirim</th>
                          <th width="15%">Nomor Surat</th>
                          <th width="10%">Kepada</th>
                          <th width="25%">Perihal</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                            <?php
                            
                            foreach($sql1->result_array() as $data){
                              echo'<tr>
                              <td>	'. $data['nomorurut_suratmasuk'].'  	</td>
                              <td>	'. $data['tanggalmasuk_suratmasuk'].'		</td>
                              <td>	'. $data['kode_suratmasuk'].'	</td>
                              <td>	'. $data['tanggalsurat_suratmasuk'].'	</td>
                              <td>	'. $data['pengirim'].'  		</td>
                              <td>	'. $data['nomor_suratmasuk'].'  		</td>
                              <td>	'. $data['kepada_suratmasuk'].'		</td>
                              <td>  '. $data['perihal_suratmasuk'].'  </td> 
                              <td style="text-align:center;">
                              <a href= surat_masuk/'.$data['file_suratmasuk'].'><button type="button" title="Unduh File" class="btn btn-success btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href= downloaddisposisi.php?id_suratmasuk='.$data['id_suratmasuk'].'><button type="button" title="Unduh Disposisi" class="btn btn-info btn-xs"><i class="fa fa-download"></i></button></a>
                              <a href=detail-suratmasuk.php?id_suratmasuk='.$data['id_suratmasuk'].'><button type="button" title="Detail" class="btn btn-info btn-xs"><i class="fa fa-file-image-o"></i></button></a>
                              <a href=editsuratmasuk.php?id_suratmasuk='.$data['id_suratmasuk'].'><button type="button" title="Edit" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button></a>
                              <a onclick="return konfirmasi()" href="proses/proses_hapussuratmasuk.php?id_suratmasuk='.$data['id_suratmasuk'].'"><button type="button" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></a></td>
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