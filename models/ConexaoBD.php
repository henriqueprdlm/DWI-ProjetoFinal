<?php

class ConexaoBD{

    public static function getConexao():PDO{
        $conexao = new PDO("mysql:host=localhost;dbname=refood","root","henrique123");
        return $conexao;
    }


}

