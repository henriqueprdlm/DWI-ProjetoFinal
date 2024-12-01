<?php
    include "incs/header.php";
    require_once "../models/ConexaoBD.php";
    require_once "../models/SobremesaModel.php";

    $sobremesaModel = new SobremesaModel();

    $sobremesa = $sobremesaModel->consultarSobremesaPorId($_GET['idsobremesa']);
?>

    <div class="container form py-5">
        <h4>Edição de Sobremesa</h4>

        <form action="controllers_admin/edita_sobremesa.php" method="POST" enctype="multipart/form-data" class="row border-0 pt-4">

            <input type="hidden" name="idsobremesa" value="<?=$_GET['idsobremesa']?>">

            <div class="mb-3 col-12">
                <label for="sobremesaId" class="form-label">Nome da sobremesa:</label>
                <input type="text" name="sobremesa" id="sobremesaId" class="form-control" value="<?=$sobremesa['sobremesa']?>">
            </div>

            <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Editar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>