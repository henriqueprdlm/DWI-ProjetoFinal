<?php
    require_once "../../models/SobremesaModel.php";

    $sobremesaModel = new SobremesaModel();
    $sobremesaModel->editarSobremesa($_POST);

    header("Location:../form_lista_sobremesas.php?msg=Sobremesa editada com sucesso!&colormsg=bg-success");
?>