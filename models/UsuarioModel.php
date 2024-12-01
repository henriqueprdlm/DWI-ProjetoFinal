<?php

    require_once "ConexaoBD.php";
    require_once "funcoes.php";

    class UsuarioModel {

        function consultarUsuario($email) {
            $conexao = ConexaoBD::getConexao();
            
            $sql = "select * from usuarios where email='$email'";

            $resultado = $conexao->query($sql);

            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function cadastrarUsuario($dados) {
            $conexao = ConexaoBD::getConexao();

            $senha = md5($dados['senha']);

            $sql = "insert into usuarios (nome, genero, dataNascimento, cidade, idestado, cpf, telefone, email, senha) values ('{$dados['nome']}', '{$dados['genero']}', '{$dados['dataNascimento']}', '{$dados['cidade']}', '{$dados['idestado']}', '{$dados['cpf']}', '{$dados['telefone']}', '{$dados['email']}', '{$senha}')";

            $conexao->exec($sql);
        }
        function consultarEstados() {
            $conexao = ConexaoBD::getConexao();
            
            $sql = "select * from endereco_estados";

            $resultado = $conexao->query($sql);

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarEmail($email) {
            $conexao = conexaoBD::getConexao();

            $sql = "select email from usuarios where email='$email'";

            $resultado = $conexao->query($sql);
            return $resultado->fetch(PDO::FETCH_ASSOC);
        }

        function validarUsuario($dados) {
            $conexao = conexaoBD::getConexao();
            $senha = md5($dados['senha']);

            $sql = "select idusuario from usuarios where email='{$dados['email']}' and senha='{$senha}'";

            $resultado = $conexao->query($sql);
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

            return $usuario ? $usuario['idusuario'] : null;
        }

    }

    