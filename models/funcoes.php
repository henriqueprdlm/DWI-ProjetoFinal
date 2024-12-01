<?php

function pegarImagem(Array $files):string{
    $nome_img = $files['imagem']['name'];
    $tipo_img = $files['imagem']['type'];
    $tam_img = $files['imagem']['size'];
    $imagem = $files['imagem']['tmp_name'];

    $fp = fopen($imagem, "rb");
    $imagem = fread($fp, $tam_img);
    $imagem = addslashes($imagem);
    fclose($fp);

    return $imagem;
}

function pegarImagemPrato(Array $files):string{
    $nome_img = $files['imagemPrato']['name'];
    $tipo_img = $files['imagemPrato']['type'];
    $tam_img = $files['imagemPrato']['size'];
    $imagemPrato = $files['imagemPrato']['tmp_name'];

    $fp = fopen($imagemPrato, "rb");
    $imagemPrato = fread($fp, $tam_img);
    $imagemPrato = addslashes($imagemPrato);
    fclose($fp);

    return $imagemPrato;
}