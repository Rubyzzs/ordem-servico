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
            <main class="container-fluid">
                    <?php include_once path('template/mensagem.php') ?>
                    <div class="container rounded mt-3 mb-5" style="background-color: #F0F8FF;">
                        <div class="row">
                            <div class="col-md-4 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                                    <span class="font-weight-bold"><?= $cliente['nomeCLI'] ?></span>
                                    <span class="text-black-50"><?= $cliente['emailCLI'] ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Meus dados</h4>
                                    </div>
                                        <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Nome completo:</label><p class="form-control"><?= $cliente['nomeCLI'] ?></p></div>
                                        <div class="col-md-12"><label class="labels">Telefone:</label><p class="form-control"><?= $cliente['telCLI'] ?></p></div>
                                        <div class="col-md-12"><label class="labels">Endereço:</label><p class="form-control"><?= $cliente['endCLI'] ?></p></div>
                                        <div class="col-md-12"><label class="labels">Email:</label><p class="form-control"><?= $cliente['emailCLI'] ?></p></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels">Cidade:</label><p class="form-control"><?= $cliente['cidade'] ?></p></div>
                                        <div class="col-md-6"><label class="labels">Estado</label><p class="form-control"><?= $cliente['estado'] ?></p></div>
                                    </div>
                                    <div class="mt-5 text-center"><a href="editar.php?id=<?= $cliente['IDCLI'] ?>" class="btn btn-primary profile-button">Alterar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include_once path('template/footer.php') ?>
        </div> 
    </div>  
    
    <?php include_once path('template/scripts.php') ?>
</body>

</html>