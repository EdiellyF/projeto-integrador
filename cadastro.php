<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<body>
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['page']) && $_GET['page'] === 'login') {
                include('home.php');
            } else {
            ?>
            <?php
            if (isset($_SESSION['usuario_existe'])) {
                echo '<div class="alert alert-danger col-md-13 col-sm-13">Matrícula/Email <br> já cadastrado!</div>';
                unset($_SESSION['usuario_existe']);
            }

            if (isset($_SESSION['status_cadastro']) && $_SESSION['status_cadastro']) {
                echo '<div class="alert alert-success" role="alert">Cadastro bem-sucedido!</div>';
                unset($_SESSION['status_cadastro']);
            }

            if (isset($_SESSION["mensagem_erro"])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION["mensagem_erro"] . '</div>';
                unset($_SESSION["mensagem_erro"]);
            }
?>      
                <form class="col-md-13" action="processac.php" method="post">
                    <label for="usuario" class="lead">Nome</label>
                    <input type="text" name="nome_docente" id="nome" class="form-control">

                    <label for="matricula" class="lead">Matrícula</label>
                    <input type="text" name="matricula" id="matricula" class="form-control">

                    <label for="senha" class="lead">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control">

                    <label for="email" class="lead">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <input type="submit"  value="submit" class="btn btn-success mt-3">
                </form>
                <div class="mt-1">
                    <a href="?page=login">Volte para Login</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>