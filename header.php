<!DOCTYPE html>
<html lang="es">

<head>

<!--  Google tag (gtag.js) 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PFG131XFBZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-PFG131XFBZ');
  </script> -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Plétora</title>
  <meta content="Entender las leyes, tarea de todos" name="description">
  <meta content="Leyes" name="keywords">

  <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
  
  <!-- Favicons -->
  <link href="assets/img/title_logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>

  <!-- =======================================================
  * Template Name: ZenBlog - v1.1.0
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
  
		
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4G2DCPJB33"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4G2DCPJB33');
</script>


    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">

        <a href="index.php"><img src="assets/img/LOGOTIPO.png" width="
          60%" height="50%" alt="" class="img-fluid"></a>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="revistas.php">Edición Digital</a></li>
          <li class="dropdown"><a ><span>Categorías</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <?php
              include './query/funciones.php';
              require_once ('query/config.php');
              $result =categoria();
              $data = Array();
              while($row = mysqli_fetch_array($result)){
                  $data[]=$row;
              }
              foreach($data as $producto){
                $ID = $producto['id'];
                $categoria = $producto['categoria'];
              ?>
              <!-- <li><a href="resultados_categorias.html">Busca un Resultado</a></li> -->
              <li><a href="allnotice.php?id=<?php echo $ID?>&token=<?php echo hash_hmac('sha1',$ID, KEY_TOKEN);?>"><?php echo $categoria?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>

          <li><a href="nosotros.php">Sobre Nosotros</a></li>
          <li><a href="contactanos.php">Contáctanos</a></li>
          <li><a href="colaboradorespletora.php">Colaboradores</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <!-- <a href="https://www.facebook.com/profile.php?id=100085504076212" target="_blank" class="mx-2"><span
            class="bi-facebook"></span></a>
        <a href="https://twitter.com/PletoraLex" target="_blank" class="mx-2"><span class="bi-twitter"></span></a> -->
        <a href="#" class="mx-2 js-search-open"><!-- <span class="bi-search"></span> --></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div>

      </div>

    </div>

  </header><!-- End Header -->

  