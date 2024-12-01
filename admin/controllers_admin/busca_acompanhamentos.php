<?php
    require_once "../../models/AcompanhamentoModel.php";

    $acompanhamentoModel = new AcompanhamentoModel();
    $acompanhamentos = $acompanhamentoModel->consultarAcompanhamentos(); 

    header('Content-Type: application/json');
    echo json_encode($acompanhamentos);  
?>
