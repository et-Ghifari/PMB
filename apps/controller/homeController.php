<?php
session_start();

if(!isset($_SESSION['useremail'])){
    header ('location: login.php');
    exit;
}

$tittle  = 'Dhasboard';
$content = VIEW . 'homeView.php';
include VIEW . 'template.php';
