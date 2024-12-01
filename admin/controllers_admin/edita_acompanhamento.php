<?php
    require_once "../../models/AcompanhamentoModel.php";

    $acompanhamentoModel = new AcompanhamentoModel();
    $acompanhamentoModel->editarAcompanhamento($_POST);

    header("Location:../form_lista_acompanhamentos.php?msg=Acompanhamento editado com sucesso!&colormsg=bg-success");
?>