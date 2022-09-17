<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $id = $_POST['IDSER'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    // Cria a sql para armazenar os valores no banco
    $sql = "UPDATE servico 
        SET 
            nome = :nome, 
            valor = :valor, 
            descricao = :descricao
        WHERE 
            IDSER = :id";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nome'  => $nome,
        ':valor'  => $valor,
        ':descricao'  => $descricao,
        ':id' => $id
    ]);

    // Cliente cadastrado com sucessso
    $msg = "Serviço atualizado com sucesso.";
    header("Location: visualizar.php?id=$id&msg=$msg");
