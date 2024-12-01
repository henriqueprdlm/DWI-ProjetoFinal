<?php
    require_once "ConexaoBD.php";
    require_once "funcoes.php";

    class AvaliacaoModel {
        function adicionarAvaliacao($idusuario, $idprato, $nota, $comentario) {
            $conexao = ConexaoBD::getConexao();

            $sql = "insert into avaliacoes (idusuario, idprato, nota, comentario) values ('{$idusuario}', '{$idprato}', '{$nota}', '{$comentario}')";
            
            $conexao->exec($sql);
        }

       function calcularMediaAvaliacoes($idprato) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select avg(nota) as media from avaliacoes where idprato = '{$idprato}'";
           
            $resultado = $conexao->query($sql);
            return $resultado->fetch()['media'];
        }

        function contarAvaliacoes($idprato) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select count(*) as total from avaliacoes where idprato = '{$idprato}'";
            
            $resultado = $conexao->query($sql);
            return $resultado->fetch()['total'];
        }
    }
?>