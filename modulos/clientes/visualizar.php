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
    $sql = "SELECT * FROM cliente WHERE IDCLI = $id";
    $cliente = retornaDado($sql);
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

                    <div>
                        <div class="card-header text-white bg-primary bg-opacity-50 text-center">
                            <h1><b><?= $cliente['nomeCLI'] ?></b></h1>
                        </div>
                        <div class="card-body">
                            <div class="row float-left w-100">
                                <div class="col-3">
                                    <label for="">Telefone</label>
                                    <p><?= $cliente['telCLI'] ?></p>
                                </div>
                                <div>
                                    </div>
                                    <p><?= $cliente['endCLI'] ?></p>
                                    <p><?= $cliente['emailCLI'] ?></p>
                                    <p><?= $cliente['cpfCLI'] ?></p>
                                </div>   
                            </div>
                            
                            <hr>
                            <a href="editar.php?id=<?= $cliente['IDCLI'] ?>" class="btn btn-warning">Editar</a>
                            <a onclick="return confirm('Deseja realmente apagar o cliente?')" href="apagar.php?id=<?= $cliente['IDCLI'] ?>" class="btn btn-danger">Apagar</a>
                    </div>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
