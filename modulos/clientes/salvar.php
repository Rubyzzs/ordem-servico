<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $tel = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Cria a sql para armazenar os valores no banco
    $sql = "INSERT INTO cliente (nomeCLI, endCLI, telCLI, emailCLI, cpfCLI, cidade, estado) VALUES (:nome, :endereco, :tel, :email, :cpf, :cidade, :estado)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nome'  => $nome,
        ':endereco'  => $endereco,
        ':tel'  => $tel,
        ':email'  => $email,
        ':cpf'  => $cpf,
        ':cidade'  => $cidade,
        ':estado'  => $estado
    ]);

    // Pega o ID do usuário cadastrado
    $id = $conexaoBanco->lastInsertId();

    // CRIART O USUARIO ASSOCIADO A ESTE CLIENTE colocar tipo usuario
    $sql = "INSERT INTO usuario (email, senha, id_usuario, tipo_usuario) VALUES (:email, :senha, :id_usuario, :tipo_usuario)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':email'  => $email,
        ':senha'  => $senha,
        ':id_usuario' => $id,
        ':tipo_usuario' => 'cliente'
    ]);


    if($id > 0){
        // Cliente cadastrado com sucessso
        header("Location: visualizar.php?id=$id");
    }else{
        // Deu errado
        header('Location: cadastrar.php');
    }