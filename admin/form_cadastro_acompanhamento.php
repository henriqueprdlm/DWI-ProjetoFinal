<?php
    include "incs/header.php";
?>

    <div class="container form py-5">
        <h4>Cadastro de Acompanhamento</h4>

        <form action="controllers_admin/cadastro_acompanhamento.php" method="POST" enctype="multipart/form-data" class="row border-0 pt-4">

            <div class="mb-3 col-12">
                <label for="acompanhamentoId" class="form-label">Nome do acompanhamento:</label>
                <input type="text" name="acompanhamento" id="acompanhamentoId" class="form-control" required>
            </div>

        <button type="submit" class="btn btn-success col-2 mx-auto mt-4">Cadastrar</button>
                
        </form>
    </div>

<?php
    include "incs/footer.php";  
?>