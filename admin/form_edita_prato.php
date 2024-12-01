<?php
    include "incs/header.php";
    require_once "../models/ConexaoBD.php";
    require_once "../models/PratoModel.php";

    $pratoModel = new PratoModel();

    $prato = $pratoModel->consultarPratoPorId($_GET['idprato']);
?>

    <div class="container form py-5">
        <h4>Edição de Prato</h4>

        <form action="controllers_admin/edita_prato.php" method="POST" enctype="multipart/form-data" class="row border-0 pt-4">

            <input type="hidden" name="idprato" value="<?=$_GET['idprato']?>">

            <div class="mb-3 col-7">
                <label for="pratoId" class="form-label">Nome do prato:</label>
                <input type="text" name="prato" id="pratoId" class="form-control" value="<?=$prato['prato']?>">
            </div>

            <div class="mb-3 col-5">
                <label for="imagemId" class="form-label">Imagem do prato:</label>
                <input type="file" name="imagemPrato" id="imagemId" class="form-control">
            </div>

            <div class="mb-3 col-12">
                <label for="descricaoId" class="form-label">Descrição do prato:</label>
                <textarea name="descricaoPrato" id="descricaoId" class="form-control"><?=$prato['descricaoPrato']?></textarea>
            </div>

            <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Editar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>