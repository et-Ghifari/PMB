<?php
    $modul = (@$_GET['m']) ?: '';

    switch ($modul) {
        default:
            include 'index.php';
            break;
    }
?>