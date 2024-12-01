<?php
    require_once "../../models/AcompanhamentoModel.php";

    $acompanhamentoModel = new AcompanhamentoModel();
    $acompanhamentoModel->cadastrarAcompanhamento($_POST);

    header("Location:../form_lista_acompanhamentos.php?msg=Acompanhamento cadastrado com sucesso!&colormsg=bg-success");
?>