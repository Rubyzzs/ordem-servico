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
    $sql = "SELECT * FROM ordemdeservico JOIN cliente ON (cliente.IDCLI = ordemdeservico.cliente_id) WHERE IDOS = $id";
    $ordem_servico = retornaDado($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once path('template/head.php') ?>
    <body class="sb-nav-fixed">
        <?php include_once path('template/navbar.php') ?>
        <div id="layoutSidenav">
            <?php include_once path('template/sidebar.php') ?>

            <div id="layoutSidenav_content">
                <main class="container">
                    <?php include_once path('template/mensagem.php') ?>
                    
                    <h1><?= $ordem_servico['nomeCLI'] ?></h1>
                    <h1><?= $ordem_servico['dataOS'] ?></h1>
                    <p><?= $ordem_servico['horarioOS'] ?></p>
                    <p>R$ <?= number_format($ordem_servico['valorTotalOS'], 2, ',', '.') ?></p>
                    <p><?= $ordem_servico['obs'] ?></p>

                    <hr>
                    <a href="editar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-warning">Editar</a>
                    <a onclick="return confirm('Deseja realmente apagar o ordem_servico?')" href="apagar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-danger">Apagar</a>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
