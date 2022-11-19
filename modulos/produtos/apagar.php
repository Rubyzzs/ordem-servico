<?php
    include_once '../../config.php';

    // Pega o ID que veio da URL
    if(empty($_GET['id'])){
        header('Location: index.php');
        exit;
    }else{
        $id = $_GET['id'];
    }

    // Busca os dados do banco
    $sql = "DELETE FROM produto WHERE IDPRO = :id";
    $prepara = $conexaoBanco->prepare($sql);

    $prepara->execute([
        ':id' => $id
    ]);

    $msg = "Produto apagado com sucesso!";
    header("Location: index.php?msg=$msg");
?>