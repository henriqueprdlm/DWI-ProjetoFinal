<?php
    require_once "../../models/PratoModel.php";

    $pratoModel = new PratoModel();
    $pratoModel->cadastrarPrato($_POST);

    header("Location:../form_lista_pratos.php?msg=Prato cadastrado com sucesso!&colormsg=bg-success");
?>