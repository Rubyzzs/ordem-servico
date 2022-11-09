<nav class="sb-topnav navbar navbar-expand navbar" style="background: rgb(2,0,36);
background: linear-gradient(95deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 25%, rgba(0,212,255,1) 94%);">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 text-white" href="<?= links('index.php')?>">Área Administrativa</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Pesquisar..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Configuração</a></li>
                <li><a class="dropdown-item" href="#!"><?= pessoa()[1] ?></a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="<?= links('modulos/autenticacao/sair.php') ?>">Sair</a></li>
            </ul>
        </li>
    </ul>
</nav>