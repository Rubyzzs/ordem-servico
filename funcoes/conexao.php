<?php
    $tabela = "bdordemdeservico";
    $usuario = "root";
    $senha = "";
    $host = "localhost";

    $conexaoBanco = new PDO("mysql:host={$host};dbname={$tabela};charset=utf8", $usuario, $senha);
    $GLOBALS['conexaoBanco'] = $conexaoBanco;

    //
    // Retorna uma linha de dados do banco
    //
    function retornaDado($sql)
    {
        $pdo = $GLOBALS['conexaoBanco'];

        $resultado = $pdo->query($sql);
        return $resultado->fetch();
    }

    //
    // Retorna várias linhas de dados do banco
    //
    function retornaDados($sql)
    {
        $pdo = $GLOBALS['conexaoBanco'];

        $resultado = $pdo->query($sql);
        return $resultado->fetchAll();
    }
?>