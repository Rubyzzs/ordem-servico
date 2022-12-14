<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega os dados que vieram do formulário
    $dat = $_POST['dat'];
    $hora = $_POST['hora'];
    $valor = $_POST['valor'];
    $cliente_id = $_POST['cliente_id'];
    $funcionario_id = pessoa()['IDFUN'];

    $obs = $_POST['obs'];

    // Cria a sql para armazenar os valores no banco
    $sql = "INSERT INTO ordemdeservico (dataOS, horarioOS, valorTotalOS, cliente_id, obs, funcionario_id, status) VALUES (:dat, :hora, :valor, :cliente_id, :obs, :funcionario_id, :status)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':dat'  => $dat,
        ':hora'  => $hora,
        ':valor'  => $valor,
        ':cliente_id' => $cliente_id,
        ':obs'  => $obs,
        ':funcionario_id' => $funcionario_id,
        ':status' => 'Aberto'
    ]);

    // Pega o ID do usuário cadastrado
    $id = $conexaoBanco->lastInsertId();

    if($id > 0){
        // Cliente cadastrado com sucessso
        header("Location: visualizar.php?id=$id");
    }else{
        // Deu errado
        header('Location: cadastrar.php');
    }