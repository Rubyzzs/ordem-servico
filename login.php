<?php
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="<?= links('css/styles.css') ?>" rel="stylesheet" />
    </head>
    <body id="login">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="conatainer">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="<?= links('modulos/autenticacao/entrar.php') ?>" method="POST">
                                            <div class="form-floating mb-3">
                                                <input type="email" name="email" class="form-control">
                                                <label for="email">Email</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="senha">
                                                <label for="senha">Senha</label>
                                            </div>
                                            <div class="text-end">
                                                <input type="submit" class="btn btn-primary" value="Entrar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>