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
    $sql = "SELECT * FROM servico WHERE IDSER = $id";
    $servico = retornaDado($sql);
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
                    <div class="card-body p-3 mb-2 mt-3 rounded" style="background-color: #F0F8FF;">
                    <h1 class="display-1 text-center">Alterar dados do Serviço</h1>
                        <form action="atualiza.php" method="POST">
                            <input type="hidden" name="IDSER" value="<?= $servico['IDSER'] ?>">
                            
                            <div class="mb-3">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome do servico" value="<?= $servico['nome'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="valor">Valor:</label>
                                <input type="text" name="valor" class="form-control" step="0.01" placeholder="00,00" value="<?= $servico['valor'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="descricao">Descrição do servico:</label>
                                <textarea name="descricao" class="form-control"  rows="5" required><?= $servico['descricao'] ?></textarea>
                            </div>

                            <div class="text-end">
                                <input class="btn btn-success" type="submit" name="submit" value="Salvar">
                                <a class="btn btn-danger" href="visualizar.php?id=<?= $servico['IDSER'] ?>">Cancelar</a>
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
