<?php
    require_once "../models_admin/AdminModel.php";

    $adminModel = new AdminModel();
    $adminModel->cadastrarAdmin($_GET['idusuario']);

    header("Location:../form_lista_admins.php?msg=Administrador cadastrado com sucesso!&colormsg=bg-success");
?>