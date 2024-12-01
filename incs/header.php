<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
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
    
    <title>Refood</title>
</head>
<body class="bg-secondary bg-opacity-10">
    
    <header class="fixed-top bg-cor1">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <a href="index.php" class="d-inline-flex align-items-center">
                <img src="img/refood-logo-white.png" alt="Logo do Refoods" class="img-logo">
                <h2 class="ps-3 mb-0 titulo-header">Refood</h2>
            </a>

            <a href="login.php">
                <img src="img/user.png" alt="Ícone de usuário" class="img-user">
            </a>
        </div>
    </header>