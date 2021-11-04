<?php
			$sql  		= $this->db->query("SELECT * FROM tb_admin where id_admin='".$_SESSION['id']."'");                        
			$data 		= $sql->row_array();
?>
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url() ?>admin" class="site_title"><i class="fa fa-envelope"></i> <span> Arsip Surat</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix" style="padding-left:5px;">  
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?= $_SESSION['nama']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Dashboard</h3>
                <ul class="nav side-menu">
                  <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                   
                  </li>
                </ul>
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-file-text"></i> Kategori Surat <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/suratmasuk') ?>"><i class="fa  fa-inbox"></i>Surat Masuk</a></li>
                      <?php if($this->session->userdata('v4lid') == "admin"){ ?>
                      <li><a href="<?= base_url('admin/suratkeluar') ?>"><i class="fa fa-send"></i>Surat Keluar</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                  <?php if($this->session->userdata('v4lid') == "admin"){ ?>
                  <li><a><i class="fa fa-archive"></i> Arsip<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/arsip_suratmasuk') ?>"><i class="fa  fa-inbox"></i>Surat Masuk</a></li>
                      <li><a href="<?= base_url('admin/arsip_suratkeluar') ?>"><i class="fa fa-send"></i>Surat Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file"></i> Laporan<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('admin/laporan_suratmasuk') ?>"><i class="fa  fa-inbox"></i>Surat Masuk</a></li>
                      <li><a href="<?= base_url('admin/laporan_suratkeluar') ?>"><i class="fa fa-send"></i>Surat Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('admin/bagian')?>"><i class="fa  fa-inbox"></i>Data Bagian</a></li>
                      <li><a href="<?=base_url('admin/admin')?>"><i class="fa  fa-inbox"></i>Data Admin</a></li>
                      <li><a href="<?=base_url('admin/tu')?>"><i class="fa  fa-inbox"></i>Data Tata Usaha</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
