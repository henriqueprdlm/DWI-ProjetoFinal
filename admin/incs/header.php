<?php
    session_start();
    include "validar_sessao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- FONTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Limelight&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- ÍCONE -->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <title>Refood - Admin</title>
</head>
<body class="bg-secondary bg-opacity-10">

    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="index.php" class="navbar-brand d-inline-flex align-items-center">
                <img src="../img/refood-logo-white.png" alt="Logo do Refoods" class="img-logo">
                <h4 class="ps-3 mb-0 titulo-header">Refood</h4>
            </a>
            <h5 class="ps-3 mb-0 titulo-header-2">Admin</h5>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Refood - Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="form_cadastro_prato.php">Cadastrar prato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_cadastro_acompanhamento.php">Cadastrar acompanhamento</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_cadastro_sobremesa.php">Cadastrar sobremesa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_cadastro_cardapio.php">Cadastrar cardápio</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="form_lista_pratos.php">Listar pratos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_lista_acompanhamentos.php">Listar acompanhamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_lista_sobremesas.php">Listar sobremesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_lista_cardapios.php">Listar cardápios</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="form_cadastro_admin.php">Cadastrar admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_lista_admins.php">Listar admins</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="controllers_admin/logout_admin.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>