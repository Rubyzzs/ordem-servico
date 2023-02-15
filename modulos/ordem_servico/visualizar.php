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
    $sql = "SELECT * FROM ordemdeservico JOIN cliente ON (cliente.IDCLI = ordemdeservico.cliente_id) JOIN funcionario ON (funcionario.IDFUN = ordemdeservico.funcionario_id) WHERE IDOS = $id";
    $ordem_servico = retornaDado($sql);

    $sql = "SELECT * FROM servico";
    $servicos = retornaDados($sql);

    $sql = "SELECT * FROM funcionario";
    $funcionarios = retornaDados($sql);

    $sql = "SELECT * FROM produto";
    $produtos = retornaDados($sql);
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
                        
                    <div class="p-3 rounded text-dark" style="background-color: #F0F8FF;">
                        <div class="card-header rounded text-white text-center" style="background-color: #87CEEB;">
                            <h1><b>Ordem de Serviço #<?= $ordem_servico['IDOS']?></b></h1>
                        </div>

                        <div class="card-body">
                            <div class="row float-left w-100">
                                <div class="col-3">
                                   <label for="dt_in"><b>Data de Abertura:</b></label>
                                </div>
                                
                                <div class="col-3">
                                   <p class="form-control border-info"><?= $ordem_servico['dataOS'] ?></p>
                                </div>
                                <div class="col-3">
                                   <label for="dt_in"><b>Hora de Abertura:</b></label>
                                </div>
                                
                                <div class="col-3">
                                   <p class="form-control border-info"><?= $ordem_servico['horarioOS'] ?></p>
                                </div>
                                
                                <div class="col-3">
                                    <label for="cl_in"><b>Cliente:</b></label>
                                </div>
                                
                                <div class="col-3">
                                    <p class="form-control border-info"><?= $ordem_servico['nomeCLI'] ?></p>
                                </div>

                                <div class="col-3">
                                    <label for="fun_in"><b>Funcionário:</b></label>
                                </div>
                                
                                <div class="col-3">
                                    <p class="form-control border-info"><?= $ordem_servico['nomeFUN']?></p>
                                </div>

                                <div class="col-3">
                                    <label for="vl_in"><b>Valor Total:</b></label>
                                </div>
                                
                                <div class="col-3">
                                    <p class="form-control border-info">R$ <?= number_format($ordem_servico['valorTotalOS'], 2, ',', '.') ?></p>
                                </div>

                                <div class="col-3">
                                    <label for="obs_in"><b>Detalhes do serviço:</b></label>
                                </div>
                                
                                <div class="col-3">
                                    <p class="form-control border-info"><?= $ordem_servico['obs'] ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                            $sql = "SELECT * FROM itemservico JOIN servico ON (itemservico.IDSER_FK = servico.IDSER) WHERE IDOS_FK = {$ordem_servico['IDOS']}";
                            $itensServico = retornaDados($sql);
                        ?>
                        <div class="text-center">
                        <h1><b>Serviços e Produtos  da ordem</b></h1> 
                    </div>
                    <br>
                        <div class="container text-center">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-dark table-bordered">
                                        <thead>
                                                <tr>
                                                    <td>Serviço</td>
                                                    <td>Quantidade</td>
                                                    <td>Valor</td>
                                                    <td>Total</td>
                                                    <td>Descrição</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($itensServico as $servico) { ?>
                                                    <tr>
                                                        <td><?= $servico['nome'] ?></td>
                                                        <td><?= $servico['qtde'] ?></td>
                                                        <td>R$ <?= number_format($servico['valorUnit'], 2, ',', '.') ?></td>
                                                        <td><?= $servico['valorTotal'] ?></td>
                                                        <td><?= $servico['observacao'] ?></td>
                                                    </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                                <?php
                                    $sql = "SELECT * FROM itemproduto JOIN produto ON (itemproduto.IDPRO_FK = produto.IDPRO) WHERE IDOS_FK = {$ordem_servico['IDOS']}";
                                    $itensProdutos = retornaDados($sql);
                                ?>
                                
                                <div class="col">
                                        <table class="table table-dark table-bordered">
                                            <thead>
                                                <tr>
                                                    <td>Produto</td>
                                                    <td>Quantidade</td>
                                                    <td>Valor</td>
                                                    <td>Total</td>
                                                    <td>Observação</td>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($itensProdutos as $produto) { ?>
                                                            <tr>
                                                                <td><?= $produto['nome'] ?></td>
                                                                <td><?= $produto['qtde'] ?></td>
                                                                <td><?= $produto['valorUnit'] ?></td>
                                                                <td><?= $produto['valorTotal'] ?></td>
                                                                <td><?= $produto['observacao'] ?></td>
                                                            </tr>
                                                    <?php } ?>

                                                </tbody>

                                        </table>

                                </div>

                            </div>   
                     </div>
                    </div>

                    <?php if(podeMostrar(['funcionario'])){ ?>
                        <a href="editar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-primary" >
                            Editar
                        </a>
                    <?php } ?>
                        
                    <?php if(podeMostrar(['funcionario'])){ ?>
                        <a 
                        href="status.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-warning">
                            Fechar
                        </a>
                    <?php } ?>
                    
                    <?php if(podeMostrar(['funcionario'])){ ?>
                        <a 
                        onclick="return confirm('Deseja realmente apagar o ordem_servico?')" href="apagar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-danger">
                        Apagar
                        </a>
                    <?php } ?>
                    
                    <hr>
                    

                    <!-- Formulário para adicionar serviço -->
                    <?php if(podeMostrar(['funcionario']) && $ordem_servico['status'] == 'Aberto'){ ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <form action="salvar_item_servico.php" method="POST" class="text-dark bg-opacity-10 p-3 rounded" style="background-color: #86ECFA;">
                                    <p class="lead fw-bold">Adicionar Serviço</p>

                                    <input type="hidden" value="<?= $ordem_servico['IDOS'] ?>" name="IDOS">
                                    
                                    <div class="mb-3">
                                        <label for="servico">Serviços:</label>
                                        
                                        <select class="form-control border-info" name="servico_id" id="servico_id">
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
                                        <input type="number" name="qtde" class="form-control border-info" placeholder="00.00" step="0.01" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="valor">Valor:</label>
                                        <input type="number" name="valor" class="form-control border-info" placeholder="00.00" step="0.01" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="observacao">Descrição do Serviço:</label>
                                        <textarea name="observacao" class="form-control border-info"  rows="5" required></textarea>
                                    </div>
                                    
                                    <div class="text-end">
                                        <input class="btn btn-success" type="submit" name="submit" value="Salvar">
                                    </div>
                                </form>
                            </div>
                                
                            <!-- Formulário para adicionar produto -->
                                <div class="col-6">
                                    <form action="salvar_item_produto.php" method="POST" class="text-dark bg-opacity-10 p-3 rounded" style="background-color: #86ECFA;">
                                        <p class="lead fw-bold">Adicionar Produto</p>

                                            <input type="hidden" value="<?= $ordem_servico['IDOS'] ?>" name="IDOS">
                                            
                                            <div class="mb-3">
                                                <label for="produto">Produtos:</label>

                                                <select class="form-control border-info" name="produto_id" id="produto_id">
                                                    <?php
                                                        foreach($produtos as $produto)
                                                        {
                                                            echo "<option value='{$produto['IDPRO']}'> {$produto['nome']} </option>";
                                                        }
                                                    ?>    
                                                </select>
                                            </div>
                                        
                                        <div class="mb-3">
                                            <label for="qtde">Quantidade:</label>
                                            <input type="number" name="qtde" class="form-control border-info" placeholder="00.00" step="0.01" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="valor">Valor:</label>
                                            <input type="number" name="valor" class="form-control border-info" placeholder="00.00" step="0.01" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="observacao">Descrição do Produto:</label>
                                            <textarea name="observacao" class="form-control border-info"  rows="5" required></textarea>
                                        </div>
                                        
                                        <div class="text-end">
                                            <input class="btn btn-success" type="submit" name="submit" value="Salvar">
                                        </div>
                                    </form>
                                </div>   
                            </div>
                        </div>
                        <?php } ?>


                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
