<?php
    require_once 'auth/function.php';

    if(isset($_POST["login"])){
        $email = $_POST ["email"];
        $password = $_POST ["password"];

        $result = mysqli_query($conn,"SELECT email FROM user WHERE email = '$email'");

        if (mysqli_num_rows($result) === 1){

            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
        
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PMB | POLIBANG</title>
    <!-- Favicons -->
    <link href="assets/hm/img/favicon.png" rel="icon">
    <link href="assets/hm/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="assets/ds/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="assets/ds/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="assets/ds/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/ds/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a>Log - <b>In</b></a>
            <small>PMB | POLIBANG</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Masuk untuk memulai sesi anda</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="Alamat Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="login">MASUK</button>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="register.php">Buat Akun Sekarang?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="assets/ds/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/ds/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="assets/ds/plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="assets/ds/js/admin.js"></script>
    <script src="assets/ds/js/pages/examples/sign-in.js"></script>
</body>

</html>