<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "pendaftaran";
    
    $conn = mysqli_connect($server,$username,$password,$database) or die ("Koneksi gagal".mysqli_connect_error());
    
    function reg($data){
        global $conn;

        $name = $data["name"];
        $email = strtolower($data["email"]);
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $cpassword = mysqli_real_escape_string($conn, $data["cpassword"]);

        $rlt = "SELECT email FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $rlt);
        if (mysqli_fetch_assoc($result)){
            echo
            "<script>
                alert('Email sudah terdaftar!');
            </script>";

            return false;
        }
        
        if($password !== $cpassword){
            echo
            "<script>
                alert('Konfirmasi password salah!');
            </script>";
    
            return false;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (id_user, nama, email, password) VALUES ('','$name','$email','$password')";
        if (mysqli_query($conn, $sql)) {
            echo
            "<script>
                alert('Pembuatan akun berhasil!');
            </script>";
        }
    }