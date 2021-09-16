<?php
    $modul = (@$_GET['m']) ?: '';

    switch ($modul) {
        default:
            include 'home.php';
            break;
    }