<?php
    require_once "../../models/SobremesaModel.php";

    $sobremesaModel = new SobremesaModel();
    $sobremesaModel->cadastrarSobremesa($_POST);

    header("Location:../form_lista_sobremesas.php?msg=Sobremesa cadastrada com sucesso!&colormsg=bg-success");
?>