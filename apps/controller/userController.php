<?php
session_start();

if(!isset($_SESSION['useremail'])){
    header ('location: login.php');
    exit;
}

$users = mysqli_query($conn, 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users`');

$tittle  = 'Managemen User';
$content = VIEW . 'userView.php';
include VIEW . 'template.php';
