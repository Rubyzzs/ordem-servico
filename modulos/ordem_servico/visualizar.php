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
                        
                    <div class="bg-dark p-2 text-dark bg-opacity-10">
                        <div class="card-header text-white bg-info bg-opacity-50 text-center">
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
                                <select class="form-control border-info" name="funcionario_id" id="funcionario_id">
                                    <?php
                                        foreach($funcionarios as $funcionario)
                                        {
                                            echo "<option value='{$funcionario['IDFUN']}'> {$funcionario['nomeFUN']} </option>";
                                        }
                                    ?>    
                                </select>
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

                                <div class="col-3">
                                    <label for="status "><b>Situação da Ordem:</b></label>
                                </div>
                                
                                <div class="col-3">
                                    <select name="status" id="status">
                                        <option value="--" selected>--</option>
                                        <option value="0">Em Aberto</option>
                                        <option value="1">Finalizada</option>
                                    </select>
                                </div> 

                            </div>
                        </div>
                    </div>
                    
                    <a <?php if(podeMostrar(['funcionario'])){ ?>
                    href="editar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-primary" >Editar
                    </a>
                        <?php } ?>
                    <a <?php if(podeMostrar(['funcionario'])){ ?>
                    onclick="return confirm('Deseja realmente apagar o ordem_servico?')" href="apagar.php?id=<?= $ordem_servico['IDOS'] ?>" class="btn btn-danger">Apagar
                    </a>
                        <?php } ?>
                    
                    <hr>
                    

                    <!-- Formulário para adicionar serviço -->
                    <?php if(podeMostrar(['funcionario'])){ ?>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <form action="salvar_item_servico.php" method="POST" class="bg-dark p-2 text-dark bg-opacity-10">
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
                                        <label for="observacao">Observação do Serviço:</label>
                                        <textarea name="observacao" class="form-control border-info"  rows="5" required></textarea>
                                    </div>
                                    
                                    <div class="text-end">
                                        <input class="btn btn-success" type="submit" name="submit" value="Salvar">
                                    </div>
                                </form>
                            </div>
                                
                            <!-- Formulário para adicionar produto -->
                                <div class="col">
                                    <form action="salvar_item_produto.php" method="POST" class="bg-dark p-2 text-dark bg-opacity-10">
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
                                            <label for="observacao">Observação do Serviço:</label>
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
                    

                        <?php
                            $sql = "SELECT * FROM itemservico JOIN servico ON (itemservico.IDSER_FK = servico.IDSER) WHERE IDOS_FK = {$ordem_servico['IDOS']}";
                            $servicos = retornaDados($sql);
                        ?>
                    <div class="text-center">
                        <h1><b>Serviços e Produtos  da ordem</b></h1> 
                    </div>
                    <br>
                        <div class="container text-center">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-dark table-striped">
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
                                </div>

                                <?php
                                    $sql = "SELECT * FROM itemproduto JOIN produto ON (itemproduto.IDPRO_FK = produto.IDPRO) WHERE IDOS_FK = {$ordem_servico['IDOS']}";
                                    $produtos = retornaDados($sql);
                                ?>
                                
                                <div class="col">
                                        <table class="table table-dark table-striped">
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
                                                        foreach($produtos as $produto) { ?>
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

                </main>

                <?php include_once path('template/footer.php') ?>
            </div>
        </div>
        <?php include_once path('template/scripts.php') ?>
    </body>
</html>
