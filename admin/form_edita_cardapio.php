<?php
    include "incs/header.php";
    require_once "../models/ConexaoBD.php";
    require_once "../models/CardapioModel.php";
    require_once "../models/PratoModel.php";
    require_once "../models/AcompanhamentoModel.php";
    require_once "../models/SobremesaModel.php";

    $cardapioModel = new CardapioModel();

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }

    if (isset($_GET['colormsg'])) {
        $colormsg = $_GET['colormsg'];
    }

    $cardapio= $cardapioModel->consultarCardapioPorId($_GET['idcardapio']);

    if (isset($msg)) :
        ?>
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                <div class="toast align-items-center text-white <?=$colormsg?> border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <?=$msg?>
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php
    endif;
        
?>

    <div class="container form py-5">
        <h4>Edição de Cardápio</h4>

        <form action="controllers_admin/edita_cardapio.php" method="POST" enctype="multipart/form-data" class="row border-0 pt-4">

            <input type="hidden" name="idcardapio" value="<?=$_GET['idcardapio']?>">

            <p class="col-12 mb-2">Pratos:</p>
            <div class="row col-12" id="select-prato">
                <?php
                    $cardapioModel = new CardapioModel();
                    $pratosCardapio = $cardapioModel->consultarPratosCardapio($_GET['idcardapio']);

                    foreach ($pratosCardapio as $pc) {
                ?>
                        <div class="mb-3 col-4 px-2 d-flex justify-content-between" id="prato-<?=$pc['idprato']?>">
                            <select name="idprato[]" class="form-select" required>
                                <option value="" disabled selected>Selecione um prato</option>
                                <?php
                                    $pratoModel = new PratoModel();
                                    $pratos = $pratoModel->consultarPratos(); 

                                    foreach ($pratos as $prato) {
                                        $selected = "";
                                        if ($prato['idprato'] == $pc['idprato']) {
                                            $selected = "selected";
                                        }
                                        echo "<option $selected value='{$prato['idprato']}'>{$prato['prato']}</option>";
                                    }
                                ?>
                            </select>
                            <button type="button" class="btn btn-outline-danger ms-1" onclick="removerBotao('prato', <?= $pc['idprato'] ?>)">-</button>
                        </div>
                <?php
                    }
                ?>
                <div class="col-1 mb-3 px-2" id="add-prato">
                    <button type="button" class="btn btn-outline-primary px-3" onclick="adicionarSelectPrato()">+</button>
                </div>
            </div>

            <p class="col-12 mb-2">Acompanhamentos:</p>
            <div class="row col-12" id="select-acompanhamento">
                <?php
                    $cardapioModel = new CardapioModel();
                    $acompanhamentosCardapio = $cardapioModel->consultarAcompanhamentosCardapio($_GET['idcardapio']);

                    foreach ($acompanhamentosCardapio as $ac) {
                ?>
                        <div class="mb-3 col-4 px-2 d-flex justify-content-between" id="acompanhamento-<?=$ac['idacompanhamento']?>">
                            <select name="idacompanhamento[]" class="form-select" required>
                                <option value="" disabled selected>Selecione um acompanhamento</option>
                                <?php
                                    $acompanhamentoModel = new AcompanhamentoModel();
                                    $acompanhamentos = $acompanhamentoModel->consultarAcompanhamentos(); 

                                    foreach ($acompanhamentos as $acompanhamento) {
                                        $selected = "";
                                        if ($acompanhamento['idacompanhamento'] == $ac['idacompanhamento']) {
                                            $selected = "selected";
                                        }
                                        echo "<option $selected value='{$acompanhamento['idacompanhamento']}'>{$acompanhamento['acompanhamento']}</option>";
                                    }
                                ?>
                            </select>
                            <button type="button" class="btn btn-outline-danger ms-1" onclick="removerBotao('acompanhamento', <?= $ac['idacompanhamento'] ?>)">-</button>
                        </div>
                <?php
                    }
                ?>
                <div class="col-1 mb-3 px-2" id="add-acompanhamento">
                    <button type="button" class="btn btn-outline-primary px-3" onclick="adicionarSelectAcompanhamento()">+</button>
                </div>
            </div>

            <p class="col-12 mb-2">Sobremesas:</p>
            <div class="row col-12" id="select-sobremesa">
                <?php
                    $cardapioModel = new CardapioModel();
                    $sobremesasCardapio = $cardapioModel->consultarSobremesasCardapio($_GET['idcardapio']);

                    foreach ($sobremesasCardapio as $sc) {
                ?>
                        <div class="mb-3 col-4 px-2 d-flex justify-content-between" id="sobremesa-<?=$sc['idsobremesa']?>">
                            <select name="idsobremesa[]" class="form-select" required>
                                <option value="" disabled selected>Selecione uma sobremesa</option>
                                <?php
                                    $sobremesaModel = new SobremesaModel();
                                    $sobremesas = $sobremesaModel->consultarSobremesas(); 

                                    foreach ($sobremesas as $sobremesa) {
                                        $selected = "";
                                        if ($sobremesa['idsobremesa'] == $sc['idsobremesa']) {
                                            $selected = "selected";
                                        }
                                        echo "<option $selected value='{$sobremesa['idsobremesa']}'>{$sobremesa['sobremesa']}</option>";
                                    }
                                ?>
                            </select>
                            <button type="button" class="btn btn-outline-danger ms-1" onclick="removerBotao('sobremesa', <?= $sc['idsobremesa'] ?>)">-</button>
                        </div>
                <?php
                    }
                ?>
                <div class="col-1 mb-3 px-2" id="add-sobremesa">
                    <button type="button" class="btn btn-outline-primary px-3" onclick="adicionarSelectSobremesa()">+</button>
                </div>
            </div>

            <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Editar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>