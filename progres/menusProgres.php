<?php
include_once '../config/connect.php';

if (!isset($_SESSION['useremail'])) { //Kondisi sesi login
    echo '<script>window.location="' . base_url('auth/login.php') . '";</script>';
    exit();
}

//Read menu   
$dataPage = 4;
$query    = mysqli_query($conn, 'SELECT `menusId`, `menusOrder`, `menusName`, `menusUrl` FROM `menus`');
$data     = mysqli_num_rows($query);
$page     = ceil($data / $dataPage);
$actPage  = (isset($_GET['page'])) ? $_GET['page'] : 1;
$stData   = ($dataPage * $actPage) - $dataPage;

$dataselect = 'SELECT `menusId`, `menusOrder`, `menusName`, `menusUrl` FROM `menus` ORDER BY `menusOrder` LIMIT ?, ?';
$stmtselect = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
    echo '<script>window.location="' . base_url('user/menu.php?error=stmtfailed') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtselect, 'ss', $stData, $dataPage);
mysqli_stmt_execute($stmtselect);
$menus = mysqli_stmt_get_result($stmtselect);