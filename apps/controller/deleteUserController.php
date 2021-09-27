<?php
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
