<?php
    include "incs/header.php";
    require_once "../models/AcompanhamentoModel.php";

    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    }

    if (isset($_GET['colormsg'])) {
        $colormsg = $_GET['colormsg'];
    }

    $acompanhamentoModel = new acompanhamentoModel();
    if (isset($_GET['idacompanhamento'])) {
        $idacompanhamento = $_GET['idacompanhamento'];
        $acompanhamentoModel->removerAcompanhamento($idacompanhamento);
        $msg = "Acompanhamento removido com sucesso!";
        $colormsg = "bg-danger";
    } 
    if (isset($_GET['chave'])) {
        $acompanhamentos = $acompanhamentoModel->consultarAcompanhamentosPorChave($_GET['chave']);
    } else {
        $acompanhamentos = $acompanhamentoModel->consultarAcompanhamentos();
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
        <h4>Lista de Acompanhamentos</h4>

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
                        <th class="fs-5">Acompanhamento</th>
                        <th class="fs-5"></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        $i = 0;
                        foreach ($acompanhamentos as $acompanhamento):
                            $i++;
                    ?>
                            <tr>                    
                                <td class="align-middle"><?=$acompanhamento['acompanhamento']?></td>
                                <td class="d-flex justify-content-end">
                                    <a href="form_edita_acompanhamento.php?idacompanhamento=<?=$acompanhamento['idacompanhamento']?>" class="btn btn-success btn-sm me-2">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalRemover<?=$i?>">
                                        Remover
                                    </button>

                                    <div class="modal fade" id="modalRemover<?=$i?>" tabindex="-1" aria-labelledby="modalRemoverLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalRemoverLabel">Deseja remover este acompanhamento?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mb-0">Esta ação não poderá ser desfeita e todos os cardápios cadastrados com este acompanhamento desaparecerão.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a href="form_lista_acompanhamentos.php?idacompanhamento=<?=$acompanhamento['idacompanhamento']?>" class="btn btn-danger">Remover</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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