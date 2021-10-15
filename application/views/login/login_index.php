<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Arsip Surat Kota Samarinda</title>

    <?php $this->load->view('templates/tem_header'); ?>
    <link rel="shortcut icon" href="../../img/icon.ico">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
              <?php
                if (isset($_SESSION['failed'])) {
                  echo "<div class='alert alert-danger text-danger'>".$_SESSION['failed']."</div>";
                }
              ?>
            <form action="<?= base_url('login/check') ?>" id="login" name="login" method="post">
              <h1>Login Admin</h1>
              <div class="form-group has-feedback">
                <input type="text" id="username" name="username_admin" class="form-control" autocomplete="off" maxlength="50" placeholder="Username" required="username" />
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" id="password" name="password" class="form-control" autocomplete="off" maxlength="50" placeholder="Password" required="password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div>
                <button type="submit" class="btn btn-primary form-control"><span class="glyphicon glyphicon-lock"></span> Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h2><i class="fa fa-institution"></i> PEMKOT SAMARINDA</h2>
                  <p>©2017 ILMU KOMPUTER UNMUL</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
