<?php
    require_once "ConexaoBD.php";
    require_once "funcoes.php";

    class PratoModel {

        function consultarPratos() {
            $conexao = ConexaoBD::getConexao();
            
            $sql = "select * from pratos order by prato asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarPratosPorChave($chave) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from pratos where (prato like '%$chave%')";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarPratoPorId($idprato) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select * from pratos where idprato='$idprato'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function consultarNomesPratos() {
            $conexao = ConexaoBD::getConexao();
            
            $sql = "select idprato, prato from pratos order by prato asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarPratosCardapio($idcardapio) {
            $conexao = ConexaoBD::getConexao();

            $sql = "select pratos.idprato, prato, descricaoPrato, imagemPrato from pratos inner join cardapio_prato on pratos.idprato = cardapio_prato.idprato where idcardapio='$idcardapio' order by prato asc";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function cadastrarPrato($dados) {
            $conexao = ConexaoBD::getConexao();

            $imagemPrato = pegarImagemPrato($_FILES);

            $sql = "insert into pratos (prato, descricaoPrato, imagemPrato) values ('{$dados['prato']}', '{$dados['descricaoPrato']}', '{$imagemPrato}')";

            $conexao->exec($sql);
        }
        
        function removerPrato($idprato) {
            $conexao = ConexaoBD::getConexao();

            $sql = "delete from pratos where idprato='$idprato'";

            return $conexao->exec($sql);
        }

        function editarPrato($dados) {
            $conexao = ConexaoBD::getConexao();

            if ($_FILES['imagemPrato']['size']>0) {
                $imagemPrato = pegarImagemPrato($_FILES);  
            } else {
                $imagemPrato = "";
            }

            if ($imagemPrato != "") {
                $sql = "update pratos set prato = '{$dados['prato']}', descricaoPrato = '{$dados['descricaoPrato']}', imagemPrato = '{$imagemPrato}' where idprato='{$dados['idprato']}'";
            } else {
                $sql = "update pratos set prato = '{$dados['prato']}', descricaoPrato = '{$dados['descricaoPrato']}' where idprato='{$dados['idprato']}'";
            }
            
            return $conexao->exec($sql);
        }
    }

    