<?php
    include "incs/header.php";
    require_once "models_admin/AdminModel.php";
    require_once "../models/UsuarioModel.php";

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }

    if (isset($_GET['colormsg'])) {
        $colormsg = $_GET['colormsg'];
    }

    $adminModel = new adminModel();
    if (isset($_GET['chave'])) {
        $usuarios = $adminModel->consultarNaoAdminsPorChave($_GET['chave']);
    } else {
        $usuarios = $adminModel->consultarNaoAdmins();
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
        <h4>Cadastro de Administradores</h4>

        <form action="" class="mt-5 mb-3 container w-50 border-0 p-0">
            <div class="d-flex justify-content-between">
                <input type="text" class="form-control m-0 me-2" name="chave" id="chaveId">
                <button type="submit" class="btn btn-orange text-light m-0"><img src="../img/search.png" height="20px"></button>
            </div>
        </form>

        <div class="container p-5">
            <table class="table table-hover rounded">
                <thead>
                    <tr>            
                        <th class="fs-5">Nome</th>
                        <th class="fs-5">Email</th>
                        <th class="fs-5"></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $i = 0;
                        foreach ($usuarios as $usuario):
                            $i++;
                    ?>
                            <tr>                    
                                <td class="align-middle"><?=$usuario['nome']?></td>
                                <td class="align-middle"><?=$usuario['email']?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="controllers_admin/cadastro_admin.php?idusuario=<?=$usuario['idusuario']?>" class="btn btn-success btn-sm me-2">Tornar admin</a>
                                </td>
                            </tr>
                    <?php
                        endforeach;
                    ?>

                </tbody>

            </table>  
        </div>  
    </div>

<?php
    include "incs/footer.php";
?>