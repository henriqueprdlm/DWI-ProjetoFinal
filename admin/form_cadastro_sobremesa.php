<?php
    include "incs/header.php";
?>

    <div class="container form py-5">
        <h4>Cadastro de Sobremesa</h4>

        <form action="controllers_admin/cadastro_sobremesa.php" method="POST" enctype="multipart/form-data" class="row border-0 pt-4">

            <div class="mb-3 col-12">
                <label for="sobremesaId" class="form-label">Nome da sobremesa:</label>
                <input type="text" name="sobremesa" id="sobremesaId" class="form-control" required>
            </div>

        <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Cadastrar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>