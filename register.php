<?php

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PMB | POLIBANG</title>
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="assets/css/style.ds.css" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a>Sign - <b>Up</b></a>
            <small>PMB | POLIBANG</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="auth/registerAuth.php" method="POST">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'mptinput') {
                            echo '<div class="alert alert-danger"><strong>Isi semua formulir yang ada!</strong></div>';
                        } elseif ($_GET['error'] == 'invemail') {
                            echo '<div class="alert alert-danger"><strong>Email tidak sesuai!</strong></div>';
                        } elseif ($_GET['error'] == 'invuid') {
                            echo '<div class="alert alert-danger"><strong>Username tidak sesuai!</strong></div>';
                        } elseif ($_GET['error'] == 'cnfrmwrong') {
                            echo '<div class="alert alert-danger"><strong>Konfirmasi password tidak sama!</strong></div>';
                        } elseif ($_GET['error'] == 'teken') {
                            echo '<div class="alert alert-danger"><strong>Email/Usernamae sudah terdaftar!</strong></div>';
                        }
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" placeholder="Konfirmasi Password">
                        </div>
                    </div>
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="register">BUAT AKUN</button>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">Sudah Mempunyai Akun?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/node-waves/waves.js"></script>
    <script src="assets/js/admin.js"></script>
</body>

</html>