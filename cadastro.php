<?php
    include "incs/header.php";

    require_once "models/UsuarioModel.php";
?>

<main class="margemHeader py-5">
    <div class="container cadastro bg-white rounded py-4 px-4 shadow">
        <?php
            if (isset ($_GET['msg'])) :
                $msg = $_GET['msg'];
        ?>
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
                    <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
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
        <div class="d-flex justify-content-center align-items-center mb-3">
            <img src="img/user-black.png" height="35px" class="pe-2">
            <p class="fs-3 mb-0">Cadastro</p>
        </div>
        <form action="controllers/cadastro_usuario.php" method="POST">
            <div class="row g-4">

                <div class="col-12">
                    <label for="nomeId" class="form-label">Nome</label>
                    <input type="text" class="form-control py-2" id="nomeId" name="nome" aria-describedby="validationNomeFeedback" required>
                    <div id="validationNomeFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-3">
                    <label for="generoId" class="form-label">Gênero</label>
                    <select class="form-select py-2" id="generoId" name="genero" aria-describedby="validationGeneroFeedback" required>
                        <option selected disabled>Selecione</option>
                        <option value="1">Masculino</option>
                        <option value="2">Feminino</option>
                        <option value="3">Outro</option>
                    </select>
                    <div id="validationGeneroFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-3">
                    <label for="datanascimentoId" class="form-label">Data de nascimento</label>
                    <input type="date" class="form-control py-2" id="datanascimentoId" name="dataNascimento" aria-describedby="validationDataNascimentoFeedback" required>
                    <div id="validationDataNascimentoFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-3">
                    <label for="cidadeId" class="form-label">Cidade</label>
                    <input type="text" class="form-control py-2" id="cidadeId" name="cidade" aria-describedby="validationCidadeFeedback" required>
                    <div id="validationCidadeFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-3">
                    <label for="estadoId" class="form-label">Estado</label>
                    <select class="form-select py-2" id="estadoId" name="idestado" aria-describedby="validationEstadoFeedback" required>
                        <option selected disabled>Selecione</option>

                        <?php
                            $usuarioModel = new UsuarioModel(); 
                            $estados = $usuarioModel->consultarEstados(); 
        
                            foreach ($estados as $estado) {
                                echo "<option value='{$estado['idestado']}'>{$estado['estado']}</option>";
                            }
                        ?>
                        
                    </select>
                    <div id="validationEstadoFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-3">
                    <label for="cpfId" class="form-label">CPF</label>
                    <input type="text" class="form-control py-2" id="cpfId" placeholder="xxx.xxx.xxx-xx" name="cpf" aria-describedby="validationCpfFeedback" required>
                    <div id="validationCpfFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-3">
                    <label for="telefoneId" class="form-label">Telefone</label>
                    <input type="tel" class="form-control py-2" id="telefoneId" placeholder="(xx)xxxxx-xxxx" name="telefone" aria-describedby="validationTelefoneFeedback" required>
                    <div id="validationTelefoneFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-6">
                    <label for="emailId" class="form-label">Email</label>
                    <input type="email" class="form-control py-2" id="emailId" placeholder="nome@exemplo.com" name="email" aria-describedby="validationEmailFeedback" required>
                    <div id="validationEmailFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-6">
                    <label for="senhaId" class="form-label">Senha</label>
                    <input type="password" class="form-control py-2" id="senhaId" aria-describedby="passwordHelpBlock" name="senha" aria-describedby="validationSenhaFeedback" required>
                    <div id="validationSenhaFeedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-6">
                    <label for="senha2Id" class="form-label">Confirme a senha</label>
                    <input type="password" class="form-control py-2" id="senha2Id" name="senha2" aria-describedby="validationSenha2Feedback" required>
                    <div id="validationSenha2Feedback" class="invalid-feedback">
                        Preencha este campo.
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="concordotermosId" name="concordotermos" onclick="habilitar('sim')">
                        <label class="form-check-label" for="concordotermosId">
                            Concordo com os <a href="termosecondicoes.php" target="_blank" class="link-dark">termos e condições</a> e a <a href="politicadeprivacidade.php" target="_blank" class="link-dark">política de privacidade.</a>
                        </label>
                    </div>
                </div>

                <div class="col-4 d-grid mx-auto pt-2">
                    <button type="submit" class="btn btn-orange text-light py-2" id="buttonCadastrar" disabled>Cadastrar</button>
                </div>

                <div class="col-12 d-flex justify-content-center">
                    <p class="d-inline-flex me-1 mb-0">Já tem cadastro?</p>
                    <a href="login.php" class="link-dark">Entrar</a>
                </div>

            </div>
        </form>
    </div>
</main>

<?php
    include "incs/footer.php";
?>