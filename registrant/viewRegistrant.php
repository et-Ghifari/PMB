<?php
require_once '../config/connect.php';
require_once '../config/function.php';
include_once '../progres/formProgres.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}
if (!$_SESSION['userlevel'] == 'admin') {
    echo '<script>window.location="' . base_url('../dashboard') . '";</script>';
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
                                <img src="<?= $value['formJk'] == 'L' ? base_url('../assets/images/male.png') : base_url('../assets/images/famale.png') ?>" width="100" height="100" alt="<?php echo $value['formNama'] ?>" />
                            </div>
                            <div class="content-area">
                                <h4><?php echo $value['formNama'] ?></h4>
                                <p><?php echo $value['formNo'] ?></p>
                                <p><?php echo $value['formJalur'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">school</i>
                                        <?= !isset($value['formBeasiswa']) ? '-' : $value['formBeasiswa'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">business_center</i>
                                        <?= empty($value['formProdi']) ? '-' : $value['formProdi'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">access_time</i>
                                        <?= empty($value['formKelas']) ? '-' : $value['formKelas'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">email</i>
                                        <?= empty($value['formEmail']) ? '-' : $value['formEmail'] ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">smartphone</i>
                                        <?= empty($value['formHp']) ? '-' : $value['formHp'] ?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#informasi" aria-controls="home" role="tab" data-toggle="tab">Informasi Mahasiswa</a></li>
                                    <li role="presentation"><a href="#orangtua" aria-controls="settings" role="tab" data-toggle="tab">Informasi Data Orang Tua</a></li>
                                    <li role="presentation"><a href="#prestasi" aria-controls="settings" role="tab" data-toggle="tab">Informasi Prestasi</a></li>
                                    <li role="presentation"><a href="#penunjang" aria-controls="settings" role="tab" data-toggle="tab">Informasi Penunjang</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="informasi">
                                        <label>NISN</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNisn']) ? '-' : $value['formNisn'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>NIK</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNik']) ? '-' : $value['formNik'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tempat Tanggal Lahir</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTptLahir']) ? '-' : $value['formTptLahir'] . ', ' . $value['formTglLahir'] . ' ' . $value['formBlnLahir'] . ' ' . $value['formThnLahir'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Alamat</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formJalan']) ? '-' : $value['formJalan'] . ' ' . $value['formDesa'] . ' ' . $value['formRt'] . '/' . $value['formRw'] . ' ' . $value['formKec'] . ', ' . $value['formKab'] . ', ' . $value['formProv'] . ' - ' . $value['formKodepos'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Hobi</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formHobi']) ? '-' : $value['formHobi'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Cita - Cita</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formCita']) ? '-' : $value['formCita'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Anak ke</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formAnakke']) ? '-' : $value['formAnakke'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Jumlah Saudara</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formSaudara']) ? '-' : $value['formSaudara'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Berat Badan</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formBerat']) ? '-' : $value['formBerat'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tinggi Badan</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTinggi']) ? '-' : $value['formTinggi'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Asal Sekolah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formAsalSekolah']) ? '-' : $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>SKHUN</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formSkhun']) ? '-' : $value['formSkhun'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tahun Lulus</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTahunLulus']) ? '-' : $value['formTahunLulus'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="orangtua">
                                        <label>Kartu Keluarga</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formKkAyah']) ? '-' : $value['formKkAyah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>NIK Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNikAyah']) ? '-' : $value['formNikAyah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Nama Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNamaAyah']) ? '-' : $value['formNamaAyah'] . ', ' . $value['formTglLahir'] . ' ' . $value['formBlnLahir'] . ' ' . $value['formThnLahir'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pekerjaan Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPekerjaanA']) ? '-' : $value['formPekerjaanA'] . ' ' . $value['formDesa'] . ' ' . $value['formRt'] . '/' . $value['formRw'] . ' ' . $value['formKec'] . ', ' . $value['formKab'] . ', ' . $value['formProv'] . ' - ' . $value['formKodepos'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pendidikan Ayah</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPendidikanA']) ? '-' : $value['formPendidikanA'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>NIK Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNikIbu']) ? '-' : $value['formNikIbu'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Nama Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formNamaIbu']) ? '-' : $value['formNamaIbu'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pekerjaan Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPekerjaanI']) ? '-' : $value['formPekerjaanI'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Pendidikan Ibu</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPendidikanI']) ? '-' : $value['formPendidikanI'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Penghasilan Orang Tua</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPenghasilan']) ? '-' : $value['formPenghasilan'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="prestasi">
                                        <label>Cabang Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formLomba']) ? '-' : $value['formLomba'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tingkat Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTingkat']) ? '-' : $value['formTingkat'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Peringkat Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formPeringkat']) ? '-' : $value['formPeringkat'] . ', ' . $value['formTglLahir'] . ' ' . $value['formBlnLahir'] . ' ' . $value['formThnLahir'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Tahun Lomba</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formTahun']) ? '-' : $value['formTahun'] . ' ' . $value['formDesa'] . ' ' . $value['formRt'] . '/' . $value['formRw'] . ' ' . $value['formKec'] . ', ' . $value['formKab'] . ', ' . $value['formProv'] . ' - ' . $value['formKodepos'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="penunjang">
                                    <label>Organisasi Masyarakat Orang Tua/Wali</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formOrganisasi']) ? '-' : $value['formOrganisasi'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Keadaan Calon Mahasiswa</label>
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= empty($value['formKeadaan']) ? '-' : $value['formKeadaan'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="tab-content">
                                    <label>Beasiswa</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?= !isset($value['formBeasiswa']) ? '-' : $value['formBeasiswa'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Program Studi</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formProdi'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Kelas</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formKelas'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>NISN</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formNisn'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>NIK</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formNik'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Tempat Tanggal Lahir</label>
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formTptLahir'] . ', ' . $value['formTglLahir'] . ' ' . $value['formBlnLahir'] . ' ' . $value['formThnLahir'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Alamat</label>
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formJalan'] . ' ' . $value['formDesa'] . ' ' . $value['formRt'] . '/' . $value['formRw'] . ', ' . $value['formKec'] . ', ' . $value['formKab'] . ', ' . $value['formProv'] . ' - ' . $value['formKodepos'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Asal Sekolah</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>SKHUN</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Tahun Lulus</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Kartu Keluarga</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>NIK Ayah</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Nama Ayah</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Pekerjaan Ayah</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Pendidikan Ayah</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>NIK Ibu</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Nama Ibu</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Pekerjaan Ibu</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Pendidikan Ibu</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Penghasilan Orang Tua</label>
                                    <div role="tabpanel" class="tab-pane fade in active">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <?php echo $value['formAsalSekolah'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>FORMULIR PENDAFTARAN</h2>
            </div>
            <div class="card">
                <div class="header">
                    <h2>FORMULIR PENDAFTARAN MANDIRI</h2>
                    <small>Jika ada pertanyaan/masalah dalam pendaftaran bisa menghubungi petugas administrasi</small>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                            <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                                <form id="form_validation" method="POST">

                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingOne_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                                                    <i class="material-icons">school</i>Jalur Pendaftaran
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                                            <div class="panel-body">
                                                <label>Jalur Pendaftaran</label>
                                                <div class="form-group form-float">
                                                    <div class="demo-radio-button">
                                                        <input name="jalur" value="<?php echo $value['formJalur'] ?>" type="radio" id="radio_1" checked required />
                                                        <label for="radio_1"><?php echo $value['formJalur'] ?></label>
                                                    </div>
                                                    <label>Pilih Beasiswa*</label>
                                                    <div class="form-group form-float">
                                                        <select name="beasiswa" class="form-control show-tick" required>
                                                            <option value="<?php echo $value['formBeasiswa'] ?>"><?php echo $value['formBeasiswa'] ?></option>
                                                            <option value="Prestasi Tahfidz">Beasiswa Tahfidz</option>
                                                            <option value="Prestasi Kitab Kuning">Beasiswa Kitab Kuning</option>
                                                            <option value="Prestasi Akademik">Beasiswa Prestasi Akademik</option>
                                                            <option value="Prestasi Non Akademik">Beasiswa Prestasi Non Akademik</option>
                                                            <option value="Prestasi Kelas">Beasiswa Prestasi Kelas</option>
                                                            <option value="Alumni Balekambang">Beasiswa Alumni Balekambang</option>
                                                            <option value="KIP">Beasiswa Kartu Indonesia Pintar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingTwo_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="true" aria-controls="collapseTwo_19">
                                                    <i class="material-icons">business_center</i> Pilih Program Studi
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo_19">
                                            <div class="panel-body">
                                                <label>Program Studi*</label>
                                                <div class="form-group form-float">
                                                    <select name="prodi" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formProdi'] ?>"><?php echo $value['formProdi'] ?></option>
                                                        <option value="RPL">D4-Rekayasa Perangkat Lunak</option>
                                                        <option value="ABI">D4-Administrasi Bisnis Internasional</option>
                                                        <option value="AKP">D4-Akutansi Keuangan Publik</option>
                                                    </select>
                                                </div>
                                                <label>Pilih Kelas*</label>
                                                <div class="form-group form-float">
                                                    <select name="kelas" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formKelas'] ?>"><?php echo $value['formKelas'] ?></option>
                                                        <option value="Reguler">Reguler</option>
                                                        <option value="Karyawan">Karyawan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingThree_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseThree_19" aria-expanded="true" aria-controls="collapseThree_19">
                                                    <i class="material-icons">account_box</i> Informasi Data Pribadi
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree_19">
                                            <div class="panel-body">
                                                <label>Nomor Pendaftaran*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="no" class="form-control" placeholder="nomor pendaftaran" required value="<?php echo $value['formNo'] ?>" />
                                                    </div>
                                                </div>
                                                <label>NISN*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" class="form-control" name="nisn" placeholder="nisn" maxlength="10" minlength="10" required value="<?php echo $value['formNisn'] ?>">
                                                    </div>
                                                </div>
                                                <label>NIK*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="nik" class="form-control" placeholder="nik" maxlength="16" minlength="16" required value="<?php echo $value['formNik'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Nama Lengkap*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="nama" class="form-control" placeholder="nama lengkap" required value="<?php echo $value['formNama'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Tempat Tanggal Lahir*</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" name="tempat" class="form-control" placeholder="tempat" required value="<?php echo $value['formTptLahir'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="tgl" class="form-control show-tick" required>
                                                                <option value="<?php echo $value['formTglLahir'] ?>"><?php echo $value['formTglLahir'] ?></option>
                                                                <?php for ($a = 1; $a < 32; $a++) {
                                                                ?>
                                                                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="bln" class="form-control show-tick" required>
                                                                <option value="<?php echo $value['formBlnLahir'] ?>"><?php echo $value['formBlnLahir'] ?></option>
                                                                <option value="Januari">Januari</option>
                                                                <option value="Februari">Februari</option>
                                                                <option value="Maret">Maret</option>
                                                                <option value="April">April</option>
                                                                <option value="Mei">Mei</option>
                                                                <option value="Juni">Juni</option>
                                                                <option value="Juli">Juli</option>
                                                                <option value="Agustus">Agustus</option>
                                                                <option value="September">September</option>
                                                                <option value="Oktober">Oktober</option>
                                                                <option value="November">November</option>
                                                                <option value="Desember">Desember</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group form-float">
                                                            <select name="thn" class="form-control show-tick" required>
                                                                <option value="<?php echo $value['formThnLahir'] ?>"><?php echo $value['formThnLahir'] ?></option>
                                                                <?php $th = date('Y') - 30; ?>
                                                                <?php for ($th; $th <= date('Y'); $th++) {
                                                                ?>
                                                                    <option value="<?php echo $th; ?>"><?php echo $th; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Jenis Kelamin*</label>
                                                <div class="form-group form-float">
                                                    <div class="demo-radio-button">
                                                        <input name="jk" value="L" type="radio" id="radio_2" required <?= $value['formJk'] == 'L' ? 'checked' : '' ?> />
                                                        <label for="radio_2">Laki - Laki</label>
                                                        <input name="jk" value="P" type="radio" id="radio_3" required <?= $value['formJk'] == 'P' ? 'checked' : '' ?> />
                                                        <label for="radio_3">Perempuan</label>
                                                    </div>
                                                </div>
                                                <label>Hobi</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="hobi" class="form-control" placeholder="hobi" value="<?php echo $value['formHobi'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Cita - Cita</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="cita" class="form-control" placeholder="cita - cita" value="<?php echo $value['formCita'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Anak ke</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="anakke" class="form-control" placeholder="isi angka" value="<?php echo $value['formAnakke'] ?>>" />
                                                    </div>
                                                </div>
                                                <label>Jumlah Saudara</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="saudara" class="form-control" placeholder="isi angka" value="<?php echo $value['formSaudara'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Berat Badan</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="number" name="berat" class="form-control" placeholder="isi angka" value="<?php echo $value['formBerat'] ?>" />
                                                            </div>
                                                            <span class="input-group-addon">
                                                                <label>Kg</label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Tinggi Badan</label>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="input-group">
                                                            <div class="form-line">
                                                                <input type="number" name="tinggi" class="form-control" placeholder="isi angka" value="<?php echo $value['formTinggi'] ?>" />
                                                            </div>
                                                            <span class="input-group-addon">
                                                                <label>Cm</label>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Provinsi*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="provinsi" class="form-control" placeholder="provinsi" required value="<?php echo $value['formProv'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Kabupaten*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="kabupaten" class="form-control" placeholder="kabupaten" required value="<?php echo $value['formKab'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Kecamatan*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" required value="<?php echo $value['formKec'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Desa*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="desa" class="form-control" placeholder="desa" required value="<?php echo $value['formDesa'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Jl/No.Rumah/dll*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <textarea type="text" name="jalan" class="form-control" placeholder="Jl./No.Rumah/dll" required value="<?php echo $value['formJalan'] ?>"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="number" name="rt" class="form-control" placeholder="RT" required value="<?php echo $value['formRt'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="number" name="rw" class="form-control" placeholder="RW" required value="<?php echo $value['formRw'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="number" name="kodepos" class="form-control" placeholder="Kode Pos" maxlength="5" minlength="5" required value="<?php echo $value['formKodepos'] ?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Handphone/WA*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="hp" class="form-control" placeholder="handphone/wa" required value="<?php echo $value['formHp'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Alamat Email*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="email" class="form-control" value="<?php echo $value['formEmail'] ?>" required />
                                                    </div>
                                                </div>
                                                <label>Asal Sekolah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="asalsekolah" class="form-control" placeholder="asal sekolah" required value="<?php echo $value['formAsalSekolah'] ?>" />
                                                    </div>
                                                </div>
                                                <label>No. SKHUN</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="skhun" class="form-control" placeholder="no. skhun" value="<?php echo $value['formSkhun'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Tahun Lulus*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="tahunlulus" class="form-control" placeholder="tahun lulus" required value="<?php echo $value['formTahunLulus'] ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingFour_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseFour_19" aria-expanded="true" aria-controls="collapseFour_19">
                                                    <i class="material-icons">face</i> Informasi Data Orangtua
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour_19">
                                            <div class="panel-body">
                                                <label>Nomor KK*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="kk" class="form-control" placeholder="nomor kk" maxlength="16" minlength="16" required value="<?php echo $value['formKkAyah'] ?>" />
                                                    </div>
                                                </div>
                                                <br></br>
                                                <label>NIK Ayah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="nikAyah" class="form-control" placeholder="nik ayah" maxlength="16" minlength="16" required value="<?php echo $value['formNikAyah'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Nama Ayah*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="ayah" class="form-control" placeholder="nama ayah" required value="<?php echo $value['formNamaAyah'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Pekerjaan Ayah*</label>
                                                <div class="form-group form-float">
                                                    <select name="pekerjaanAyah" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formPekerjaanA'] ?>"><?php echo $value['formPekerjaanA'] ?></option>
                                                        <option value="Buruh">Buruh</option>
                                                        <option value="Dosen">Dosen</option>
                                                        <option value="Guru">Guru</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="Supir">Supir</option>
                                                        <option value="Tukang">Tukang</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <label>Pendidikan Ayah*</label>
                                                <div class="form-group form-float">
                                                    <select name="pendidikanAyah" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formPendidikanA'] ?>"><?php echo $value['formPendidikanA'] ?></option>
                                                        <option value="SD/MI">SD/MI</option>
                                                        <option value="SMP/MTs">SMP/MTs</option>
                                                        <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                        <option value="D1">D1</option>
                                                        <option value="D2">D2</option>
                                                        <option value="D3">D3</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="Pesantren">Pesantren</option>
                                                    </select>
                                                </div>
                                                <br></br>
                                                <label>NIK Ibu*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="nikIbu" class="form-control" placeholder="nik ibu" maxlength="16" minlength="16" required value="<?php echo $value['formNikIbu'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Nama Ibu*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="ibu" class="form-control" placeholder="nama ibu" required value="<?php echo $value['formNamaIbu'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Pekerjaan Ibu*</label>
                                                <div class="form-group form-float">
                                                    <select name="pekerjaanIbu" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formPekerjaanI'] ?>"><?php echo $value['formPekerjaanI'] ?></option>
                                                        <option value="Buruh">Buruh</option>
                                                        <option value="Dosen">Dosen</option>
                                                        <option value="Guru">Guru</option>
                                                        <option value="Nelayan">Nelayan</option>
                                                        <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                        <option value="Petani">Petani</option>
                                                        <option value="PNS">PNS</option>
                                                        <option value="Supir">Supir</option>
                                                        <option value="Tukang">Tukang</option>
                                                        <option value="Wiraswasta">Wiraswasta</option>
                                                        <option value="Lainnya">Lainnya</option>
                                                    </select>
                                                </div>
                                                <label>Pendidikan Ibu*</label>
                                                <div class="form-group form-float">
                                                    <select name="pendidikanIbu" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formPendidikanI'] ?>"><?php echo $value['formPendidikanI'] ?></option>
                                                        <option value="SD/MI">SD/MI</option>
                                                        <option value="SMP/MTs">SMP/MTs</option>
                                                        <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                                        <option value="D1">D1</option>
                                                        <option value="D2">D2</option>
                                                        <option value="D3">D3</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="Pesantren">Pesantren</option>
                                                    </select>
                                                </div>
                                                <br></br>
                                                <label>Rata - Rata Penghasilan Orang Tua*</label>
                                                <div class="form-group form-float">
                                                    <select name="penghasilan" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formPenghasilan'] ?>"><?php echo $value['formPenghasilan'] ?></option>
                                                        <option value="< 500.000">< 500.000</option>
                                                        <option value="500.000 - 1.000.000">500.000 - 1.000.000</option>
                                                        <option value="1.000.000 - 2.000.000">1.000.000 - 2.000.000</option>
                                                        <option value="2.000.000 - 3.000.000">2.000.000 - 3.000.000</option>
                                                        <option value="3.000.000 - 5.000.000">3.000.000 - 5.000.000</option>
                                                        <option value="> 5.000.000">> 5.000.000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingFive_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseFive_19" aria-expanded="true" aria-controls="collapseFive_19">
                                                    <i class="material-icons">star</i> Informasi Prestasi
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive_19">
                                            <div class="panel-body">
                                                <label>Cabang Lomba</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="lomba" class="form-control" placeholder="cabang lomba" value="<?php echo $value['formLomba'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Tingkat Lomba</label>
                                                <div class="form-group form-float">
                                                    <select name="tingkat" class="form-control show-tick">
                                                        <option value="<?php echo $value['formTingkat'] ?>"><?php echo $value['formTingkat'] ?></option>
                                                        <option value="Kecamatan">Kecamatan</option>
                                                        <option value="Kabupaten">Kabupaten</option>
                                                        <option value="Provinsi">Provinsi</option>
                                                        <option value="Nasioanl">Nasioanl</option>
                                                        <option value="International">International</option>
                                                    </select>
                                                </div>
                                                <label>Peringkat Lomba</label>
                                                <div class="form-group form-float">
                                                    <select name="peringkat" class="form-control show-tick">
                                                        <option value="<?php echo $value['formPeringkat'] ?>"><?php echo $value['formPeringkat'] ?></option>
                                                        <option value="Juara I">Juara I</option>
                                                        <option value="Juara II">Juara II</option>
                                                        <option value="Juara III">Juara III</option>
                                                        <option value="Juara Harapan">Juara Harapan</option>
                                                    </select>
                                                </div>
                                                <label>Tahun Lomba</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="number" name="tahun" class="form-control" placeholder="tahun lomba" value="<?php echo $value['formTahun'] ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-col-cyan">
                                        <div class="panel-heading" role="tab" id="headingSix_19">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" href="#collapseSix_19" aria-expanded="true" aria-controls="collapseSix_19">
                                                    <i class="material-icons">receipt</i> Informasi Penunjang
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSix_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix_19">
                                            <div class="panel-body">
                                                <label>Organisasi Masyarakat Orang Tua/Wali*</label>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <input type="text" name="organisasi" class="form-control" placeholder="NU/Muhammadiyah/PERSIS dll" required value="<?php echo $value['formOrganisasi'] ?>" />
                                                    </div>
                                                </div>
                                                <label>Keadaan Calon Mahasiswa*</label>
                                                <div class="form-group form-float">
                                                    <select name="keadaan" class="form-control show-tick" required>
                                                        <option value="<?php echo $value['formKeadaan'] ?>"><?php echo $value['formKeadaan'] ?></option>
                                                        <option value="Lengkap">Lengkap</option>
                                                        <option value="Yatim">Yatim</option>
                                                        <option value="Piatu">Piatu</option>
                                                        <option value="Yatim Piatu">Yatim Piatu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5><strong>* = WAJIB DIISI!</strong></h5>
                                    <div class="row clearfix">
                                        <div class="button-demo align-center">
                                            <button type="submit" class="btn bg-green m-t-15 waves-effect" name="addMandiri">
                                                <i class="material-icons">save</i>
                                                <span><strong>SIMPAN</strong></span>
                                            </button>
                                            <h5><strong>~ Cek Terlebih Dahulu Formulir Yang Telah Diisi! ~</strong></h5>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <?php include_once '../include/script.php'; ?>
</body>

</html>