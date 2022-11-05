<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    $id = $_GET['id'];

    // Cria a sql para armazenar os valores no banco
    $sql = "UPDATE ordemdeservico
        SET 
           status = :status
            
        WHERE 
            IDOS  = :id";

    // Passa os valores para a SQL
    $peparada  = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':status'    => 'Fechado',
        ':id'     => $id
    ]);
    // Ordem fechada com sucessso
    $msg = "Ordem fechada com sucesso";
    header("Location: visualizar.php?id=$id&msg=$msg");