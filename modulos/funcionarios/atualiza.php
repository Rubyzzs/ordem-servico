<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $id = $_POST['IDFUN'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];

    // Cria a sql para armazenar os valores no banco
    $sql = "UPDATE funcionario
        SET 
            nomeFUN = :nome, 
            telFUN = :telefone, 
            emailFUN = :email, 
            cnpjFUN = :cnpj
        WHERE 
            IDFUN = :id";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nome'  => $nome,
        ':telefone'  => $telefone,
        ':email'  => $email,
        ':cnpj'  => $cnpj,
        ':id' => $id
    ]);

    // funcionario cadastrado com sucessso
    $msg = "Funcionário atualizado com sucesso.";
    header("Location: visualizar.php?id=$id&msg=$msg");
