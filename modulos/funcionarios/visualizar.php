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
                <?php include_once path('template/mensagem.php') ?>
                    <h1 class="diplay-1 text-center">Dados para contato</h1>
                <hr>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="card w-100">
                            <div class="card-body rounded" style="background-color: #008B8B;">
                                <h1 class="card-title text-center text-white"><?= $funcionario['nomeFUN'] ?></h1>
                                <p class="card-text text-white"><b>Fone: </b><?= $funcionario['telFUN'] ?></p>
                                <p class="card-text text-white"><b>Email: </b><?= $funcionario['emailFUN'] ?></p>
                                <p class="card-text text-white"><b>CPF/CNPJ: </b><?= $funcionario['cnpjFUN'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
                <div class="text-end">
                    <a  <?php if (podeMostrar(['funcionario'])) { ?> href="editar.php?id=<?= $funcionario['IDFUN'] ?>" class="btn btn-primary">Alterar
                    </a>
                        <?php } ?>

                    <a  <?php if (podeMostrar(['funcionario'])) { ?> 
                        onclick="return confirm('Deseja realmente apagar o funcionário?')" href="apagar.php?id=<?= $funcionario['IDFUN'] ?>" class="btn btn-danger">Apagar
                    </a>
                        <?php } ?>
                </div>
            </main>

            <?php include_once path('template/footer.php') ?>
        </div>
    </div>
    <?php include_once path('template/scripts.php') ?>
</body>

</html>