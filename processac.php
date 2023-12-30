<?php
include_once('config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_docente = $_POST["nome_docente"];
    $matricula = $_POST["matricula"]; 
    $usuario = $nome_docente;
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); 
    $email = $_POST["email"];

    if (empty($nome_docente) || empty($senha)|| empty($email) || empty($matricula) ) { 
      $_SESSION["mensagem_erro"] = "Preencha todos os campos!" . $stmt->error;
      header("Location: index.php?page=cadastro "); 
      exit();
    }


    if (
        empty($nome_docente) || empty($senha) || empty($email) || empty($matricula) ||
        strlen($nome_docente) < 3 || strlen($nome_docente) > 80 ||
        strlen($_POST["senha"]) < 6 || strlen($_POST["senha"]) > 90 ||
        strlen($email) < 5 || strlen($email) > 80 ||
        strlen($matricula) < 1 || strlen($matricula) > 10
    ) {
        $_SESSION["mensagem_erro"] = "Preencha todos <br> os campos com dados <br> válidos!";
        header("Location: index.php?page=cadastro");
        exit();
    }

    // Verificar se a matrícula já existe no banco de dados
    $verificar_matricula = "SELECT * FROM tbl_docente WHERE matricula = ?";
    $stmt_verificar_matricula = $conexao->prepare($verificar_matricula);
    $stmt_verificar_matricula->bind_param("s", $matricula);
    $stmt_verificar_matricula->execute();
    $stmt_verificar_matricula->store_result();

    if ($stmt_verificar_matricula->num_rows > 0) {
        $stmt_verificar_matricula->close();
        $_SESSION["usuario_existe"] = true;
        header("Location: index.php?page=cadastro");
        exit();
    }

     // Verificar se o e-mail já existe no banco de dados
     $verificar_email = "SELECT * FROM tbl_docente WHERE email = ?";
     $stmt_verificar_email = $conexao->prepare($verificar_email);
     $stmt_verificar_email->bind_param("s", $email);
     $stmt_verificar_email->execute();
     $stmt_verificar_email->store_result();
 
     if ($stmt_verificar_email->num_rows > 0) {
         $stmt_verificar_email->close();
         $_SESSION["usuario_existe"] = true;
         header("Location: index.php?page=cadastro");
         exit();
     }
 
  
    else { 
   
       // Inserir primeiro na tabela tbl_tipo_docente
   $sql_insert_tipo_docente = "INSERT INTO tbl_tipo_docente (descricao_tipo_docente) VALUES (?)";
   $stmt_tipo_docente = $conexao->prepare($sql_insert_tipo_docente);
   $stmt_tipo_docente->bind_param("s", $descricao_tipo_docente);
   $descricao_tipo_docente = "Professor"; 
   $stmt_tipo_docente->execute();
   $cod_tipo_docente = $conexao->insert_id;

   if (!$cod_tipo_docente) {
       $_SESSION["mensagem_erro"] = "Erro ao obter o código do tipo de docente.";
       header("Location: index.php?page=cadastro");
       exit();
   }

       $sql_insert_docente = "INSERT INTO tbl_docente (nome_docente, matricula, usuario, senha, email, cod_tipo_docente, ativo_inativo) 
       VALUES (?, ?, ?, ?, ?, ?, 1)";

        $stmt_docente = $conexao->prepare($sql_insert_docente);
        $stmt_docente->bind_param("sssssi", $nome_docente, $matricula, $usuario, $senha, $email, $cod_tipo_docente);

        


        if ($stmt_docente->execute()) {
            $_SESSION["status_cadastro"] = true;
            header("Location: index.php?page=cadastro"); // Redireciona em caso de sucesso
            $stmt_docente->close();
            $conexao->close();
            exit();
        } else {
            $_SESSION["mensagem_erro"] = "Ocorreu um erro durante o cadastro: " . $stmt_docente->error;
            header("Location: index.php?page=cadastro"); // Redireciona em caso de erro
            $stmt_docente->close();
            $conexao->close();
            exit();
        }
     
        }   
    }
    

?>