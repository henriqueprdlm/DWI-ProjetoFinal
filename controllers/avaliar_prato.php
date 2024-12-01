<?php
    session_start();
    require_once "../models/AvaliacaoModel.php";

    if (isset($_SESSION['idusuario'])) {
        $avaliacaoModel = new AvaliacaoModel();

        $idprato = $_POST['idprato'];
        $idusuario = $_SESSION['idusuario'];
        $nota = $_POST['nota'];
        $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : null;

        $avaliacaoModel->adicionarAvaliacao( $idusuario, $idprato,$nota, $comentario);

        header("Location: ../index.php");
    }
?>