<?php
    include_once '../../config.php';

    session_destroy();

    // Leva para o login
    header('Location: ' . links('login.php'));