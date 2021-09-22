<?php
if ($_GET['id_user']){
    $id_user = $_GET['id_user'];

    mysqli_query($conn, 'DELETE FROM `user` WHERE `id_user` = "'.$id_user.'"');
    
    header('Location: ?m=user');
}