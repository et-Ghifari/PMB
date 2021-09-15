<?php
    $modul = (@$_GET['m']) ?: '';

    switch ($modul) {
        default:
            include APP.'dashboard.php';
            break;
    }
?>