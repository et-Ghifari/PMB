<?php
$dbserver   = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbdatabase = 'login';

$conn       = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbdatabase) or die('Koneksi gagal' . mysqli_connect_error());
