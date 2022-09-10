<?php
    include_once '../../config.php';

    // Busca os dados do banco
    $sql = "SELECT * FROM cliente";
    $clientes = retornaDados($sql);
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

                    <h1 class="text-center display-3">Lista de Clientes</h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($clientes as $cliente){ ?>
                                <tr>
                                    <td><?= $cliente['IDCLI'] ?></td>
                                    <td><?= $cliente['nomeCLI'] ?></td>
                                    <td><?= $cliente['telCLI'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="visualizar.php?id=<?= $cliente['IDCLI'] ?>"><i class="fa-regular fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
