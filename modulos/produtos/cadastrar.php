<?php
    include_once '../../config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once path('template/head.php') ?>
    <body class="sb-nav-fixed">
        <?php include_once path('template/navbar.php') ?>
        <div id="layoutSidenav">
            <?php include_once path('template/sidebar.php') ?>

            <div id="layoutSidenav_content" style="background-color: #F0F8FF;">
                <main class="container">
                    <div class="card-body p-3 mb-2 mt-3 rounded">
                        <form action="salvar.php" method="POST">
                        <h1 class="display-1 text-center">Cadastrar Produto</h1>
                            <div class="mb-3">
                                <label for="nome">Produto:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome do produto" required>
                            </div>

                            <div class="mb-3">
                                <label for="valor">Valor:</label>
                                <input type="number" name="valor" class="form-control" placeholder="00.00" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="descricao">Descrição do Produto:</label>
                                <textarea name="descricao" class="form-control"  rows="5" required></textarea>
                            </div>

                            <div class="text-end">
                                <input class="btn btn-primary" type="submit" name="submit" value="Cadastrar">
                            </div>
                        </form>
                    </div>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
