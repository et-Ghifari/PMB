<?php
    $modul = ($_GET['m']) ?: '';

    switch ($modul) {
        case 'user' :
            include_once APP.'userController.php';
            break;

        case 'addUser' :
            include_once APP.'addUserController.php';
            break;

        case 'editUser' :
            include_once APP.'editUserController.php';
            break;

        case 'deleteUser' :
            include_once APP.'deleteUserController.php';

        default :
            include_once APP.'homeController.php';
            break;
    }