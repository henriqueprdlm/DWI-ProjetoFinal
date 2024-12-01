<?php

    require_once "ConexaoBD.php";
    require_once "funcoes.php";

    class SobremesaModel {

        function consultarSobremesas() {
            $conexao = ConexaoBD::getConexao();
            
            $sql = "select * from sobremesas order by sobremesa asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarSobremesasPorChave($chave) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from sobremesas where (sobremesa like '%$chave%')";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarSobremesaPorId($idsobremesa) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from sobremesas where idsobremesa='$idsobremesa'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function consultarSobremesasCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select sobremesas.idsobremesa, sobremesa from sobremesas inner join cardapio_sobremesa on sobremesas.idsobremesa = cardapio_sobremesa.idsobremesa where idcardapio='$idcardapio' order by sobremesa asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function cadastrarSobremesa($dados) {
            $conexao = ConexaoBD::getConexao();

            $sql = "insert into sobremesas (sobremesa) values ('{$dados['sobremesa']}')";

            $conexao->exec($sql);
        }
        
        function removerSobremesa($idsobremesa) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from sobremesas where idsobremesa='$idsobremesa'";

            return $conexao->exec($sql);
        }

        function editarSobremesa($dados) {
            $conexao = ConexaoBD::getConexao();

            $sql = "update sobremesas set sobremesa = '{$dados['sobremesa']}' where idsobremesa='{$dados['idsobremesa']}'";
            
            return $conexao->exec($sql);
        }
    }

    