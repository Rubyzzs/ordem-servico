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
    $sql = "SELECT * FROM produto WHERE IDPRO = $id";
    $produto = retornaDado($sql);
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
                    <h1 class="display-1 text-center">Alterar dados do Produto</h1>
                        <form action="atualiza.php" method="POST">
                            <input type="hidden" name="IDPRO" value="<?= $produto['IDPRO'] ?>">
                            
                            <div class="mb-3">
                                <label for="nome">Nome:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome do produto" value="<?= $produto['nome'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="valor">Valor:</label>
                                <input type="text" name="valor" class="form-control" step="0.01" placeholder="00,00" value="<?= $produto['valor'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="descricao">Descrição do produto:</label>
                                <textarea name="descricao" class="form-control"  rows="5" value="<?= $produto['valor'] ?>" required> </textarea>
                            </div>

                            <div class="text-end">
                                <input class="btn btn-success" type="submit" name="submit" value="Salvar">
                                <a class="btn btn-danger" href="visualizar.php?id=<?= $produto['IDPRO'] ?>">Cancelar</a>
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
