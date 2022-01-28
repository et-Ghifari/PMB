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
                <h2>BERKAS PENDAFTARAN</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BERKAS PENDAFTARAN</h2>
                            <small>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</small>
                        </div>
                        <div class="body">
                            <form>
                                <label>Upload KTP Calon Mahasiswa*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="ktpDisplay" onclick="ktpClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="ktpFile" type="file" name="ktp" onchange="displayKtp(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Akta Kelahiran*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="aktaDisplay" onclick="aktaClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="aktaFile" type="file" name="akta" onchange="displayAkta(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Kartu Keluarga*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="kkDisplay" onclick="kkClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="kkFile" type="file" name="akta" onchange="displayKk(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Ijazah Terakhir*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="ijazahDisplay" onclick="ijazahClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="ijazahFile" type="file" name="ijazah" onchange="displayIjazah(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Foto Berwarna 3x4*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="x4Display" onclick="x4Click()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="x4File" type="file" name="x4" onchange="displayX4(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload Foto Berwarna 4x6*</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="x6Display" onclick="x6Click()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="x6File" type="file" name="x6" onchange="displayX6(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload KIP</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="kipDisplay" onclick="kipClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="kipFile" type="file" name="kip" onchange="displayKip(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload PKH</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="pkhDisplay" onclick="pkhClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="pkhFile" type="file" name="pkh" onchange="displayPkh(this)">
                                        </div>
                                    </div>
                                </div>
                                <label>Upload KKS</label>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <iframe id="kksDisplay" onclick="kksClick()" src="<?php echo base_url('../assets/files/file.pdf') ?>" width="100%"></iframe>
                                            <p>Format (jpg, jpeg, png, pdf) dan Maksimal Size 1.5 Mb</p>
                                            <input id="kksFile" type="file" name="kks" onchange="displayKks(this)">
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