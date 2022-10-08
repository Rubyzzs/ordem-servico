<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $nomeCLI = $_POST['nome'];
    $endCLI = $_POST['endereco'];
    $telCLI = $_POST['telefone'];
    $emailCLI = $_POST['email'];
    $senha = $_POST['senha'];
    $cpfCLI = $_POST['cpf'];

    // Cria a sql para armazenar os valores no banco
    $sql = "INSERT INTO cliente (nomeCLI, endCLI, telCLI, emailCLI, cpfCLI) VALUES (:nomeCLI, :endCLI, :telCLI, :emailCLI, :cpfCLI)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nomeCLI'  => $nomeCLI,
        ':endCLI'  => $endCLI,
        ':telCLI'  => $telCLI,
        ':emailCLI'  => $emailCLI,
        ':cpfCLI'  => $cpfCLI
    ]);

    // Pega o ID do usuário cadastrado
    $id = $conexaoBanco->lastInsertId();

    // CRIART O USUARIO ASSOCIADO A ESTE CLIENTE colocar tipo usuario
    $sql = "INSERT INTO usuario (email, senha, id_usuario) VALUES (:email, :senha, :id_usuario)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':email'  => $emailCLI,
        ':senha'  => $senha,
        ':id_usuario' => $id
    ]);


    if($id > 0){
        // Cliente cadastrado com sucessso
        header("Location: visualizar.php?id=$id");
    }else{
        // Deu errado
        header('Location: cadastrar.php');
    }