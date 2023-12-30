<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['matricula']) && isset($_POST['senha'])) {
        
        // Proteção contra SQL injection usando prepared statements
        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];
        
        $sql_codigo = "SELECT matricula, senha, cod_tipo_docente FROM tbl_docente WHERE matricula = ? LIMIT 1";
        $stmt = mysqli_prepare($conexao, $sql_codigo);
        mysqli_stmt_bind_param($stmt, "s", $matricula);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $dados = mysqli_fetch_assoc($result);

        if ($dados && password_verify($senha, $dados['senha'])) {
            $_SESSION['matricula'] = $matricula;
            $_SESSION['tipo_docente'] = $dados['cod_tipo_docente'];
            header("location: http://localhost/layout/forms/formulario.php");
            exit;
        } else {
            $erro_login = "<div class='alert alert-danger' role='alert'>Matrícula ou senha incorreta. </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<body>
    <section id="hero">
        <div class="hero-container" data-aos="fade-in">    
            <?php
            if (isset($_GET['page']) && $_GET['page'] === 'cadastro') {
                include('cadastro.php');
            } else {
            ?>
            <form action="" method="post" class="clearfix">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($erro_login)) {
                                echo '<p style="color: red;">' . $erro_login . '</p>';
                            }
                            ?>
                            <label for="matricula" class="lead">Matrícula</label>
                            <input type="text" name="matricula" id="matricula" class="form-control">

                            <label for="senha" class="lead">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control">
                        
                            <button type="submit" class="btn btn-success mt-3" name="submit">Entrar</button>
                        </div>
                    </div>
                </form> 
                <div class="mt-3">
                    <a href="?page=cadastro">Novo por aqui?Cadastra-se</a>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
</body>
</html>
