<?php
    // Inclui o arquivo de conexão com o banco
    include_once '../../config.php';

    // Pega o usuario logado 
    // $usuario = usuario();

    // Pega os dados que vieram do formulário
    $qtde = $_POST['qtde'];
    $valorUnit = $_POST['valor'];
    $valorTotal = $qtde * $valorUnit;
    $IDOS_FK = $_POST['IDOS'];
    $IDPRO_FK = $_POST['produto_id'];
    $observacao = $_POST['observacao'];
    // $funcionario_id = $usuario['IDFUN'];


    // Cria a sql para armazenar os valores no banco
    $sql = "INSERT INTO itemproduto (qtde, valorUnit, valorTotal, observacao, IDOS_FK, IDPRO_FK) VALUES (:qtde, :valorUnit, :valorTotal, :observacao, :IDOS_FK, :IDPRO_FK)";

    // Passa os valores para a SQL
    $peparada = $conexaoBanco->prepare($sql);
    $resultado = $peparada->execute([
        ':qtde'  => $qtde,
        ':valorUnit'  => $valorUnit,
        ':valorTotal'  => $valorTotal,
        ':IDOS_FK' => $IDOS_FK,
        ':observacao'  => $observacao,
        ':IDPRO_FK' => $IDPRO_FK
    ]);

    // Pega o ID do usuário cadastrado
    $id = $conexaoBanco->lastInsertId();

    if($id > 0){
        // Cliente cadastrado com sucessso
        header("Location: visualizar.php?id=$IDOS_FK");
    }else{
        // Deu errado
        header('Location: cadastrar.php');
    }