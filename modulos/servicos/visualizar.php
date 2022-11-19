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

            <div id="layoutSidenav_content">
            <main class="container">
                <?php include_once path('template/mensagem.php') ?>
                    <h1 class="diplay-1 text-center">Sobre o Produto</h1>
                <hr>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="card w-100">
                            <div class="card-body rounded" style="background-color: #005353;">
                                <p class="card-text text-white"><b>Nome: </b><?= $servico['nome'] ?></p>
                                <p class="card-text text-white"><b>Valor:</b> R$<?= $servico['valor'] ?></p>
                                <p class="card-text text-white"><b>Descrição: </b><?= $servico['descricao'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <hr>
               
                     <div class="text-end">
                          <a  <?php if (podeMostrar(['funcionario'])) { ?> href="editar.php?id=<?= $servico['IDSER'] ?>" class="btn btn-primary">Alterar
                            </a>
                           <?php } ?>

                          <a  <?php if (podeMostrar(['funcionario'])) { ?> 
                        onclick="return confirm('Deseja realmente apagar o Serviço?')" href="apagar.php?id=<?= $servico['IDSER'] ?>" class="btn btn-danger">Apagar
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
