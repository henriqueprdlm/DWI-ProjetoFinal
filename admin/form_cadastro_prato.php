<?php
    include "incs/header.php";
?>

    <div class="container form py-5">
        <h4>Cadastro de Prato</h4>

        <form action="controllers_admin/cadastro_prato.php" method="POST" enctype="multipart/form-data" class="row border-0 pt-4">

            <div class="mb-3 col-7">
                <label for="pratoId" class="form-label">Nome do prato:</label>
                <input type="text" name="prato" id="pratoId" class="form-control" required>
            </div>

            <div class="mb-3 col-5">
                <label for="imagemId" class="form-label">Imagem do prato:</label>
                <input type="file" name="imagemPrato" id="imagemId" class="form-control" required>
            </div>

            <div class="mb-3 col-12">
                <label for="descricaoId" class="form-label">Descrição do prato:</label>
                <textarea name="descricaoPrato" id="descricaoId" class="form-control" required></textarea>
            </div>

        <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Cadastrar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>