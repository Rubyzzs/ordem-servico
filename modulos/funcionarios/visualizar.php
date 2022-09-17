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
    $sql = "SELECT * FROM funcionario WHERE IDFUN = $id";
    $funcionario = retornaDado($sql);
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
                    
                    <h1><?= $funcionario['nomeFUN'] ?></h1>
                    <p><?= $funcionario['telFUN'] ?></p>

                    <hr>
                    <a href="editar.php?id=<?= $funcionario['IDFUN'] ?>" class="btn btn-warning">Editar</a>
                    <a onclick="return confirm('Deseja realmente apagar o funcionário?')" href="apagar.php?id=<?= $funcionario['IDFUN'] ?>" class="btn btn-danger">Apagar</a>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
