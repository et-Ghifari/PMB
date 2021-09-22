<?php

$users = mysqli_query($conn, 'SELECT `id_user`, `nama`, `email` FROM `user`');

$tittle = 'Managemen User';
$content = VIEW . 'userView.php';
include VIEW . 'template.php';
