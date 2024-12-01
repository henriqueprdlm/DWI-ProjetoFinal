<?php
    require_once "../../models/PratoModel.php";

    $pratoModel = new PratoModel();
    $pratos = $pratoModel->consultarNomesPratos(); 

    header('Content-Type: application/json');
    echo json_encode($pratos);  
?>
