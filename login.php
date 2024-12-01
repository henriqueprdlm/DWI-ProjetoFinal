<?php
    include "incs/header.php";
?>

    <main class="margemHeader py-5">
        <div class="container login bg-white rounded p-4 shadow">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <img src="img/user-black.png" height="35px" class="pe-2">
                <p class="fs-3 mb-0">Login</p>
            </div>
            <?php
                if (isset($_SESSION['idusuario'])) {
            ?>
                    <form action="controllers/logout.php">
                        <p class="fs-4 text-center" style="padding: 50px 0px;">Você já está logado!</p>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-orange text-light py-2 px-4">Sair</button>
                        </div>
                    </form>
            <?php
                } else {
            ?>
                    <form action="controllers/efetuar_login.php" method="POST" class="mx-auto my-0 needs-validation w-100 d-flex justify-content-center flex-column">

                        <?php
                            if (isset($_GET['msg'])) {
                                $msg = $_GET['msg'];
                            }

                            if (isset($msg)) :
                        ?>
                                <div class="toast align-items-center mx-auto text-white bg-danger border-0 show mb-4 w-100" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
                                    <div class="d-flex">
                                        <div class="toast-body">
                                            <?=$msg?>
                                        </div>
                                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                    </div>
                                </div>
                        <?php
                            endif;
                        ?>

                            <div class="mb-3">
                                <label for="emailId" class="form-label">Email:</label>
                                <input type="email" class="form-control py-2" name="email" id="emailId" placeholder="nome@exemplo.com" aria-describedby="validationEmailFeedback" required>
                                <div id="validationEmailFeedback" class="invalid-feedback">
                                    Preencha este campo.
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="senhaId" class="form-label">Senha:</label>
                                </div>
                                <input type="password" class="form-control py-2" name="senha" id="senhaId"  aria-describedby="validationSenhaFeedback" required>
                                <div id="validationSenhaFeedback" class="invalid-feedback">
                                    Preencha este campo.
                                </div>
                            </div>

                            <div class="mb-3 d-grid pt-2">
                                <button type="submit" class="btn btn-orange text-light py-2">Entrar</button>
                            </div>

                            <div class="mb-3 d-flex justify-content-center">
                                <p class="d-inline-flex me-1 mb-0">Não tem cadastro?</p>
                                <a href="cadastro.php" class="link-dark">Cadastre-se</a>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Ao continuar, você concorda com a nossa</p>
                                <a href="politicadeprivacidade.php" target="_blank" class="link-dark">política de privacidade</a>
                            </div>

                        </div>
                    </form>
            <?php
                }
            ?>
        </div>
    </main>

<?php
    include "incs/footer.php";
?>