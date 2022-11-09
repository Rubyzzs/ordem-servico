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
                    <div class="card-body p-3 mb-2 bg-secondary text-white mt-3 rounded">
                        <form action="atualiza.php" method="POST">
                            <input type="hidden" name="IDFUN" value="<?= $funcionario['IDFUN'] ?>">
                            
                            <div class="mb-3">
                                <label for="nome">Nome Completo:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" value="<?= $funcionario['nomeFUN'] ?>" required>
                            </div>


                            <div class="mb-3">
                                <label for="telefone">Telefone:</label>
                                <input type="text" name="telefone" class="form-control" placeholder="Ex. (xx)123445678" value="<?= $funcionario['telFUN'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="xxxxx@xxxx" value="<?= $funcionario['emailFUN'] ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="cnpj">CNPJ:</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="digite o cpf/cnpj" value="<?= $funcionario['cnpjFUN'] ?>" required>
                            </div>

                            <div class="text-end">
                                <input class="btn btn-success" type="submit" name="submit" value="Salvar">
                                <a class="btn btn-danger" href="visualizar.php?id=<?= $funcionario['IDFUN'] ?>">Cancelar</a>
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
