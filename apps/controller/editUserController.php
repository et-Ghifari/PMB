<?php

if ($_POST){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, 'UPDATE `user` SET `nama` = "'.$nama.'", `email` = "'.$email.'", `password` = "'.$password.'" WHERE `email` = "'.$email.'"');

    header ('Location: ?m=user');    
}

if ($_GET['id_user']){

    $idUSer = $_GET['id_user'];
    $data = mysqli_query($conn, 'SELECT `id_user`, `nama`, `email`, `password` FROM `user` WHERE `id_user` = "'.$idUSer.'"');
    $nilai = mysqli_fetch_assoc($data);

    $tittle = 'Ubah User';
    $content = VIEW.'editUserView.php';
    include VIEW.'template.php';
}