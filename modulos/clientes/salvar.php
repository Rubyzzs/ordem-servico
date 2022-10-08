<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $nomeCLI = $_POST['nomeCLI'];
    $endCLI = $_POST['endCLI'];
    $telCLI = $_POST['telCLI'];
    $emailCLI = $_POST['emailCLI'];
    $cpfCLI = $_POST['cpfCLI'];

    // Cria a sql para armazenar os valores no banco
    $sql = "INSERT INTO cliente (nomeCLI, endCLI, telCLI, emailCLICLI, cpfCLICLI) VALUES (:nomeCLI, :endCLI, :telCLI, :emailCLI, :cpfCLI)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nomeCLI'  => $nomeCLI,
        ':endCLI'  => $endCLI,
        ':telCLI'  => $telCLI,
        ':emailCLI'  => $emailCLI,
        ':cpfCLI'  => $cpf
    ]);

    // CRIAR O USUARIO ASSOCIADO A ESTE CLIENTE

    // Pega o ID do usuário cadastrado
    $id = $conexaoBanco->lastInsertId();

    if($id > 0){
        // Cliente cadastrado com sucessso
        header("Location: visualizar.php?id=$id");
    }else{
        // Deu errado
        header('Location: cadastrar.php');
    }