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
    $sql = "SELECT * FROM ordemdeservico JOIN cliente ON (cliente.IDCLI = ordemdeservico.cliente_id) WHERE IDOS = $id";
    $ordem_servico = retornaDado($sql);

    $sql = "SELECT * FROM servico";
    $servicos = retornaDados($sql);
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
                    
                    <h1><?= $ordem_servico['nomeCLI'] ?></h1>
                    <h1><?= $ordem_servico['dataOS'] ?></h1>
                    <p><?= $ordem_servico['horarioOS'] ?></p>
                    <p>R$ <?= number_format($ordem_servico['valorTotalOS'], 2, ',', '.') ?></p>
                    <p><?= $ordem_servico['obs'] ?></p>

                    <!-- Formulário para adicionar serviço -->

                    <form action="salvar_item_servico.php" method="POST" class="border p-2 my-3">
                        <input type="hidden" value="<?= $ordem_servico['IDOS'] ?>" name="IDOS">
                        
                        <div class="mb-3">
                                <label for="servico">Serviços:</label>

                                <select class="form-control" name="servico_id" id="servico_id">
                                    <?php
                                        foreach($servicos as $servico)
                                        {
                                            echo "<option value='{$servico['IDSER']}'> {$servico['nome']} </option>";
                                        }
                                    ?>    
                                </select>
                            </div>
                        
                        <div class="mb-3">
                            <label for="qtde">Quantidade:</label>
                            <input type="number" name="qtde" class="form-control" placeholder="00.00" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="valor">Valor:</label>
                            <input type="number" name="valor" class="form-control" placeholder="00.00" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="observacao">Observação do Serviço:</label>
                            <textarea name="observacao" class="form-control"  rows="5" required></textarea>
                        </div>

                        <div class="text-end">
                            <input class="btn btn-primary" type="submit" name="submit" value="Cadastrar">
                        </div>
                    </form>
                    <!-- Formulário para adicionar serviço -->
                    

                    <?php
                        $sql = "SELECT * FROM itemservico JOIN servico ON (itemservico.IDSER_FK = servico.IDSER) WHERE IDOS_FK = {$ordem_servico['IDOS']}";
                        $servicos = retornaDados($sql);
                    ?>
                    
                    <h1>Serviços da ordem</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Serviço</td>
                                <td>Quantidade</td>
                                <td>Valor</td>
                                <td>Total</td>
                                <td>Observação</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($servicos as $servico) { ?>
                                    <tr>
                                        <td><?= $servico['nome'] ?></td>
                                        <td><?= $servico['qtde'] ?></td>
                                        <td><?= $servico['valorUnit'] ?></td>
                                        <td><?= $servico['valorTotal'] ?></td>
                                        <td><?= $servico['observacao'] ?></td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>


                    <hr>
                    <a href="editar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-warning">Editar</a>
                    <a onclick="return confirm('Deseja realmente apagar o ordem_servico?')" href="apagar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-danger">Apagar</a>
                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
