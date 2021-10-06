<?php
require_once '../progres/userProgres.php';
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="theme-cyan">
    <?php include_once '../include/sidebar.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah User</h2>
                        </div>
                        <div class="body">
                            <?php
                            if (isset($_GET['error'])) {
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
                            <form class="form-horizontal" action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" autofocus autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Alamat Email</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="email" name="email" class="form-control" placeholder="Alamat Email" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">Konfirmasi Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="confirm" class="form-control" placeholder="Konfirmasi Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <div class="button-demo">
                                            <button type="submit" class="btn bg-green m-t-15 waves-effect" name="add">
                                                <i class="material-icons">save</i>
                                                <span><strong>SIMPAN</strong></span>
                                            </button>
                                            <button type="reset" class="btn btn-default m-t-15 waves-effect">
                                                <i class="material-icons">clear</i>
                                                <span><strong>HAPUS</strong></span>
                                            </button>
                                            <a type="button" href="<?= base_url('user') ?>" class="btn bg-red m-t-15 waves-effect">
                                                <i class="material-icons">backspace</i>
                                                <span><strong>KEMBALI</strong></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>