<?php
    include "incs/header.php";
    require_once "models/CardapioModel.php";
    require_once "models/PratoModel.php";
    require_once "models/AcompanhamentoModel.php";
    require_once "models/SobremesaModel.php";
    require_once "models/AvaliacaoModel.php";
?>

<main>

<?php
    $cardapioModel = new CardapioModel();
    $pratoModel = new PratoModel();
    $acompanhamentoModel = new AcompanhamentoModel();
    $sobremesaModel = new SobremesaModel();
    $avaliacaoModel = new AvaliacaoModel();

    $diasSemana = [
        "Sunday" => "Domingo",
        "Monday" => "Segunda-feira",
        "Tuesday" => "Terça-feira",
        "Wednesday" => "Quarta-feira",
        "Thursday" => "Quinta-feira",
        "Friday" => "Sexta-feira",
        "Saturday" => "Sábado"
    ];    

    $cardapios = $cardapioModel->consultarCardapiosFuturo();

    foreach ($cardapios as $cardapio) {
        $idcardapio = $cardapio['idcardapio'];
        $data = new DateTime($cardapio['data']);
        $dataFormatada = $data->format('d/m/Y');
        $diaSemana = $diasSemana[date("l", strtotime($cardapio['data']))];

        $pratos = $pratoModel->consultarPratosCardapio($idcardapio);
        $acompanhamentos = $acompanhamentoModel->consultarAcompanhamentosCardapio($idcardapio);
        $sobremesas = $sobremesaModel->consultarSobremesasCardapio($idcardapio);
?>

        <div class="dia container mt-4 mb-5">
            <h4 class="mb-3 text-color-white"><?=$diaSemana?> (<?=$dataFormatada?>)</h4>
            <div class="pratos d-flex justify-content-center align-items-stretch flex-wrap">
                
<?php
                foreach ($pratos as $prato) {
                    $mediaAvaliacoes = $avaliacaoModel->calcularMediaAvaliacoes($prato['idprato']);
                    $mediaAvaliacoes = $mediaAvaliacoes !== null ? number_format($mediaAvaliacoes, 1, ',', '.') : "(sem avaliações)";
?>
                    <div class="card card-prato">
                        <img src="data:image/png;base64,<?=base64_encode($prato['imagemPrato'])?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?=$prato['prato']?></h5>
                            <p class="card-text"><?=$prato['descricaoPrato']?></p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <div>
                                <p class="mb-0">Nota: <?=$mediaAvaliacoes?></p>
                                <p class="mb-0 cont-avaliacoes"><?=$avaliacaoModel->contarAvaliacoes($prato['idprato'])?> avaliações</p>
                            </div>
                            <button type="button" class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#modalAvaliacao<?=$prato['idprato']?>">Avaliar</button>
                        </div>
                    </div>

                    <div class="modal fade" id="modalAvaliacao<?=$prato['idprato']?>" tabindex="-1" aria-labelledby="modalAvaliacao<?=$prato['idprato']?>Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
<?php 
                                if (isset($_SESSION['idusuario'])) { 
?>
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalAvaliacao<?=$prato['idprato']?>Label"><?=$prato['prato']?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="controllers/avaliar_prato.php" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="idprato" value="<?=$prato['idprato']?>">
                                            <div class="mb-4">
                                                <p>Qual sua nota para o prato?</p>
                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-1">0</p>
                                                    <p class="mb-1">1</p>
                                                    <p class="mb-1">2</p>
                                                    <p class="mb-1">3</p>
                                                    <p class="mb-1">4</p>
                                                    <p class="mb-1">5</p>
                                                </div>
                                                <input type="range" class="form-range" min="0" max="5" id="avaliacaoId" name="nota">
                                            </div>
                                            <div class="mb-4">
                                                <label for="comentarioId" class="form-label">Deixe aqui seu comentário ou sugestão:</label>
                                                <textarea class="form-control" id="comentarioId" name="comentario"></textarea>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-orange d-flex align-self-end">Enviar</button>
                                            </div>
                                        </form>
                                    </div>
<?php 
                                } else { 
?>
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>                                    
                                    <div class="modal-body">
                                        <h5 class="text-center my-5">Faça login para avaliar o prato</h5>
                                        <div class="d-flex justify-content-end">
                                            <a href="login.php" class="btn btn-orange d-flex align-self-end">Fazer login</a>
                                        </div>
                                    </div>
<?php
                                }
?>
                            </div>
                        </div>
                    </div>
                    
<?php
                }
?>
            
                <div class="extra d-flex flex-column">
                    <div class="card flex-grow-1">
                        <div class="card-body">
                            <h6 class="card-title">Acompanhamentos:</h6>
                            <ul class="mb-0 ps-4">
<?php
                                foreach ($acompanhamentos as $acompanhamento) {
?>
                                    <li><?=$acompanhamento['acompanhamento']?></li>
<?php
                                }
?>
                            </ul>
                        </div>
                    </div>

                    <div class="card flex-grow-1">
                        <div class="card-body">
                            <h6 class="card-title">Sobremesas:</h6>
                            <ul class="mb-0 ps-4">
                            <?php
                                foreach ($sobremesas as $sobremesa) {
?>
                                    <li><?=$sobremesa['sobremesa']?></li>
<?php
                                }
?>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
<?php
    }
?>

</main>

<?php
    include "incs/footer.php";
?>