<?php

    require_once __DIR__ . "/../../models/ConexaoBD.php";

    class AdminModel {

        function validarAdminIdUsuario($dados) {
            $conexao = conexaoBD::getConexao();
            $senha = md5($dados['senha']);

            $sql = "select u.idusuario from usuarios as u, admins as a where u.idusuario=a.idusuario and u.email='{$dados['email']}' and u.senha='{$senha}'";

            $resultado = $conexao->query($sql);
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);

            return $usuario ? $usuario['idusuario'] : null;
        }

        function validarAdminIdAdmin($dados) {
            $conexao = conexaoBD::getConexao();
            $senha = md5($dados['senha']);

            $sql = "select a.idadmin from usuarios as u, admins as a where u.idusuario=a.idusuario and u.email='{$dados['email']}' and u.senha='{$senha}'";

            $resultado = $conexao->query($sql);
            $admin = $resultado->fetch(PDO::FETCH_ASSOC);

            return $admin ? $admin['idadmin'] : null;
        }

        function cadastrarAdmin($idusuario) {
            $conexao = conexaoBD::getConexao();

            $sql = "insert into admins (idusuario) values ('{$idusuario}')";
            
            $conexao->exec($sql);
        }

        function removerAdmin($idadmin) {
            $conexao = conexaoBD::getConexao();

            $sql = "delete from admins where idadmin='{$idadmin}'";
            
            return $conexao->exec($sql);
        }

        function consultarAdmins() {
            $conexao = conexaoBD::getConexao();

            $sql = "select * from usuarios as u, admins as a where u.idusuario=a.idusuario";
            
            $resultado = $conexao->query($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        function consultarAdminsPorChave($chave) {
            $conexao = conexaoBD::getConexao();

            $sql = "select * from usuarios as u, admins as a where u.idusuario=a.idusuario and (u.nome like '%{$chave}%' or u.email like '%{$chave}%')";
            
            $resultado = $conexao->query($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarNaoAdmins() {
            $conexao = conexaoBD::getConexao();

            $sql = "select u.* from usuarios as u left join admins as a on u.idusuario = a.idusuario where a.idusuario is null";
            
            $resultado = $conexao->query($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        function consultarNaoAdminsPorChave($chave) {
            $conexao = conexaoBD::getConexao();

            $sql = "select u.* from usuarios as u left join admins as a on u.idusuario = a.idusuario where a.idusuario is null and (u.nome like '%{$chave}%' or u.email like '%{$chave}%')";
            
            $resultado = $conexao->query($sql);
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }

    }

    