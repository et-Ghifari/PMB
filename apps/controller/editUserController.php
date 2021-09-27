<?php
if ($_POST) {
    $userid   = $_GET['usersId'];
    $name     = $_POST['name'];
    $email     = $_POST['email'];
    $username    = $_POST['username'];
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

    if (uidExist($conn, $username, $email) != false) {
        echo
        '<script>
            alert("Email/Usernamae sudah terdaftar!")
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
    
    if (readUser($conn, $userid)){

    }

    $tittle  = 'Ubah User';
    $content = VIEW . 'editUserView.php';
    include VIEW . 'template.php';
}
