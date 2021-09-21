<?php
require_once 'auth/dbconnect.php';

$users = mysqli_query($conn, 'SELECT `nama`, `email` FROM `user`');

$tittle = 'Managemen User';
$content = VIEW.'userView.php';
include VIEW.'template.php';