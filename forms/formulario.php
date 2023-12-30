<?php
  include("config.php");
session_start();

if (!isset($_SESSION['matricula']) || !isset($_SESSION['tipo_docente'])) {
    // Usuário não autenticado, redirecione para a página de login
    header("location: http://localhost/layout/");
    exit;
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Formulário de interstício</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <header>
    <h2>Apêndice B</h2>
    <h3>Formulário de pontuação - Das atividades de ensino</h3>
    <span id="total">Pontuação Total: 0</span>
  </header>
  <div class="container">
    <form action="intersticio.php" method="post" enctype="multipart/form-data">
      <?php 
        $sql = "SELECT desc_ativ_item FROM tbl_item_apendice WHERE (cod_apendice = 1)";
        $res = $conn->query($sql);
        $conn->close();
        $n_inc = 1; // Usado para colocar numeração em atributos HTML
        while($dados = $res->fetch_assoc()) {
          // Usando para colocar os números de casa inciso no início da descrição (exemplo: II, III, IV)
          $inciso = explode(".", $dados["desc_ativ_item"]);
          echo '<div class="container2 inciso ' . $n_inc . '" >';
          echo '<h4>Inciso ' . $inciso[0] . '</h4>';

          echo "<p>";
              
            echo $dados["desc_ativ_item"];
              
          echo "</p>";
            echo '<br/>';
            echo '<label for="p_inc'. $n_inc .'">Pontuação docente:</label><br>';
            echo '<input type="number"  class="ponto inciso '. $n_inc .'"  name="p_inc' . $n_inc .'" ><br>';
            echo '<button class="btn inc' . $n_inc . '" onclick="salvar(this.classList)">Salvar</button>';
            echo '&nbsp;';
            echo '<button class="btne inc' . $n_inc . '" onclick="editar(this.classList)">Editar</button>';
          echo '</div>';
          $n_inc ++;
        }       
      ?>
      <div class="container2">
        <p>
          A seguir, anexe todos os comprovantes para verificação das pontuações indicadas. Os comprovantes serão avaliados pela CPPD.
          <b>Favor anexar arquivo único!</b>
        </p>
        <br>
        <input type="file" name="comprovante">
      </div>
      <div class="container2">
        <p> Após finalizar o preenchimento do formulário não será possível editá-lo, sendo que o mesmo será enviado para a CPPD para conferência dos arquivos e pontuações declarados pelo docente.</p>
        <br>
        <input  type="submit" value="Finalizar"> &nbsp; <input type="reset" value="Limpar" onclick="limpar()">
      </div>
    </form>
  </div>
  <script src="script.js"></script>

</body>

</html>