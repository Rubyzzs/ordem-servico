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
                    <div class="card-body p-3 mb-2 bg-secondary text-white mt-3 rounded">
                        <form action="atualiza.php" method="POST">
                            <input type="hidden" name="IDCLI" value="<?= $cliente['IDCLI'] ?>">
                            
                            <div class="mb-3">
                                <label for="nome">Nome Completo:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" value="<?= $cliente['nomeCLI'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="endereco">Endereço:</label>
                                <input type="text" name="endereco" class="form-control" placeholder="R. Xxxx; 123" value="<?= $cliente['endCLI'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Ex. (xx)123445678" value="<?= $cliente['telCLI'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="xxxxx@xxxx" value="<?= $cliente['emailCLI'] ?>" required>
                            </div>

                            <!-- <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="cpf" value="CPF">
                                <label for="cpf" class="form-check-label">CPF</label>
                            </div>

                            <div class="form-check form-check-inline mb-2">
                                <input type="radio" class="form-check-input" name="cpf" value="cnpj">
                                <label for="cnpj" class="form-check-label">CNPJ</label><br>
                            </div> -->
                            
                            <div class="mb-3">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" name="cpf" placeholder="digite o cpf/cnpj" value="<?= $cliente['cpfCLI'] ?>" required>
                            </div>

                            <div class="text-end">
                                <input class="btn btn-success" type="submit" name="submit" value="Salvar">
                                <a class="btn btn-danger" href="visualizar.php?id=<?= $cliente['IDCLI'] ?>">Cancelar</a>
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
