<?php
    session_start();
    require_once "../models/UsuarioModel.php";

    $usuarioModel = new UsuarioModel();
    
    $idusuario = $usuarioModel->validarUsuario($_POST);

    if ($idusuario) {
        $_SESSION['idusuario'] = $idusuario;
        header("Location:../index.php");
    } else {
        header("Location:../login.php?msg=Email ou senha incorreto!");
    }

?>