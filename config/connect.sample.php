<?php
session_start();

$dbserver   = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbdatabase = 'pmb';

$conn = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbdatabase) or die('Koneksi gagal' . mysqli_connect_error());

function base_url($url = null)
{
    $base_url = 'http://localhost/pmb_dasar';
    if ($url != null) {
        return $base_url . '/' . $url;
    } else {
        return $base_url;
    }
}
