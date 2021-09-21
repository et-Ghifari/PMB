<?php
$server   = 'localhost';
$username = 'root';
$password = '';
$database = 'pendaftaran';

$conn     = mysqli_connect($server,$username,$password,$database) or die ('Koneksi gagal'.mysqli_connect_error());