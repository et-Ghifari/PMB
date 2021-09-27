<?php

if (isset($_POST['login'])){

    $username = $_POST['uid'];
    $password = $_POST['password'];

    require_once 'connectAuth.php';
    require_once 'functionAuth.php';

    if (emptyInputLogin($username, $password) != false) {
        header('Location: ../login.php?error=mptinput');
        exit();
    }

    if (invalidLogin($conn, $username, $password) != false){
        exit();
    }
}
