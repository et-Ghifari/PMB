<?php
session_start();

if(!isset($_SESSION['useremail'])){
    header ('location: login.php');
    exit;
}

if ($_POST) {
    $userid   = $_GET['usersId'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'auth/functionAuth.php';

    if (invalidEmail($email) != false) {
        echo
        '<script>
            alert("Email tidak sesuai!")
            document.location.href = "?m=user"
        </script>';
        exit();
    }

    if (invalidUid($username) != false) {
        echo
        '<script>
            alert("Username tidak sesuai!")
            document.location.href = "?m=user"
        </script>';
        exit();
    }

    if (updateUser($conn, $userid, $name, $email, $username, $password)){
        echo
        '<script>
            alert("Penambahan akun berhasil")
            document.location.href = "?m=user"
        </script>';
        exit();
    }
}

if ($_GET['usersId']) {

    $userid = $_GET['usersId'];    
    $data   = mysqli_query($conn, 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd` FROM `users` WHERE `usersId` = "' . $userid . '"');
    $nilai  = mysqli_fetch_assoc($data);

    $tittle  = 'Ubah User';
    $content = VIEW . 'editUserView.php';
    include VIEW . 'template.php';
}
