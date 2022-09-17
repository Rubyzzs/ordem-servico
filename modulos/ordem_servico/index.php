<?php
    include_once '../../config.php';

    // Busca os dados do banco
    $sql = "SELECT * FROM ordemdeservico";
    $ordens = retornaDados($sql);
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

                    <h1 class="text-center display-3">Lista de Ordens</h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Valor Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ordens as $ordem_servico){ ?>
                                <tr>
                                    <td><?= $ordem_servico+['IDOS'] ?></td>
                                    <td><?= $ordem_servico+['dataOS'] ?></td>
                                    <td><?= $ordem_servico+['horarioOS'] ?></td>
                                    <td><?= $ordem_servico+['valorTotalOS'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="visualizar.php?id=<?= $ordem_servico+['IDOS'] ?>"><i class="fa-regular fa-eye"></i></a>
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
