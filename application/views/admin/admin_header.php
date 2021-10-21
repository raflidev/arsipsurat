<?php

$sql = $this->db->query("SELECT * FROM tb_admin where id_admin='".$_SESSION['id']."'");
$data = $sql->row_array();
?>
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   <?= $data['nama_admin'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"><i class="fa fa-user pull-right"></i> Profil</a></li>
                    <li><a href="<?= base_url('login/logout')?>"><i class="fa fa-sign-out pull-right" onclick="return confirm ('Apakah Anda Akan Keluar.?');"></i> Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>