<?php

    require_once "ConexaoBD.php";
    require_once "funcoes.php";

    class AcompanhamentoModel {

        function consultarAcompanhamentos() {
            $conexao = ConexaoBD::getConexao();
            
            $sql = "select * from acompanhamentos order by acompanhamento asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarAcompanhamentosPorChave($chave) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from acompanhamentos where (acompanhamento like '%$chave%')";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarAcompanhamentoPorId($idacompanhamento) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from acompanhamentos where idacompanhamento='$idacompanhamento'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function consultarAcompanhamentosCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select acompanhamentos.idacompanhamento, acompanhamento from acompanhamentos inner join cardapio_acompanhamento on acompanhamentos.idacompanhamento = cardapio_acompanhamento.idacompanhamento where idcardapio='$idcardapio' order by acompanhamento asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function cadastrarAcompanhamento($dados) {
            $conexao = ConexaoBD::getConexao();

            $sql = "insert into acompanhamentos (acompanhamento) values ('{$dados['acompanhamento']}')";

            $conexao->exec($sql);
        }
        
        function removerAcompanhamento($idacompanhamento) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from acompanhamentos where idacompanhamento='$idacompanhamento'";

            return $conexao->exec($sql);
        }

        function editarAcompanhamento($dados) {
            $conexao = ConexaoBD::getConexao();

            $sql = "update acompanhamentos set acompanhamento = '{$dados['acompanhamento']}' where idacompanhamento='{$dados['idacompanhamento']}'";
            
            return $conexao->exec($sql);
        }
    }

    