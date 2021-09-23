<?php
if ($_POST){
    $idUSer   = $_GET['id_user'];
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result   = mysqli_query($conn, 'UPDATE `user` SET `nama` = "'.$nama.'", `email` = "'.$email.'", `password` = "'.$password.'" WHERE `id_user` = "'.$idUSer.'"');

    if (mysqli_affected_rows($conn)){
        echo
        '<script>
            alert("Perubahan user berhasil!")
            document.location.href = "?m=user"
        </script>';
    }    
}

if ($_GET['id_user']){

    $idUSer = $_GET['id_user'];
    $data   = mysqli_query($conn, 'SELECT `id_user`, `nama`, `email`, `password` FROM `user` WHERE `id_user` = "'.$idUSer.'"');
    $nilai  = mysqli_fetch_assoc($data);

    $tittle  = 'Ubah User';
    $content = VIEW.'editUserView.php';
    include VIEW.'template.php';
}