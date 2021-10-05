<?php
require_once '../config/connect.php';
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a>Log - <b>In</b></a>
            <small>PMB | POLIBANG</small>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="<?= base_url('progres/authProgres.php') ?>">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'emptyinput') {
                            echo '<div class="alert alert-danger" align="center"><strong>Isi semua formulir yang ada!</strong></div>';
                        } elseif ($_GET['error'] == 'uidwrong') {
                            echo '<div class="alert alert-danger" align="center"><strong>Email/Username yang dimasukkan salah!</strong></div>';
                        } elseif ($_GET['error'] == 'pwdwrong') {
                            echo '<div class="alert alert-danger" align="center"><strong>Password yang dimasukkan salah!</strong></div>';
                        }
                    }
                    ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_circle</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="uid" placeholder="Username/Alamat Email">
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
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit" name="login">MASUK</button>
                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?= base_url('auth/register.php') ?>">Buat Akun Sekarang?</a>
                    </div>
                </form>
            </div>
        </div>
        <div align="center">
            <a href="<?= base_url() ?>" type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float"><i class="material-icons">navigate_before</i></a>
        </div>
    </div>
    <?php include_once '../include/script.php'; ?>
</body>

</html>