<?php
session_start();

if(!isset($_SESSION['useremail'])){
    header ('location: login.php');
    exit;
}

if ($_GET['usersId']) {
    $userid = $_GET['usersId'];

    require_once 'auth/functionAuth.php';

    if (deleteUser($conn, $userid)){
        echo
        '<script>
            alert("User berhasil dihapus!")
            document.location.href = "?m=user"
        </script>';
    }
}
