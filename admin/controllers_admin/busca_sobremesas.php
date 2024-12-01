<?php
    require_once "../../models/SobremesaModel.php";

    $sobremesaModel = new SobremesaModel();
    $sobremesas = $sobremesaModel->consultarSobremesas(); 

    header('Content-Type: application/json');
    echo json_encode($sobremesas);  
?>
