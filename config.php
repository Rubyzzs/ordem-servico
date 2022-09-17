<?php
    define('ROOT_PATH', 'http://localhost/ordem-servico/');
    define('ROOT_DIR', __DIR__);

    // Include dos arquivos comuns
    include_once path('funcoes/conexao.php');

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
        
        $id = $_SESSION['usuario'];

        $sql = "SELECT * FROM usuario WHERE id = $id";
        $query = $GLOBALS['conexaoBanco']->query($sql);

        return $query->fetch();
    }