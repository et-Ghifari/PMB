<?php
require_once '../config/connect.php';

$id = @$_GET['id'];

$datadelete = 'DELETE FROM `users` WHERE `usersId` = ?';
$stmtdelete = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtdelete, $datadelete)) {
    echo '<script>window.location="' . base_url('user/addUser.php?error=stmtfailed') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtdelete, 's', $id);
mysqli_stmt_execute($stmtdelete);
mysqli_stmt_close($stmtdelete);

echo
'<script>
    alert("Akun Berhasil di Hapus")
    document.location="' . base_url('user') . '";
</script>';
exit();
