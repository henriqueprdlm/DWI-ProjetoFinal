<?php   
    require_once "../models/UsuarioModel.php";

    $usuarioModel = new UsuarioModel();

    if ($_POST['senha'] == $_POST['senha2']) {
        if (!$usuarioModel->consultarEmail($_POST['email'])) {
            $usuarioModel->cadastrarUsuario($_POST);
            
            header("Location:../index.php");
        } else {
            header ("Location:../cadastro.php?msg=Email já cadastrado!");
        }
    } else {
        header ("Location:../cadastro.php?msg=Senhas não conferem!");
    }

?>