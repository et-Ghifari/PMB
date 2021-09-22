<?php
require_once 'auth/function.php';
if (isset($_POST['register'])) {
    if (register($_POST)) {
        echo
        '<script>
            alert("Pembuatan akun berhasil!")
            document.location.href = "?m=user"
        </script>';
    }
    echo mysqli_error($conn);
}

$tittle  = 'Tambah User';
$content = VIEW . 'addUserView.php';
include VIEW . 'template.php';
