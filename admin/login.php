<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">

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

    <?php
        if (isset ($_GET['msg'])) :
            $msg = $_GET['msg'];
    ?>
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?=$msg?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
    <?php
        endif;
    ?>
    
    <div class="login rounded container bg-white p-0 my-0 shadow position-absolute top-50 start-50 translate-middle">
        <form action="controllers_admin/efetuar_login_admin.php" method="POST" class="p-4 mx-auto my-0 needs-validation w-100 d-flex justify-content-center flex-column">
            <div class="d-flex justify-content-center align-items-center mb-3">
                <img src="../img/refood-logo-orange.png" height="50px" class="pe-3">
                <p class="fs-3 mb-0 text-dark">Refood - Admin</p>
            </div>

            <div class="mb-3">
                <label for="emailId" class="form-label">Email:</label>
                <input type="email" name="email" id="emailId" class="form-control" aria-describedby="validationLoginFeedback" required>
                <div id="validationLoginFeedback" class="invalid-feedback">
                    Preencha este campo.
                </div>
            </div>

            <div class="mb-3">
                <label for="senhaId" class="form-label">Senha:</label>
                <input type="password" name="senha" id="senhaId" class="form-control" aria-describedby="validationSenhaFeedback" required>
                <div id="validationSenhaFeedback" class="invalid-feedback">
                    Preencha este campo.
                </div>
            </div>

            <button type="submit" class="btn btn-orange text-light pt-2 w-100 mt-3 mb-0">Entrar</button>

        </form>
    </di>

</body>