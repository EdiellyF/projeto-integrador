<?php
// config.php

// Definição das credenciais do banco de dados
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("BASE", "progressao_funcional");

// Tentar estabelecer a conexão
$conexao = new mysqli(HOST, USER, PASS, BASE);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Configurar o conjunto de caracteres para UTF-8 (opcional)
if (!$conexao->set_charset("utf8")) {
    die("Erro ao configurar o conjunto de caracteres: " . $conexao->error);
}
?>
