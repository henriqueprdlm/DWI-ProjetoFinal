<?php

    if (!isset($_SESSION['idadmin'])) {
        header("Location:login.php?msg=Efetue login para acessar a página!");
        exit();
    }

?>