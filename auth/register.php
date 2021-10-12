<?php
require_once '../config/connect.php';
require_once '../config/function.php';
require_once '../progres/authProgres.php';
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a>Sign - <b>Up</b></a>
            <small>PMB | POLIBANG</small>
        </div>
        <div class="card">
            <div class="body">
                <form action="" method="POST">
                    <?php
                    if (isset($_GET['error']))
                    {
                        if ($_GET['error'] == 'emptyinput') {
                            echo '<div class="alert alert-danger" align="center"><strong>Isi semua formulir yang ada!</strong></div>';
                        } elseif ($_GET['error'] == 'invalidemail') {
                            echo '<div class="alert alert-danger" align="center"><strong>Email tidak sesuai!</strong></div>';
                        } elseif ($_GET['error'] == 'invaliduid') {
                            echo '<div class="alert alert-danger" align="center"><strong>Username tidak sesuai!</strong></div>';
                        } elseif ($_GET['error'] == 'confirmwrong') {
                            echo '<div class="alert alert-danger" align="center"><strong>Konfirmasi password tidak sama!</strong></div>';
                        } elseif ($_GET['error'] == 'registed') {
                            echo '<div class="alert alert-danger" align="center"><strong>Email/Usernamae sudah terdaftar!</strong></div>';
                        }
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" autofocus autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Alamat Email" autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
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
                        <a href="<?= base_url('auth/login.php') ?>">Sudah Mempunyai Akun?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once '../include/script.php'; ?>
</body>

</html>