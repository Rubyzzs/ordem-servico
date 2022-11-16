<?php
    include_once '../../config.php';

    verificaAcesso(['funcionario', 'administrador']);

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

            <div id="layoutSidenav_content" style="background-color: #F0F8FF;">
                <main class="container">
                    <div class="card-body p-3 mb-2 mt-3 rounded">
                    <h1 class="display-1 text-center">Cadastrar de Funcionário</h1>
                        <form action="salvar.php" method="POST">
                            <div class="mb-3">
                                <label for="nome">Nome Completo:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                            </div>

                            
                            <div class="mb-3">
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Ex. (xx)123445678" required>
                            </div>

                            
                            <div class="mb-3">
                                <label for="cnpj">CPF/CNPJ:</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="digite o cpf/cnpj" required>
                            </div>
                            
                            <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" placeholder="xxxxx@xxxx" required>
                                </div>
                            </div>
                                
                            <div class="col">
                                <div class="mb-3">
                                    <label for="senha">Senha:</label>
                                    <input type="password" name="senha" class="form-control" required>
                                </div>
                            </div>
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
