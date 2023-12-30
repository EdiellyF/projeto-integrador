<?php
    include("config.php");

    $consultaData = "SELECT data_fim_intersticio FROM tbl_intersticio";
    $saida = $conn->query($consultaData);
    $data = $saida->fetch_assoc();
    $dtFim = new DateTime($data['data_fim_intersticio']);
    $dtAtual = new DateTime();
    if($dtAtual > $dtFim) {
      header("Location: http://localhost/forms/erro.php");
      exit();
    } else {
      header("Location: http://localhost/forms/formulario.php");
      exit();
    }
    

?>
