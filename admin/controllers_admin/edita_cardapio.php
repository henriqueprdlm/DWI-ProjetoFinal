<?php
    require_once "../../models/CardapioModel.php";

    if (empty($_POST['idprato'])) {
        header("Location:../form_edita_cardapio.php?idcardapio=" . $_POST['idcardapio'] . "&msg=Você precisa selecionar pelo menos um prato&colormsg=bg-danger");
        exit(); 
    }
    if (empty($_POST['idacompanhamento'])) {
        header("Location:../form_edita_cardapio.php?idcardapio=" . $_POST['idcardapio'] . "&msg=Você precisa selecionar pelo menos um acompanhamento&colormsg=bg-danger");
        exit();
    }
    if (empty($_POST['idsobremesa'])) {
        header("Location:../form_edita_cardapio.php?idcardapio=" . $_POST['idcardapio'] . "&msg=Você precisa selecionar pelo menos uma sobremesa&colormsg=bg-danger");
        exit();
    }

    $cardapioModel = new CardapioModel();
    $idCardapio = $_POST['idcardapio'];

    $pratos = $_POST['idprato'];
    $acompanhamentos = $_POST['idacompanhamento'];
    $sobremesas = $_POST['idsobremesa'];
    
    $cardapioModel->removerPratosCardapio($idCardapio);
    foreach ($pratos as $idPrato) {
        $cardapioModel->adicionarPratoCardapio($idCardapio, $idPrato);
    }

    $cardapioModel->removerAcompanhamentosCardapio($idCardapio);
    foreach ($acompanhamentos as $idAcompanhamento) {
        $cardapioModel->adicionarAcompanhamentoCardapio($idCardapio, $idAcompanhamento);
    }

    $cardapioModel->removerSobremesasCardapio($idCardapio);
    foreach ($sobremesas as $idSobremesa) {
        $cardapioModel->adicionarSobremesaCardapio($idCardapio, $idSobremesa);
    }

    header("Location:../form_lista_cardapios.php?msg=Cardápio editado com sucesso!&colormsg=bg-success");
?>