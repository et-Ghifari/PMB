<?php
require_once 'dbconnect.php';

function register($register)
{
    global $conn;

    $nama     = $register['nama'];
    $email    = strtolower($register['email']);
    $password = mysqli_real_escape_string($conn, $register['password']);
    $confirm  = mysqli_real_escape_string($conn, $register['confirm']);

    $rslt = mysqli_query($conn, 'SELECT `email` FROM `user` WHERE `email` = "' . $email . '"');

    if (mysqli_fetch_assoc($rslt)) {
        echo
        '<script>
            alert("Email sudah terdaftar!");
        </script>';

        return false;
    }

    if ($password != $confirm) {
        echo
        '<script>
            alert("Konfirmasi password tidak sama!");
        </script>';

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, 'INSERT INTO `user` (`nama`, `email`, `password`) VALUES ("' . $nama . '","' . $email . '","' . $password . '")');

    if (mysqli_affected_rows($conn)){
        echo
        '<script>
            alert("Pembuatan akun berhasil!")
            document.location.href = "login.php"
        </script>';
    }
}

function login($login)
{
    global $conn;

    $email    = $login['email'];
    $password = $login['password'];
    $result   = mysqli_query($conn, 'SELECT `email`, `password` FROM `user` WHERE `email` = "' . $email . '"');

    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            if (mysqli_affected_rows($conn)){
                echo
                '<script>
                    alert("Login Berhasil!")
                    document.location.href = "dhasboard.php?m=home"
                </script>';
            };
        } else {
            echo
            '<script>
                alert("Email atau password yang dimasukkan salah!");
            </script>';

            return false;
        }
    }
    $error = true;
}
