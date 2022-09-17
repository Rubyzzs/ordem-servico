<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $id = $_POST['IDPRO'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    // Cria a sql para armazenar os valores no banco
    $sql = "UPDATE produto 
        SET 
            nomePRO = :nome, 
            valorPRO = :valor, 
            descricao = :descricao
        WHERE 
            IDPRO = :id";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':nome'  => $nome,
        ':valor'  => $valor,
        ':descricao'  => $descricao,
        ':id' => $id
    ]);

    // Cliente cadastrado com sucessso
    $msg = "Produto atualizado com sucesso";
    header("Location: visualizar.php?id=$id&msg=$msg");
