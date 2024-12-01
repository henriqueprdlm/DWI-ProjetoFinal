<?php

    require_once "ConexaoBD.php";
    require_once "funcoes.php";

    class CardapioModel {

        function consultarCardapios() {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapios order by data asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarCardapiosFuturo() {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapios where data >= curdate() order by data asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarCardapioPorData($data) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapios where (data like '%$data%')";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarCardapioPorId($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapios where idcardapio='$idcardapio'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function verificarCardapioExistente($data) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapios where data='$data'";

            $resultado = $conexao->query($sql);

            return $resultado->rowCount();
        }

        function cadastrarCardapio($data) {
            $conexao = ConexaoBD::getConexao();

            $sql = "insert into cardapios (data) values ('$data')";

            $conexao->exec($sql);

            return $conexao->lastInsertId();
        }

        function adicionarPratoCardapio($idcardapio, $idprato){
            $conexao = ConexaoBD::getConexao();

            $sql = "insert into cardapio_prato (idcardapio, idprato) values ('$idcardapio', '$idprato')";

            $conexao->exec($sql);
        }

        function consultarPratosCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapio_prato where idcardapio='$idcardapio'";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function removerPratosCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from cardapio_prato where idcardapio='$idcardapio'";

            return $conexao->exec($sql);
        }   

        function adicionarAcompanhamentoCardapio($idcardapio, $idacompanhamento){
            $conexao = ConexaoBD::getConexao();

            $sql = "insert into cardapio_acompanhamento (idcardapio, idacompanhamento) values ('$idcardapio', '$idacompanhamento')";

            $conexao->exec($sql);
        }

        function consultarAcompanhamentosCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapio_acompanhamento where idcardapio='$idcardapio'";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function removerAcompanhamentosCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from cardapio_acompanhamento where idcardapio='$idcardapio'";

            return $conexao->exec($sql);
        }

        function adicionarSobremesaCardapio($idcardapio, $idsobremesa){
            $conexao = ConexaoBD::getConexao();

            $sql = "insert into cardapio_sobremesa (idcardapio, idsobremesa) values ('$idcardapio', '$idsobremesa')";

            $conexao->exec($sql);
        }

        function consultarSobremesasCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from cardapio_sobremesa where idcardapio='$idcardapio'";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function removerSobremesasCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from cardapio_sobremesa where idcardapio='$idcardapio'";

            return $conexao->exec($sql);
        }
        
        function removerCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from cardapio_prato where idcardapio='$idcardapio'";
            $conexao->exec($sql);

            $sql = "delete from cardapio_acompanhamento where idcardapio='$idcardapio'";
            $conexao->exec($sql);

            $sql = "delete from cardapio_sobremesa where idcardapio='$idcardapio'";
            $conexao->exec($sql);
            
            $sql = "delete from cardapios where idcardapio='$idcardapio'";
            return $conexao->exec($sql);
        }

    }

    