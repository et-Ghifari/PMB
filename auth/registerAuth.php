<?php

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    require_once 'connectAuth.php';
    require_once 'functionAuth.php';
    
    
    if (emptyInputRegister($name, $email, $username, $password, $confirm) != false) {
        header('Location: ../register.php?error=mptinput');
        exit();
    }

    if (invalidEmail($email) != false){
        header('Location: ../register.php?error=invemail');
        exit();
    }

    if (invalidUid($username) != false){
        header('Location: ../register.php?error=invuid');
        exit();
    }

    if (pwdMatch($password, $confirm) != false){
        header('Location: ../register.php?error=cnfrmwrong');
        exit();
    }    

    if (uidExist($conn, $username, $email) != false){
        header('Location: ../register.php?error=teken');
        exit();
    }

    if (createUser($conn, $name, $email, $username, $password)){
        header('Location: ../register.php?error=none');
    }
}