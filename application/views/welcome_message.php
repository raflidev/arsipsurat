<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arsip Surat SMK 10 November </title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?=base_url('public/assets/bootstrap.min.css')?>" >
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?=base_url('public/assets/owl.carousel.min.css')?>">
    <!-- style css custom kita -->
    <link rel="stylesheet" href="<?=base_url('public/assets/style.css')?>">
  </head>
  <body>
    
    <header>
      <div class="container">
        <div class="row">
          
          <div class="col-md-8">
            <div class="brand">
              <div class="brand-name">
                <h1>SMK 10 November</h1>
                <h3>Sistem Informasi Pengelolaan Surat Menyurat dan Kearsipan</h3> 
              </div>
            </div>
          </div>
          
        </div> <!-- .row -->
      </div>  <!-- .container -->
    </header>
    
    <!-- section menu -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-biru"> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-biru"> <!-- letak .navbar-light -->
      <div class="container">
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link float-right " href="<?= base_url('login') ?>">Login</a>
            </li>
          
          </ul>
        </div>
      </div> <!-- .container --> 
    </nav>    
    
    <!-- section hero area -->
    <section class="my-banner" id="hero-area">
      <div id="slider-hero-nav">
        <div class="owl-carousel" id="slider-hero">
          <div class="slider-item">
            <div class="slider-item-img">
              <img src="<?=base_url('public/assets/banner-siswa.jpg')?>" alt="">
            </div>
          </div> <!-- .slider-item --> 
        </div>
      </div>
    </section> 
      
        
      
    <script src="<?=base_url('public/assets/jquery-3.3.1.slim.min.js')?>"></script>
    <script src="<?=base_url('public/assets/owl.carousel.min.js')?>"></script>
    <script src="<?=base_url('public/assets/main.js')?>"></script>
  	
  </body>
</html>
