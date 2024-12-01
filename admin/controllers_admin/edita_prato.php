<?php
    require_once "../../models/PratoModel.php";

    $pratoModel = new PratoModel();
    $pratoModel->editarPrato($_POST);

    header("Location:../form_lista_pratos.php?msg=Prato editado com sucesso!&colormsg=bg-success");
?>