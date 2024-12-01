<?php
    include "incs/header.php";
    require_once "../models/PratoModel.php";
    require_once "../models/AcompanhamentoModel.php";
    require_once "../models/SobremesaModel.php";

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }

    if (isset($_GET['colormsg'])) {
        $colormsg = $_GET['colormsg'];
    }

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
        <h4>Cadastro de Cardápio</h4>

        <form action="controllers_admin/cadastro_cardapio.php" method="POST" enctype="multipart/form-data" class="border-0 pt-4 row">

            <div class="mb-3 col-4">
                <label for="dataId" class="form-label">Data do cardápio:</label>
                <input type="date" name="data" id="dataId" class="form-control" required>
            </div>

            <p class="col-12 mb-2">Pratos:</p>
            <div class="row col-12" id="select-prato">
                <div class="mb-3 col-4 px-2">
                    <select name="idprato[]" class="form-select" required>
                        <option value="" disabled selected>Selecione um prato</option>
                        <?php
                            $pratoModel = new PratoModel();
                            $pratos = $pratoModel->consultarPratos(); 

                            foreach ($pratos as $prato) {
                                echo "<option value='{$prato['idprato']}'>{$prato['prato']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-1 mb-3 px-2" id="add-prato">
                    <button type="button" class="btn btn-outline-primary px-3" onclick="adicionarSelectPrato()">+</button>
                </div>
            </div>

            <p class="col-12 mb-2">Acompanhamentos:</p>
            <div class="row col-12" id="select-acompanhamento">
                <div class="mb-3 col-4 px-2">
                    <select name="idacompanhamento[]" class="form-select" required>
                        <option value="" disabled selected>Selecione um acompanhamento</option>
                        <?php
                            $acompanhamentoModel = new AcompanhamentoModel();
                            $acompanhamentos = $acompanhamentoModel->consultarAcompanhamentos(); 

                            foreach ($acompanhamentos as $acompanhamento) {
                                echo "<option value='{$acompanhamento['idacompanhamento']}'>{$acompanhamento['acompanhamento']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-1 mb-3 px-2" id="add-acompanhamento">
                    <button type="button" class="btn btn-outline-primary px-3" onclick="adicionarSelectAcompanhamento()">+</button>
                </div>
            </div>

            <p class="col-12 mb-2">Sobremesas:</p>
            <div class="row col-12" id="select-sobremesa">
                <div class="mb-3 col-4 px-2">
                    <select name="idsobremesa[]" class="form-select" required>
                        <option value="" disabled selected>Selecione uma sobremesa</option>
                        <?php
                            $sobremesaModel = new SobremesaModel();
                            $sobremesas = $sobremesaModel->consultarSobremesas(); 

                            foreach ($sobremesas as $sobremesa) {
                                echo "<option value='{$sobremesa['idsobremesa']}'>{$sobremesa['sobremesa']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-1 mb-3 px-2" id="add-sobremesa">
                    <button type="button" class="btn btn-outline-primary px-3" onclick="adicionarSelectSobremesa()">+</button>
                </div>
            </div>

        <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Cadastrar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>