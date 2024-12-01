<?php
    include "incs/header.php";
    require_once "../models/ConexaoBD.php";
    require_once "../models/AcompanhamentoModel.php";

    $acompanhamentoModel = new AcompanhamentoModel();

    $acompanhamento = $acompanhamentoModel->consultarAcompanhamentoPorId($_GET['idacompanhamento']);
?>

    <div class="container form py-5">
        <h4>Edição de Acompanhamento</h4>

        <form action="controllers_admin/edita_acompanhamento.php" method="POST" enctype="multipart/form-data" class="row border-0 pt-4">

            <input type="hidden" name="idacompanhamento" value="<?=$_GET['idacompanhamento']?>">

            <div class="mb-3 col-12">
                <label for="acompanhamentoId" class="form-label">Nome do acompanhamento:</label>
                <input type="text" name="acompanhamento" id="acompanhamentoId" class="form-control" value="<?=$acompanhamento['acompanhamento']?>">
            </div>

            <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Editar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>