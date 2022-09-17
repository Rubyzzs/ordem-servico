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
    $sql = "SELECT * FROM servico WHERE IDSER = $id";
    $servico = retornaDado($sql);
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
                    
                    <h1><?= $servico['nome'] ?></h1>
                    <p>R$ <?= number_format($servico['valor'], 2, ',', '.') ?></p>
                    <p><?= $servico['descricao'] ?></p>

                    <hr>
                    <a href="editar.php?id=<?= $servico['IDSER'] ?>" class="btn btn-warning">Editar</a>
                    <a onclick="return confirm('Deseja realmente apagar o serviço?')" href="apagar.php?id=<?= $servico['IDSER'] ?>" class="btn btn-danger">Apagar</a>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
