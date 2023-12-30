<?php

    include('config.php');
    //print_r($_POST)
    
    //Variáveis da inserção
    $total_docente = 0; // Total do docente é a soma de todos os pontos, obtida por meio do foreach
    foreach ($_POST as $values) {
        $total_docente += intval($values);
    }
    $pontucao_docente = $total_docente; 
    /* Acredito que ter a pontuacao_docente e total_docente no banco serve para uma aplicação futura da aplicação */

    // Variável dos comprovantes
    /*  */

    // Declarada vaiza porque não foi foi exigido formulário cppd
    $pontuacao_cppd = 0;
    // Declarada vaiza porque não foi foi exigido formulário cppd
    $total_cppd = 0;
    
    //Aqui temos apenas o caminho do comprovante
    $comprovante = $_FILES['comprovante']["full_path"];

    //Upload do arquivo
    $caminho = "comprovantes/" . $_FILES['comprovante']['name'];
    move_uploaded_file($_FILES['comprovante']['tmp_name'], $caminho);

    $comando_insercao = "INSERT INTO tbl_intersticio_apendice (cod_intersticio, cod_apendice, pontuacao_docente, comprovante, pontuacao_cppd, total_docente, total_cppd) 
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($comando_insercao);
    $stmt->bind_param("iissiii", $cod_intersticio, $cod_apendice, $pontuacao_docente, $comprovante, $pontuacao_cppd, $total_docente, $total_cppd);
    
    $cod_intersticio = 1;  // Substitua pelo valor correto
    $cod_apendice = 1;     // Substitua pelo valor correto
    
    if ($stmt->execute()) {
        // Sucesso na execução
        $stmt->close();
        $conn->close();
        header("Location: http://localhost/layout/forms/contact.php");
        exit();
    } else {
        // Erro na execução
        $stmt->close();
        $conn->close();
        echo "Erro na inserção: " . $stmt->error;
        // Adapte conforme necessário para lidar com o erro
        exit();
    }
    