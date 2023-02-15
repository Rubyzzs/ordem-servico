<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cnpj = $_POST['cnpj'];

    // Cria a sql para armazenar os valores no banco
    $sql = "INSERT INTO funcionario (nomeFUN, telFUN, emailFUN, cnpjFUN) VALUES (:nome, :telefone, :email, :cnpj)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nome'  => $nome,
        ':telefone'  => $telefone,
        ':email'  => $email,
        ':cnpj'  => $cnpj
    ]);

     // Pega o ID do usuário cadastrado
     $id = $conexaoBanco->lastInsertId();

    // CRIAR O USUARIO ASSOCIADO A ESTE CLIENTE 
    $sql = "INSERT INTO usuario (email, senha, id_usuario, tipo_usuario) VALUES (:email, :senha, :id_usuario, :tipo_usuario)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':email'  => $email,
        ':senha'  => $senha,
        ':id_usuario' => $id,
        ':tipo_usuario' => 'funcionario'
    ]);

    if($id > 0){
        // funcionario cadastrado com sucessso
        header("Location: visualizar.php?id=$id");
    }else{
        // Deu errado
        header('Location: cadastrar.php');
    }