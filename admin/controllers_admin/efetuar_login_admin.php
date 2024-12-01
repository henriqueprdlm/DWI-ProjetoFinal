<?php
    session_start();
    require_once "../models_admin/AdminModel.php";

    $adminModel = new AdminModel();

    $idusuario = $adminModel->validarAdminIdUsuario($_POST);
    $idadmin = $adminModel->validarAdminIdAdmin($_POST);

    if ($idusuario && $idadmin) {
        $_SESSION['idusuario'] = $idusuario;
        $_SESSION['idadmin'] = $idadmin;
        header("Location:../index.php");
    } else {
        header("Location:../login.php?msg=Email ou senha incorreto!");
    }

?>