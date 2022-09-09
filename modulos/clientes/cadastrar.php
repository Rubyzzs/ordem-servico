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

            <div id="layoutSidenav_content">
                <main class="container">
                    <div class="card-body p-3 mb-2 bg-secondary text-white mt-3 rounded">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nome">Nome Completo:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                            </div>
                            <div class="mb-3">
                                <label for="endereco">Endereço:</label>
                                <input type="text" name="endereco" class="form-control" placeholder="R. Xxxx; 123" required>
                            </div>
                            <div class="mb-3">
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Ex. (xx)123445678" required>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="xxxxx@xxxx" required>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cpf" value="CPF">
                                <label for="cpf" class="form-check-label">CPF</label>
                            </div>
                            <div class="form-check form-check-inline mb-2">
                                <input type="radio" class="form-check-input" name="cpf" value="cnpj">
                                <label for="cnpj" class="form-check-label">CNPJ</label><br>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" name="cpf" placeholder="digite o cpf/cnpj" required>
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
