<?php
    require_once 'auth/function.php';

    if(isset($_POST['login'])){
        if(login($_POST)){

        }
        echo mysqli_error($conn);        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PMB | POLIBANG</title>
    <link href="assets/image/favicon.png" rel="icon">
    <link href="assets/image/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="assets/css/style.ds.css" rel="stylesheet">
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
        <div align="center">
            <a href="index.php" type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">navigate_before</i></a>
        </div>
    </div>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/node-waves/waves.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/examples/sign-in.js"></script>
</body>
</html>