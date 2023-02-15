<?php
    include_once '../../config.php';

    // Busca os dados do banco
    $sql = "SELECT * FROM produto";
    $prudutos = retornaDados($sql);
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

                    <h1 class="text-center display-3">Lista de produtos</h1>

                    <table class="table table-bordered table-dark">
                   
                        <thead>
                
                            <tr style="text-align:center">
                            
                                <th>#</th>
                                <th>Nome</th>
                                <th>Valor</th>
                                <th></th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($prudutos as $produto){ ?>
                                <tr>
                                    <td style="text-align:center"><b><?= $produto['IDPRO'] ?></b></td>
                                    <td><?= $produto['nome'] ?></td>
                                    <td>R$ <?= number_format($produto['valor'], 2, ',', '.') ?></td>
                                    <td style="text-align:center">
                                        <a class="btn btn-secondary btn-sm" href="visualizar.php?id=<?= $produto['IDPRO'] ?>"><i class="fa-regular fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </table>
                    </thead>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
