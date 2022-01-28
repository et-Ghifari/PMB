<?php
require_once '../config/connect.php';
require_once '../config/function.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
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
            <div class="block-header">
                <h2>BUKTI TRANFER</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BUKTI TRANFER PEMBAYARAN PENDAFTARAN</h2>
                            <small>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</small>
                        </div>
                        <div class="body">
                            <form>
                                <label>Upload Bukti Transfer*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="profilDisplay" onclick="triggerClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="profilImage" type="file" name="tf" onchange="displayImage(this)">
                                        </div>
                                    </div>
                                </div>
                                <h5><strong>* = WAJIB DIISI!</strong></h5>
                                <div class="form-group align-center">
                                    <button type="submit" class="btn bg-green m-t-15 waves-effect" name="editProfil">
                                        <i class="material-icons">save</i>
                                        <span><strong>SIMPAN</strong></span>
                                    </button>
                                    <h5><strong>~ Cek Terlebih Dahulu File Yang Telah Di Upload! ~</strong></h5>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
    <script src="<?php echo base_url('../assets/js/display.js') ?>"></script>
</body>

</html>