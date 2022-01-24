<?php
require_once '../config/connect.php';
require_once '../config/function.php';

if (!isset($_SESSION['useremail'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="theme-cyan">
    <?php include_once '../include/sidebar.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="<?= !empty($_SESSION['userimage']) ? $_SESSION['userimage'] : base_url('../assets/images/image.png') ?>" width="125" height="125" alt="<?php echo $_SESSION['username'] ?>" />
                            </div>
                            <div class="content-area">
                                <h4><?php echo $_SESSION['username'] ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Pengaturan Profil</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Ganti Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form id="sign_in" action="" method="POST">
                                            <?php
                                            if (isset($_GET['error'])) {
                                                if ($_GET['error'] == 'invalidemail') {
                                                    echo '<div class="alert alert-danger align-center"><strong>Email tidak sesuai!</strong></div>';
                                                }
                                                if ($_GET['error'] == 'invaliduid') {
                                                    echo '<div class="alert alert-danger align-center"><strong>Username tidak sesuai!</strong></div>';
                                                }                                                
                                            }
                                            ?>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">image</i>
                                                </span>
                                                <img id="profilDisplay" onclick="triggerClick()" src="<?= !empty($_SESSION['userimage']) ? $_SESSION['userimage'] : base_url('../assets/images/image.png') ?>" width="100" height="100" alt="<?php echo $_SESSION['username'] ?>" />
                                                <label><small>photo harus 1:1 (format : jpg, jpeg, png) </small></label>                                                
                                                <input id="profilImage" type="file" name="image" onchange="displayImage(this)" style="display:none" required>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">person</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['username'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['useremail'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">account_circle</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['useruid'] ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group align-center">
                                                <button type="submit" class="btn bg-green m-t-15 waves-effect" name="editProfil">
                                                    <i class="material-icons">save</i>
                                                    <span><strong>SIMPAN</strong></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form id="sign_up" action="" method="POST">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="passwordOld" minlength="6" placeholder="Password Lama" required autofocus>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="password" minlength="6" placeholder="Password Baru" required>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Konfirmasi Password Baru" required>
                                                </div>
                                            </div>
                                            <div class="form-group align-center">
                                                <button type="submit" class="btn bg-green m-t-15 waves-effect" name="editProfil">
                                                    <i class="material-icons">save</i>
                                                    <span><strong>SIMPAN</strong></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
    <script src="<?= base_url('../assets/js/profilImage.js') ?>"></script>
</body>

</html>