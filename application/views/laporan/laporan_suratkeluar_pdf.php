<!DOCTYPE html>
<?php
if($this->session->userdata('v4lid') == "bagian"){
  $this->session->set_flashdata('failed', 'Anda tidak punya hak akses');
  redirect('admin');
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                font-size:13px;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 3px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                text-align: left;
                background-color: #4d4d4d;
                color: white;
            }
            #ttd div{
              margin-left:420px;text-align:center;
            }
        </style>
    </head>
    <body>
        <?php
            $date = "01-".$_GET['bulan']."-2020";
        ?>
        <div style="text-align:center">
            <h3>LAPORAN SURAT KELUAR 
                <br>Surat Menyurat dan Kearsipan SMK 10 November
                <br><?= date('F', strtotime($date)) ?> <?= $_GET['tahun']; ?>
            </h3>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal Masuk</th>
                    <th>Kode</th>
                    <th>Nama Bagian</th>
                    <th>Nomor Surat</th>
                    <th>Kepada</th>
                    <th>Perihal</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($suratkeluar->result_array() as $data) { ?>
              <tr>
                <td scope="row"><?= $no ?></td>
                <td><?= date("d-m-Y", strtotime($data['tanggalkeluar_suratkeluar'])) ?></td>
                <td><?= $data['kode_suratkeluar'] ?></td>
                <td><?= $data['nama_bagian'] ?></td>
                <td><?= $data['nomor_suratkeluar'] ?></td>
                <td><?= $data['kepada_suratkeluar'] ?></td>
                <td><?= $data['perihal_suratkeluar'] ?></td>
              </tr>
             <?php
              $no++;
            } ?>
            </tbody>
        </table>
        
        <?php 
        
        // Mengubah base64 ke gambar

        $path = base_url('public/assets/ttd.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        ?>
        <div id="ttd">
          <div>
              <p>Bekasi, <?= date("d F Y") ?>
              <br>
              Ka. Prog. Tata Usaha</p>
              <img src="<?=$base64?>" width="150" alt="">
              <br>
              <span>Isnan Akbar, A.Md.,</span>
          </div>
        </div>
    </body>
</html>