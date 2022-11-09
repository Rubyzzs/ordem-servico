<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $id       = $_POST['IDCLI'];
    $nome     = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email    = $_POST['email'];
    $cpf      = $_POST['cpf'];
    $cidade   = $_POST['cidade'];
    $estado   = $_POST['estado'];

    // Cria a sql para armazenar os valores no banco
    $sql = "UPDATE cliente 
        SET 
            nomeCLI  = :nome, 
            endCLI   = :endereco, 
            telCLI   = :telefone, 
            emailCLI = :email, 
            cpfCLI   = :cpf,
            cidade   = :cidade,
            estado   = :estado
        WHERE 
            IDCLI = :id";

    // Passa os valores para a SQL
    $peparada  = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nome'      => $nome,
        ':endereco'  => $endereco,
        ':telefone'  => $telefone,
        ':email'     => $email,
        ':cpf'       => $cpf,
        ':cidade'    => $cidade,
        ':estado'    => $estado,
        ':id'        => $id
    ]);

    // Cliente cadastrado com sucessso
    $msg = "Cliente atualizado com sucesso";
    header("Location: visualizar.php?id=$id&msg=$msg");
