<?php
    require_once "../../models/CardapioModel.php";
    require_once "../../models/PratoModel.php";
    require_once "../../models/AcompanhamentoModel.php";
    require_once "../../models/SobremesaModel.php";

    $pratosSelecionados = $_POST['idprato'];  
    $acompanhamentosSelecionados = $_POST['idacompanhamento'];  
    $sobremesasSelecionadas = $_POST['idsobremesa']; 
    $dataCardapio = $_POST['data'];

    $cardapioModel = new CardapioModel();

    if ($cardapioModel->verificarCardapioExistente($dataCardapio)) {
        header("Location:../form_cadastro_cardapio.php?msg=Já existe um cardápio cadastrado para essa data!&colormsg=bg-danger");
        exit();
    }

    $idCardapio = $cardapioModel->cadastrarCardapio($dataCardapio);

    foreach ($pratosSelecionados as $idPrato) {
        $cardapioModel->adicionarPratoCardapio($idCardapio, $idPrato);
    }
    
    foreach ($acompanhamentosSelecionados as $idAcompanhamento) {
        $cardapioModel->adicionarAcompanhamentoCardapio($idCardapio, $idAcompanhamento);
    }
    
    foreach ($sobremesasSelecionadas as $idSobremesa) {
        $cardapioModel->adicionarSobremesaCardapio($idCardapio, $idSobremesa);
    }

    header("Location:../form_lista_cardapios.php?msg=Cardápio cadastrado com sucesso!&colormsg=bg-success");
?>