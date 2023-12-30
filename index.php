<?php
  include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistema de Progressão Funcional do Docente</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

   <!-- Inclua o jQuery via CDN -->
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <h1></h1>
         <img src="assets\img\ifto.png" class="img-fluid" alt="Logomarca IFTO" /></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Login</a></li>
          <li><a class="nav-link scrollto" href="#about-us">Sobre</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  
  <main id="main">
  <!-- ======= Hero Section ======= -->
  <section id="hero">
      <?php include('login.php'); ?>
  </section><!-- End Hero Section -->

  <!-- ======= About Us Section ======= -->
  <section id="about-us" class="about-us padd-section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-center">
           
        <div class="section-title text-center">
          <h2>Sobre o Sistema de Progressão Funcional do Docente</h2>
        
        </div>
          <div class="col-md-5 col-lg-3">
            <img src="assets/img/home/home.png" alt="About" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-md-7 col-lg-5">
            <div class="about-content" data-aos="fade-left" data-aos-delay="100">
              <h2><span>Objetivos</span></h2>
              <p>O Sistema de Progressão Funcional do Docente, é uma plataforma online desenvolvida para docentes do Instituto Federal de Educação, Ciência e Tecnologia do Tocantins (IFTO) registrarem e acompanharem suas atividades acadêmicas.
              </p>
              <ul class="list-unstyled">
                <li><i class="vi bi-chevron-right"></i>Registro de Atividades</li>
                <li><i class="vi bi-chevron-right"></i>Avaliação Automatizada</li>
                <li><i class="vi bi-chevron-right"></i>Documentação e Acompanhamento</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer">  
  <div class="container">
      <div class="row">

        <div class="col-md-12 col-lg-4">
          <div class="footer-logo">
            <a class="navbar-brand" href="#">IFTO</a>
            <p>Instituto Federal do Tocantins - Campus Palmas</p>
          </div>
        </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>