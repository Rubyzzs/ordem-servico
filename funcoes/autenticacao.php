<?php
    function verificaAcesso($tipos_permitidos = []){
        if(empty($_SESSION['id'])){
            // Usuario não está logado, e vai pro login
            header('Location: '. links('login.php'));
            exit(1);
        }

        $usuario = usuario();
        if(!in_array($usuario['tipo_usuario'], $tipos_permitidos)){
            header('Location: '. links('modulos/autenticacao/sair.php'));
            exit;
        }
    }

    function podeMostrar($tipos_permitidos = []){
        $usuario = usuario();

        if(in_array($usuario['tipo_usuario'], $tipos_permitidos)){
            return true;
        } 

        return false;
    }