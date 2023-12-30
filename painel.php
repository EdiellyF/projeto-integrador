<?php
  include("config.php");
session_start();





if (!isset($_SESSION['matricula']) || !isset($_SESSION['tipo_docente'])) {
    // Usuário não autenticado, redirecione para a página de login
    header("location: ./index.php");
    exit;
}
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
          
       
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->




<?php
  // Sua consulta SQL
    $matricula = $_SESSION['matricula'];
    $sql = "SELECT nome_docente FROM tbl_docente WHERE matricula = '$matricula'";
    // Executar a consulta
    $result = mysqli_query($conexao, $sql);
// Verificar se a consulta foi bem-sucedida
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $nome = $row['nome_docente'];
        echo "Bem-vindo, $nome!";
    } 
    mysqli_free_result($result);
} 
// Fechar a conexão com o banco de dados
mysqli_close($conexao);
?>



<footer class="footer-login">
     <img src="assets/img/hero-bg.png" alt="" srcset="">
    </footer>

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