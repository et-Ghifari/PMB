<?php
session_start();

if(!isset($_SESSION['useremail'])){
    header ('location: login.php');
    exit;
}

if (isset($_POST['register'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    require_once 'auth/functionAuth.php';

    if (emptyInputRegister($name, $email, $username, $password, $confirm) != false) {
        echo
        '<script>
            alert("Isi semua field yang ada!")
            document.location.href = "?m=addUser"
        </script>';
        exit();
    }

    if (invalidEmail($email) != false) {
        echo
        '<script>
            alert("Email tidak sesuai!")
            document.location.href = "?m=addUser"
        </script>';
        exit();
    }

    if (invalidUid($username) != false) {
        echo
        '<script>
            alert("Username tidak sesuai!")
            document.location.href = "?m=addUser"
        </script>';
        exit();
    }

    if (pwdMatch($password, $confirm) != false) {
        echo
        '<script>
            alert("Konfirmasi password tidak sama!")
            document.location.href = "?m=addUser"
        </script>';
        exit();
    }

    if (uidExist($conn, $username, $email) != false) {
        echo
        '<script>
            alert("Email/Usernamae sudah terdaftar!")
            document.location.href = "?m=addUser"
        </script>';
        exit();
    }

    if (createUser($conn, $name, $email, $username, $password)){
        echo
        '<script>
            alert("Penambahan akun berhasil")
            document.location.href = "?m=user"
        </script>';
        exit();
    }
}

$tittle  = 'Tambah User';
$content = VIEW . 'addUserView.php';
include VIEW . 'template.php';
