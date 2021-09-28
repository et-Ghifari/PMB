<?php
session_start();

if(!isset($_SESSION['useremail'])){
    header ('location: login.php');
    exit;
}

/* $jmlDataHal = 5;
$rslt = mysqli_query($conn, 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users`');
$jmlData = mysqli_num_rows($rslt);
$jmlHal = ceil($jmlData / $jmlDataHal);
$actHal = ( isset($_GET['user']) ) ? $_GET['user'] : 1;
$dataAwal = ($jmlDataHal * $actHal) - $jmlDataHal; */

$users = mysqli_query($conn, 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users`');

$tittle  = 'Managemen User';
$content = VIEW . 'userView.php';
include VIEW . 'template.php';
