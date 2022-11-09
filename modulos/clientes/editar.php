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

    $sql = "SELECT * FROM usuario WHERE id = $id";
    $usuario = retornaDado($sql);
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
                                    <form action="atualiza.php" method="POST">
                                        <input type="hidden" name="IDCLI" value="<?= $cliente['IDCLI'] ?>">
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="nome">Nome completo:</label>
                                                <input type="text" name="nome" class="form-control" value="<?= $cliente['nomeCLI'] ?>" required>
                                                </div>

                                                <div class="col-md-12"><label class="labels">Cpf:</label>
                                                <input type="text" name="cpf" class="form-control" value="<?= $cliente['cpfCLI'] ?>" required>
                                                </div>

                                                <div class="col-md-12"><label class="labels">Telefone:</label>
                                                <input type="text" name="telefone" class="form-control" value="<?= $cliente['telCLI'] ?>" required>
                                                </div>

                                                <div class="col-md-12"><label class="labels">Endereço:</label>
                                                <input type="text" name="endereco" class="form-control" value="<?= $cliente['endCLI'] ?>" required>
                                                </div>

                                                <div class="col-md-12"><label class="labels">Email:</label>
                                                <input type="email" name="email" class="form-control" value="<?= $cliente['emailCLI'] ?>" required>
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6"><label class="labels">Cidade:</label>
                                                <input type="text" name="cidade" class="form-control" value="<?= $cliente['cidade'] ?>" required>
                                                </div>
                                                <div class="col-md-6"><label class="labels">Estado</label>
                                                <input type="text" name="estado" class="form-control" value="<?= $cliente['estado'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="mt-5 text-center"><a href="salvar.php?id=<?= $cliente['IDCLI'] ?>" class="btn btn-success profile-button">Salvar</a>
                                                <a class="btn btn-danger" href="visualizar.php?id=<?= $funcionario['IDFUN'] ?>">Cancelar</a>   
                                            </div>
                                    </form>
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
