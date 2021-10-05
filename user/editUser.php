<?php
require_once '../progres/userProgres.php';

$id     = @$_GET['id'];
$data   = mysqli_query($conn, 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users` WHERE `usersId` = "' . $id . '"');
$nilai  = mysqli_fetch_assoc($data);
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
                            <h2>Edit User</h2>
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
                                            <div class="form-line disabled">
                                                <input type="text" name="name" class="form-control" value="<?= $nilai['usersName'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email">Email Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line disabled">
                                                <input type="email" name="email" class="form-control" value="<?= $nilai['usersEmail'] ?>">
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
                                            <div class="form-line disabled">
                                                <input type="text" name="username" class="form-control" value="<?= $nilai['usersUid'] ?>">
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
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <div class="button-demo">
                                            <button type="submit" class="btn btn-success m-t-15 waves-effect" name="edit">SIMPAN</button>
                                            <a type="button" href="<?= base_url('user') ?>" class="btn btn-danger m-t-15 waves-effect">KEMBALI</a>
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