<?php
    define('ROOT_PATH', 'http://localhost/ordem-servico/');
    define('ROOT_DIR', __DIR__);

    // Include dos arquivos comuns
    session_start();
    include_once path('funcoes/conexao.php');
    include_once path('funcoes/autenticacao.php');

    // session_start();
    // if (empty($_SESSION['usuario'])) {
    //     header('Location: ' . links('index.php'));
    //     exit;
    // }
    
    // Funções
    function links($file)
    {
        return ROOT_PATH . $file;
    }
    
    function path($file)
    {
        return ROOT_DIR . '/' . $file;
    }

    function usuario()
    {
        // Retorna o usuário logado;
        $id = $_SESSION['id'];

        $sql = "SELECT * FROM usuario WHERE id = $id";
        $usuario = retornaDado($sql);

        return $usuario;
    }

    function pessoa()
    {
        $usuario = usuario();

        if($usuario['tipo_usuario'] == 'cliente')
        {
            $sql = "SELECT * FROM cliente WHERE IDCLI = {$usuario['id_usuario']}";
            return retornaDado($sql);
        }else if($usuario['tipo_usuario'] == 'funcionario'){
            $sql = "SELECT * FROM funcionario WHERE IDFUN = {$usuario['id_usuario']}";
            return retornaDado($sql);
        }else{
            return [];
        }
    }