<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    // Cria a sql para armazenar os valores no banco
    $sql = "INSERT INTO cliente (nomeCLI, endCLI, telCLI, emailCLI, cpfCLI) VALUES (:nome, :endereco, :telefone, :email, :cpf)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nome'  => $nome,
        ':endereco'  => $endereco,
        ':telefone'  => $telefone,
        ':email'  => $email,
        ':cpf'  => $cpf
    ]);

    // Pega o ID do usuário cadastrado
    $id = $conexaoBanco->lastInsertId();

    if($id > 0){
        // Cliente cadastrado com sucessso
        header("Location: visualizar.php?id=$id");
    }else{
        // Deu errado
        header('Location: cadastrar.php');
    }