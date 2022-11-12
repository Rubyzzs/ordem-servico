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
    $sql = "SELECT * FROM ordemdeservico WHERE IDOS = $id";
    $ordem_servico = retornaDado($sql);
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
                        <div class="card-body p-3 mb-2 mt-3 rounded">
                                <form action="atualiza.php" method="POST">
                                <h1 class="display-1 text-center">Alterar dados da Ordem</h1>
                                    <input type="hidden" name="IDOS" value="<?= $id ?>">
                                    
                                    <div class="mb-3">
                                        <label for="dat">Data:</label>
                                        <input type="date" name="dat" class="form-control" value="<?= $ordem_servico['dataOS'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="hora">Hora:</label>
                                        <input type="time" name="hora" class="form-control" value="<?= $ordem_servico['horarioOS'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="valor">Valor Total:</label>
                                        <input type="number" name="valor" class="form-control" placeholder="00.00" step="0.01" value="<?= $ordem_servico['valorTotalOS'] ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="obs">Observações:</label>
                                        <textarea name="obs" class="form-control"  rows="5" required><?= $ordem_servico['obs'] ?></textarea>
                                    </div>

                                    <div class="text-end">
                                        <input class="btn btn-primary" type="submit" name="submit" value="Cadastrar">
                                        <a class="btn btn-danger" href="visualizar.php?id=<?= $ordem_servico['IDOS'] ?>">Cancelar</a>
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
