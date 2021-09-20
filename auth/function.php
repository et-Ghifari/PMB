<?php
require_once 'dbconnect.php';

function register($regsiter){
    global $conn;

    $name = $regsiter["name"];
    $email = strtolower($regsiter["email"]);
    $password = mysqli_real_escape_string($conn, $regsiter["password"]);
    $confirm = mysqli_real_escape_string($conn, $regsiter["confirm"]);

    $rslt = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
    
    if (mysqli_fetch_assoc($rslt)){
        echo
        "<script>
            alert('Email sudah terdaftar!');
        </script>";

        return false;
    }

    if($password !== $confirm){
        echo
        "<script>
            alert('Konfirmasi password salah!');
        </script>";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query ($conn, "INSERT INTO user (id_user, nama, email, password) VALUES ('','$name','$email','$password')");
    
    return mysqli_affected_rows($conn);
}