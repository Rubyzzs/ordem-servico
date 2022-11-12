<?php
include_once '../../config.php';

// Pega o ID que veio da URL
if (empty($_GET['id'])) {
    header('Location: index.php');
    exit;
} else {
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

        <div id="layoutSidenav_content">
            <main class="container">
                <?php include_once path('template/mensagem.php') ?>
                <div>
                    <div>
                        <div class="card mb-4" style="max-width: 100rem;">
                            <div class="card-header text-center">Detalhes do produto</div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $produto['nome'] ?></h5>
                                <p class="card-text"><b>Valor: </b> R$ <?= number_format($produto['valor'], 2, ',', '.') ?></p>
                                <p class="card-text"><?= $produto['descricao'] ?></p>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <a  <?php if (podeMostrar(['funcionario'])) { ?> href="editar.php?id=<?= $produto['IDPRO'] ?>" class="btn btn-warning">Editar
                    </a>
                        <?php } ?>
                    <a  <?php if (podeMostrar(['funcionario'])) { ?> onclick="return confirm('Deseja realmente apagar o produto?')" href="apagar.php?id=<?= $produto['IDPRO'] ?>" class="btn btn-danger">Apagar
                    </a>
                        <?php } ?>
            </main>

            <?php include_once path('template/footer.php') ?>
        </div>
    </div>
    <?php include_once path('template/scripts.php') ?>
</body>

</html>