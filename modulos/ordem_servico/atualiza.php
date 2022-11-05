<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $id    = $_POST['IDOS'];
    $dat   = $_POST['dat'];
    $valor = $_POST['valor'];
    $hora  = $_POST['hora'];
    $obs   = $_POST['obs'];

    // Cria a sql para armazenar os valores no banco
    $sql = "UPDATE ordemdeservico
        SET 
            dataOS       = :dat, 
            valorTotalOS = :valor, 
            horarioOS    = :hora, 
            obs          = :obs
        WHERE 
            IDOS = :id";

    // Passa os valores para a SQL
    $peparada  = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':dat'    => $dat,
        ':valor'  => $valor,
        ':hora'    => $hora, 
        ':obs'    => $obs,
        ':id'     => $id
    ]);

    // Cliente cadastrado com sucessso
    $msg = "Ordem atualizada com sucesso";
    header("Location: visualizar.php?id=$id&msg=$msg");
