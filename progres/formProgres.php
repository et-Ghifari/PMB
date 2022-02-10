<?php

require_once 'selectProgres.php';

$dataTotal = mysqli_query($conn, 'SELECT `formId` FROM `mahasiswas`');
$total     = mysqli_num_rows($dataTotal);

$dataRpl = mysqli_query($conn, "SELECT `formProdi` FROM `mahasiswas` WHERE `formProdi` = 'RPL'");
$rpl     = mysqli_num_rows($dataRpl);

$dataAbi = mysqli_query($conn, 'SELECT `formProdi` FROM `mahasiswas` WHERE `formProdi` = "ABI"');
$abi     = mysqli_num_rows($dataAbi);

$dataAkp = mysqli_query($conn, 'SELECT `formProdi` FROM `mahasiswas` WHERE `formProdi` = "AKP"');
$akp     = mysqli_num_rows($dataAkp);

$dataRpl = mysqli_query($conn, 'SELECT `formJalur` FROM `mahasiswas` WHERE `formJalur` = "MANDIRI"');
$mandiri = mysqli_num_rows($dataRpl);

$dataRpl  = mysqli_query($conn, 'SELECT `formJalur` FROM `mahasiswas` WHERE `formJalur` = "BEASISWA"');
$beasiswa = mysqli_num_rows($dataRpl);


if (isset($_POST['addMandiri'])) {

    $formJalur       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['jalur'])));
    $formProdi       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['prodi'])));
    $formKelas       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['kelas'])));
    $formNisn        = trim(mysqli_real_escape_string($conn, $_POST['nisn']));

    $formNik         = trim(mysqli_real_escape_string($conn, $_POST['nik']));
    $formNama        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['nama'])));
    $formTptLahir    = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['tempat'])));
    $formTglLahir    = trim(mysqli_real_escape_string($conn, $_POST['tgl']));
    $formBlnLahir    = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['bln'])));

    $formThnLahir    = trim(mysqli_real_escape_string($conn, $_POST['thn']));
    $formJk          = trim(mysqli_real_escape_string($conn, $_POST['jk']));
    $formHobi        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['hobi'])));
    $formCita        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['cita'])));
    $formAnakke      = trim(mysqli_real_escape_string($conn, $_POST['anakke']));

    $formSaudara     = trim(mysqli_real_escape_string($conn, $_POST['saudara']));
    $formBerat       = trim(mysqli_real_escape_string($conn, $_POST['berat']));
    $formTinggi      = trim(mysqli_real_escape_string($conn, $_POST['tinggi']));
    $formJalan       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['jalan'])));
    $formRt          = trim(mysqli_real_escape_string($conn, $_POST['rt']));

    $formRw          = trim(mysqli_real_escape_string($conn, $_POST['rw']));
    $formDesa        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['desa'])));
    $formKec         = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['kecamatan'])));
    $formKab         = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['kabupaten'])));
    $formProv        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['provinsi'])));

    $formKodepos     = trim(mysqli_real_escape_string($conn, $_POST['kodepos']));
    $formHp          = trim(mysqli_real_escape_string($conn, $_POST['hp']));
    $formEmail       = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $formAsalSekolah = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['asalSekolah'])));
    $formSkhun       = trim(mysqli_real_escape_string($conn, $_POST['skhun']));

    $formTahunLulus  = trim(mysqli_real_escape_string($conn, $_POST['tahunLulus']));
    $formKkAyah      = trim(mysqli_real_escape_string($conn, $_POST['kk']));
    $formNikAyah     = trim(mysqli_real_escape_string($conn, $_POST['nikAyah']));
    $formNamaAyah    = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['ayah'])));
    $formPekerjaanA  = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pekerjaanAyah'])));

    $formPendidikanA = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pendidikanAyah'])));
    $formNikIbu      = trim(mysqli_real_escape_string($conn, $_POST['nikIbu']));
    $formNamaIbu     = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['ibu'])));
    $formPekerjaanI  = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pekerjaanIbu'])));
    $formPendidikanI = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pendidikanIbu'])));

    $formPenghasilan = trim(mysqli_real_escape_string($conn, $_POST['penghasilan']));
    $formLomba       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['lomba'])));
    $formTingkat     = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['tingkat'])));
    $formPeringkat   = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['peringkat'])));
    $formTahun       = trim(mysqli_real_escape_string($conn, $_POST['tahun']));

    $formOrganisasi  = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['organisasi'])));
    $formKeadaan     = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['keadaan'])));

    /* if (empty($formProdi) || empty($formNisn) || empty($formKkAyah) || empty($formOrganisasi))
    {
        echo '<script>document.location="' . base_url('formMandiri.php?error=emptyform') . '";</script>';
        exit();
    }  */   

    $dataselect = 'SELECT `formNik` FROM `mahasiswas` WHERE `formNik` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('formMandiri.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $formNik);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        echo '<script>window.location="' . base_url('formMandiri.php?error=registed') . '";</script>';
        exit();
    }

    $getMaxId = mysqli_query($conn, 'SELECT MAX(RIGHT(`formNo`, 5)) AS `formId` FROM `mahasiswas`');
    $d = mysqli_fetch_object($getMaxId);
    $formNo = 'PMB' . date('Y') . sprintf('%05s', $d->formId + 1);

    $datainsert = 'INSERT INTO `mahasiswas`
                    (`formNo`,
                    `formJalur`,
                    `formProdi`,
                    `formKelas`,
                    `formNisn`,

                    `formNik`,
                    `formNama`,
                    `formTptLahir`,
                    `formTglLahir`,
                    `formBlnLahir`,

                    `formThnLahir`,
                    `formJk`,
                    `formHobi`,
                    `formCita`,
                    `formAnakke`,

                    `formSaudara`,                    
                    `formBerat`,
                    `formTinggi`,
                    `formJalan`,
                    `formRt`,

                    `formRw`,
                    `formDesa`,
                    `formKec`,
                    `formKab`,
                    `formProv`,

                    `formKodepos`,                    
                    `formHp`,
                    `formEmail`,
                    `formAsalSekolah`,
                    `formSkhun`,

                    `formTahunLulus`,
                    `formKkAyah`,
                    `formNikAyah`,
                    `formNamaAyah`,                    
                    `formPekerjaanA`,

                    `formPendidikanA`,
                    `formNikIbu`,
                    `formNamaIbu`,
                    `formPekerjaanI`,
                    `formPendidikanI`,

                    `formPenghasilan`,
                    `formLomba`,
                    `formTingkat`,
                    `formPeringkat`,
                    `formTahun`,

                    `formOrganisasi`,
                    `formKeadaan`)
                    VALUES
                    (?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?)';

    $stmtinsert = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
        echo '<script>window.location="' . base_url('formMandiri.php?error=stmtmandiri') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param(
        $stmtinsert,
        'sssssssssssssssssssssssssssssssssssssssssssssss',
        $formNo,
        $formJalur,
        $formProdi,
        $formKelas,
        $formNisn,

        $formNik,
        $formNama,
        $formTptLahir,
        $formTglLahir,
        $formBlnLahir,

        $formThnLahir,
        $formJk,
        $formHobi,
        $formCita,
        $formAnakke,

        $formSaudara,
        $formBerat,
        $formTinggi,
        $formJalan,
        $formRt,

        $formRw,
        $formDesa,
        $formKec,
        $formKab,
        $formProv,

        $formKodepos,
        $formHp,
        $formEmail,
        $formAsalSekolah,
        $formSkhun,

        $formTahunLulus,
        $formKkAyah,
        $formNikAyah,
        $formNamaAyah,
        $formPekerjaanA,

        $formPendidikanA,
        $formNikIbu,
        $formNamaIbu,
        $formPekerjaanI,
        $formPendidikanI,

        $formPenghasilan,
        $formLomba,
        $formTingkat,
        $formPeringkat,
        $formTahun,

        $formOrganisasi,
        $formKeadaan
    );

    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);

    echo
    '<script>
            alert("Pendaftaran Jalur Mandiri Berhasil")
            document.location="' . base_url('form.php') . '";
        </script>';
    exit();
}

if (isset($_POST['addBeasiswa'])) {
    $formBeasiswa    = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['beasiswa'])));
    $formJalur       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['jalur'])));
    $formProdi       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['prodi'])));
    $formKelas       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['kelas'])));

    $formNisn        = trim(mysqli_real_escape_string($conn, $_POST['nisn']));
    $formNik         = trim(mysqli_real_escape_string($conn, $_POST['nik']));
    $formNama        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['nama'])));
    $formTptLahir    = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['tempat'])));
    $formTglLahir    = trim(mysqli_real_escape_string($conn, $_POST['tgl']));

    $formBlnLahir    = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['bln'])));
    $formThnLahir    = trim(mysqli_real_escape_string($conn, $_POST['thn']));
    $formJk          = trim(mysqli_real_escape_string($conn, $_POST['jk']));
    $formHobi        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['hobi'])));
    $formCita        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['cita'])));

    $formAnakke      = trim(mysqli_real_escape_string($conn, $_POST['anakke']));
    $formSaudara     = trim(mysqli_real_escape_string($conn, $_POST['saudara']));
    $formBerat       = trim(mysqli_real_escape_string($conn, $_POST['berat']));
    $formTinggi      = trim(mysqli_real_escape_string($conn, $_POST['tinggi']));
    $formJalan       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['jalan'])));

    $formRt          = trim(mysqli_real_escape_string($conn, $_POST['rt']));
    $formRw          = trim(mysqli_real_escape_string($conn, $_POST['rw']));
    $formDesa        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['desa'])));
    $formKec         = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['kecamatan'])));
    $formKab         = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['kabupaten'])));

    $formProv        = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['provinsi'])));
    $formKodepos     = trim(mysqli_real_escape_string($conn, $_POST['kodepos']));
    $formHp          = trim(mysqli_real_escape_string($conn, $_POST['hp']));
    $formEmail       = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $formAsalSekolah = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['asalSekolah'])));

    $formSkhun       = trim(mysqli_real_escape_string($conn, $_POST['skhun']));
    $formTahunLulus  = trim(mysqli_real_escape_string($conn, $_POST['tahunLulus']));
    $formKkAyah      = trim(mysqli_real_escape_string($conn, $_POST['kk']));
    $formNikAyah     = trim(mysqli_real_escape_string($conn, $_POST['nikAyah']));
    $formNamaAyah    = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['ayah'])));

    $formPekerjaanA  = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pekerjaanAyah'])));
    $formPendidikanA = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pendidikanAyah'])));
    $formNikIbu      = trim(mysqli_real_escape_string($conn, $_POST['nikIbu']));
    $formNamaIbu     = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['ibu'])));
    $formPekerjaanI  = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pekerjaanIbu'])));

    $formPendidikanI = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['pendidikanIbu'])));
    $formPenghasilan = trim(mysqli_real_escape_string($conn, $_POST['penghasilan']));
    $formLomba       = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['lomba'])));
    $formTingkat     = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['tingkat'])));
    $formPeringkat   = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['peringkat'])));

    $formTahun       = trim(mysqli_real_escape_string($conn, $_POST['tahun']));
    $formOrganisasi  = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['organisasi'])));
    $formKeadaan     = trim(strtoupper(mysqli_real_escape_string($conn, $_POST['keadaan'])));

    /* if (empty($formProdi) || empty($formNisn) || empty($formKkAyah) || empty($formOrganisasi)) {
        echo '<script>window.location="' . base_url('formBeasiswa.php?error=emptyform') . '";</script>';
        exit();
    } */

    $dataselect = 'SELECT `formNik` FROM `mahasiswas` WHERE `formNik` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('formBeasiswa.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $formNik);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        echo '<script>window.location="' . base_url('formBeasiswa.php?error=registed') . '";</script>';
        exit();
    }

    $getMaxId = mysqli_query($conn, 'SELECT MAX(RIGHT(`formNo`, 5)) AS `formId` FROM `mahasiswas`');
    $d = mysqli_fetch_object($getMaxId);
    $formNo = 'PMB' . date('Y') . sprintf('%05s', $d->formId + 1);

    $datainsert = 'INSERT INTO `mahasiswas`
                    (`formNo`,                    
                    `formJalur`,
                    `formBeasiswa`,
                    `formProdi`,
                    `formKelas`,

                    `formNisn`,
                    `formNik`,
                    `formNama`,
                    `formTptLahir`,
                    `formTglLahir`,

                    `formBlnLahir`,
                    `formThnLahir`,
                    `formJk`,
                    `formHobi`,
                    `formCita`,

                    `formAnakke`,
                    `formSaudara`,
                    `formBerat`,
                    `formTinggi`,
                    `formJalan`,

                    `formRt`,
                    `formRw`,
                    `formDesa`,
                    `formKec`,
                    `formKab`,

                    `formProv`,
                    `formKodepos`,
                    `formHp`,
                    `formEmail`,
                    `formAsalSekolah`,

                    `formSkhun`,
                    `formTahunLulus`,
                    `formKkAyah`,
                    `formNikAyah`,
                    `formNamaAyah`,

                    `formPekerjaanA`,
                    `formPendidikanA`,
                    `formNikIbu`,
                    `formNamaIbu`,
                    `formPekerjaanI`,

                    `formPendidikanI`,
                    `formPenghasilan`,
                    `formLomba`,
                    `formTingkat`,
                    `formPeringkat`,

                    `formTahun`,
                    `formOrganisasi`,
                    `formKeadaan`)
                    VALUES
                    (?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?, ?, ?,
                    ?, ?, ?)';

    $stmtinsert = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
        echo '<script>window.location="' . base_url('formBeasiswa.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param(
        $stmtinsert,
        'ssssssssssssssssssssssssssssssssssssssssssssssss',
        $formNo,
        $formJalur,
        $formBeasiswa,
        $formProdi,
        $formKelas,

        $formNisn,
        $formNik,
        $formNama,
        $formTptLahir,
        $formTglLahir,

        $formBlnLahir,
        $formThnLahir,
        $formJk,
        $formHobi,
        $formCita,

        $formAnakke,
        $formSaudara,
        $formBerat,
        $formTinggi,
        $formJalan,

        $formRt,
        $formRw,
        $formDesa,
        $formKec,
        $formKab,

        $formProv,
        $formKodepos,
        $formHp,
        $formEmail,
        $formAsalSekolah,

        $formSkhun,
        $formTahunLulus,
        $formKkAyah,
        $formNikAyah,
        $formNamaAyah,

        $formPekerjaanA,
        $formPendidikanA,
        $formNikIbu,
        $formNamaIbu,
        $formPekerjaanI,

        $formPendidikanI,
        $formPenghasilan,
        $formLomba,
        $formTingkat,
        $formPeringkat,

        $formTahun,
        $formOrganisasi,
        $formKeadaan
    );

    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);

    echo
    '<script>
            alert("Pendaftaran Jalur Beasiswa Berhasil")
            document.location="' . base_url('form.php') . '";
        </script>';
    exit();
}


if (isset($_GET['id'])) {
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    if (empty($id)) {
        return false;
    }

    $dataselect = 'SELECT * FROM `mahasiswas` WHERE `formId` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
        echo '<script>window.location="' . base_url('confirm.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $id);
    mysqli_stmt_execute($stmtselect);
    $resultData = mysqli_stmt_get_result($stmtselect);
    $value  = mysqli_fetch_assoc($resultData);

    //Update user
    if (isset($_POST['confirm'])) {
        $status   = trim(mysqli_real_escape_string($conn, $_POST['status']));

        $dataupdate = 'UPDATE `proofs` SET `proofsStatus` = ? WHERE `proofsId` = ?';
        $stmtupdate = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtupdate, $dataupdate)) {
            echo '<script>window.location="' . base_url('confirm.php?error=stmtfailed') . '";</script>';
            exit();
        }

        $pwdHashed = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmtupdate, 'ss', $status, $id);
        mysqli_stmt_execute($stmtupdate);
        mysqli_stmt_close($stmtupdate);

        echo
        '<script>
            alert("Perubahan Akun Berhasil")
            document.location="' . base_url('../confirm') . '";
        </script>';
        exit();
    }
}

if (isset($_POST['uploadFile'])) {

    if (!empty($email['formEmail'])) {

        $ktpName       = $_FILES['ktp']['name'];
        $ktpType       = $_FILES['ktp']['type'];
        $ktpSize       = $_FILES['ktp']['size'];
        $ktpError      = $_FILES['ktp']['error'];
        $ktpTmpName    = $_FILES['ktp']['tmp_name'];

        $aktaName      = $_FILES['akta']['name'];
        $aktaType      = $_FILES['akta']['type'];
        $aktaSize      = $_FILES['akta']['size'];
        $aktaError     = $_FILES['akta']['error'];
        $aktaTmpName   = $_FILES['akta']['tmp_name'];

        $kkName        = $_FILES['kk']['name'];
        $kkType        = $_FILES['kk']['type'];
        $kkSize        = $_FILES['kk']['size'];
        $kkError       = $_FILES['kk']['error'];
        $kkTmpName     = $_FILES['kk']['tmp_name'];

        $ijazahName    = $_FILES['ijazah']['name'];
        $ijazahType    = $_FILES['ijazah']['type'];
        $ijazahSize    = $_FILES['ijazah']['size'];
        $ijazahError   = $_FILES['ijazah']['error'];
        $ijazahTmpName = $_FILES['ijazah']['tmp_name'];

        $fotoName      = $_FILES['foto']['name'];
        $fotoType      = $_FILES['foto']['type'];
        $fotoSize      = $_FILES['foto']['size'];
        $fotoError     = $_FILES['foto']['error'];
        $fotoTmpName   = $_FILES['foto']['tmp_name'];

        $sktmName       = $_FILES['sktm']['name'];
        $sktmType       = $_FILES['sktm']['type'];
        $sktmSize       = $_FILES['sktm']['size'];
        $sktmError      = $_FILES['sktm']['error'];
        $sktmTmpName    = $_FILES['sktm']['tmp_name'];

        $kipName       = $_FILES['kip']['name'];
        $kipType       = $_FILES['kip']['type'];
        $kipSize       = $_FILES['kip']['size'];
        $kipError      = $_FILES['kip']['error'];
        $kipTmpName    = $_FILES['kip']['tmp_name'];

        $pkhName       = $_FILES['pkh']['name'];
        $pkhType       = $_FILES['pkh']['type'];
        $pkhSize       = $_FILES['pkh']['size'];
        $pkhError      = $_FILES['pkh']['error'];
        $pkhTmpName    = $_FILES['pkh']['tmp_name'];

        $kksName       = $_FILES['kks']['name'];
        $kksType       = $_FILES['kks']['type'];
        $kksSize       = $_FILES['kks']['size'];
        $kksError      = $_FILES['kks']['error'];
        $kksTmpName    = $_FILES['kks']['tmp_name'];


        $allowed      = array('jpg', 'jpeg', 'png', 'pdf');


        $ktpExt       = explode('.', $ktpName);
        $ktpActExt    = strtolower(end($ktpExt));

        $aktaExt      = explode('.', $aktaName);
        $aktaActExt   = strtolower(end($aktaExt));

        $kkExt        = explode('.', $kkName);
        $kkActExt     = strtolower(end($kkExt));

        $ijazahExt    = explode('.', $ijazahName);
        $ijazahActExt = strtolower(end($ijazahExt));

        $fotoExt      = explode('.', $fotoName);
        $fotoActExt   = strtolower(end($fotoExt));

        $sktmExt       = explode('.', $sktmName);
        $sktmActExt    = strtolower(end($sktmExt));

        $kipExt       = explode('.', $kipName);
        $kipActExt    = strtolower(end($kipExt));

        $pkhExt       = explode('.', $pkhName);
        $pkhActExt    = strtolower(end($pkhExt));

        $kksExt       = explode('.', $kksName);
        $kksActExt    = strtolower(end($kksExt));

        if ($ktpError == 0 && $aktaError == 0 && $kkError == 0 && $ijazahError == 0 && $fotoError == 0 && $kksError == 0) {
            if (in_array($ktpActExt, $allowed) && in_array($aktaActExt, $allowed) && in_array($kkActExt, $allowed) && in_array($ijazahActExt, $allowed) && in_array($fotoActExt, $allowed) && in_array($kksActExt, $allowed)) {
                if ($ktpSize <= 1500000 && $aktaSize <= 1500000 && $kkSize <= 1500000 && $ijazahSize <= 1500000 && $fotoSize <= 1500000 && $kksSize <= 1500000) {

                    $ktpNameNew    = $userName . '.' . $ktpActExt;
                    $ktpDesti      = '../assets/files/ktp/' . $ktpNameNew;

                    $aktaNameNew   = $userName . '.' . $aktaActExt;
                    $aktaDesti     = '../assets/files/akta/' . $aktaNameNew;

                    $kkNameNew     = $userName . '.' . $kkActExt;
                    $kkDesti       = '../assets/files/kk/' . $kkNameNew;

                    $ijazahNameNew = $userName . '.' . $ijazahActExt;
                    $ijazahDesti   = '../assets/files/ijazah/' . $ijazahNameNew;

                    $fotoNameNew   = $userName . '.' . $fotoActExt;
                    $fotoDesti     = '../assets/files/foto/' . $fotoNameNew;

                    $kksNameNew    = $userName . '.' . $kksActExt;
                    $kksDesti      = '../assets/files/kks/' . $kksNameNew;

                    move_uploaded_file($ktpTmpName, $ktpDesti);
                    move_uploaded_file($aktaTmpName, $aktaDesti);
                    move_uploaded_file($kkTmpName, $kkDesti);
                    move_uploaded_file($ijazahTmpName, $ijazahDesti);
                    move_uploaded_file($fotoTmpName, $fotoDesti);                    
                    move_uploaded_file($kksTmpName, $kksDesti);

                    $dataupdate = 'UPDATE `mahasiswas` SET `formKtp` = ?, `formAkta` = ?, `formKk` = ?, `formIjazah` = ?, `formFoto` = ?, `formKks` = ? WHERE `formEmail` = ?';
                    $stmtupdate = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmtupdate, $dataupdate)) {
                        echo '<script>window.location="' . base_url('file.php?error=stmtupdate') . '";</script>';
                        exit();
                    }

                    mysqli_stmt_bind_param($stmtupdate, 'sssssss', $ktpNameNew, $aktaNameNew, $kkNameNew, $ijazahNameNew, $fotoNameNew, $kksNameNew, $userEmail);
                    mysqli_stmt_execute($stmtupdate);
                    mysqli_stmt_close($stmtupdate);

                    echo
                    '<script>
                        alert("Upload Berkas Pendaftaran Berhasil")
                        document.location="' . base_url('../file') . '";
                    </script>';
                    exit();
                } else {
                    echo '<script>window.location="' . base_url('file.php?error=bigfile') . '";</script>';
                    exit();
                }
            } else {
                echo '<script>window.location="' . base_url('file.php?error=upload') . '";</script>';
                exit();
            }
        }

        if ($ktpError == 0 && $aktaError == 0 && $kkError == 0 && $ijazahError == 0 && $fotoError == 0 && $pkhError == 0) {
            if (in_array($ktpActExt, $allowed) && in_array($aktaActExt, $allowed) && in_array($kkActExt, $allowed) && in_array($ijazahActExt, $allowed) && in_array($fotoActExt, $allowed) && in_array($pkhActExt, $allowed)) {
                if ($ktpSize <= 1500000 && $aktaSize <= 1500000 && $kkSize <= 1500000 && $ijazahSize <= 1500000 && $fotoSize <= 1500000 && $pkhSize <= 1500000) {

                    $ktpNameNew    = $userName . '.' . $ktpActExt;
                    $ktpDesti      = '../assets/files/ktp/' . $ktpNameNew;

                    $aktaNameNew   = $userName . '.' . $aktaActExt;
                    $aktaDesti     = '../assets/files/akta/' . $aktaNameNew;

                    $kkNameNew     = $userName . '.' . $kkActExt;
                    $kkDesti       = '../assets/files/kk/' . $kkNameNew;

                    $ijazahNameNew = $userName . '.' . $ijazahActExt;
                    $ijazahDesti   = '../assets/files/ijazah/' . $ijazahNameNew;

                    $fotoNameNew   = $userName . '.' . $fotoActExt;
                    $fotoDesti     = '../assets/files/foto/' . $fotoNameNew;                    

                    $pkhNameNew    = $userName . '.' . $pkhActExt;
                    $pkhDesti      = '../assets/files/pkh/' . $pkhNameNew;

                    move_uploaded_file($ktpTmpName, $ktpDesti);
                    move_uploaded_file($aktaTmpName, $aktaDesti);
                    move_uploaded_file($kkTmpName, $kkDesti);
                    move_uploaded_file($ijazahTmpName, $ijazahDesti);
                    move_uploaded_file($fotoTmpName, $fotoDesti);                   
                    move_uploaded_file($pkhTmpName, $pkhDesti);

                    $dataupdate = 'UPDATE `mahasiswas` SET `formKtp` = ?, `formAkta` = ?, `formKk` = ?, `formIjazah` = ?, `formFoto` = ?, `formPkh` = ? WHERE `formEmail` = ?';
                    $stmtupdate = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmtupdate, $dataupdate)) {
                        echo '<script>window.location="' . base_url('file.php?error=stmtupdate') . '";</script>';
                        exit();
                    }

                    mysqli_stmt_bind_param($stmtupdate, 'sssssss', $ktpNameNew, $aktaNameNew, $kkNameNew, $ijazahNameNew, $fotoNameNew, $pkhNameNew, $userEmail);
                    mysqli_stmt_execute($stmtupdate);
                    mysqli_stmt_close($stmtupdate);

                    echo
                    '<script>
                        alert("Upload Berkas Pendaftaran Berhasil")
                        document.location="' . base_url('../file') . '";
                    </script>';
                    exit();
                } else {
                    echo '<script>window.location="' . base_url('file.php?error=bigfile') . '";</script>';
                    exit();
                }
            } else {
                echo '<script>window.location="' . base_url('file.php?error=upload') . '";</script>';
                exit();
            }
        }

        if ($ktpError == 0 && $aktaError == 0 && $kkError == 0 && $ijazahError == 0 && $fotoError == 0 && $kipError == 0) {
            if (in_array($ktpActExt, $allowed) && in_array($aktaActExt, $allowed) && in_array($kkActExt, $allowed) && in_array($ijazahActExt, $allowed) && in_array($fotoActExt, $allowed) && in_array($kipActExt, $allowed)) {
                if ($ktpSize <= 1500000 && $aktaSize <= 1500000 && $kkSize <= 1500000 && $ijazahSize <= 1500000 && $fotoSize <= 1500000 && $kipSize <= 1500000) {

                    $ktpNameNew    = $userName . '.' . $ktpActExt;
                    $ktpDesti      = '../assets/files/ktp/' . $ktpNameNew;

                    $aktaNameNew   = $userName . '.' . $aktaActExt;
                    $aktaDesti     = '../assets/files/akta/' . $aktaNameNew;

                    $kkNameNew     = $userName . '.' . $kkActExt;
                    $kkDesti       = '../assets/files/kk/' . $kkNameNew;

                    $ijazahNameNew = $userName . '.' . $ijazahActExt;
                    $ijazahDesti   = '../assets/files/ijazah/' . $ijazahNameNew;

                    $fotoNameNew   = $userName . '.' . $fotoActExt;
                    $fotoDesti     = '../assets/files/foto/' . $fotoNameNew;

                    $kipNameNew    = $userName . '.' . $kipActExt;
                    $kipDesti      = '../assets/files/kip/' . $kipNameNew;

                    move_uploaded_file($ktpTmpName, $ktpDesti);
                    move_uploaded_file($aktaTmpName, $aktaDesti);
                    move_uploaded_file($kkTmpName, $kkDesti);
                    move_uploaded_file($ijazahTmpName, $ijazahDesti);
                    move_uploaded_file($fotoTmpName, $fotoDesti);
                    move_uploaded_file($kipTmpName, $kipDesti);

                    $dataupdate = 'UPDATE `mahasiswas` SET `formKtp` = ?, `formAkta` = ?, `formKk` = ?, `formIjazah` = ?, `formFoto` = ?, `formKip` = ? WHERE `formEmail` = ?';
                    $stmtupdate = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmtupdate, $dataupdate)) {
                        echo '<script>window.location="' . base_url('file.php?error=stmtupdate') . '";</script>';
                        exit();
                    }

                    mysqli_stmt_bind_param($stmtupdate, 'sssssss', $ktpNameNew, $aktaNameNew, $kkNameNew, $ijazahNameNew, $fotoNameNew, $kipNameNew, $userEmail);
                    mysqli_stmt_execute($stmtupdate);
                    mysqli_stmt_close($stmtupdate);

                    echo
                    '<script>
                        alert("Upload Berkas Pendaftaran Berhasil")
                        document.location="' . base_url('../file') . '";
                    </script>';
                    exit();
                } else {
                    echo '<script>window.location="' . base_url('file.php?error=bigfile') . '";</script>';
                    exit();
                }
            } else {
                echo '<script>window.location="' . base_url('file.php?error=upload') . '";</script>';
                exit();
            }
        }

        if ($ktpError == 0 && $aktaError == 0 && $kkError == 0 && $ijazahError == 0 && $fotoError == 0 && $sktmError == 0) {
            if (in_array($ktpActExt, $allowed) && in_array($aktaActExt, $allowed) && in_array($kkActExt, $allowed) && in_array($ijazahActExt, $allowed) && in_array($fotoActExt, $allowed) && in_array($sktmActExt, $allowed)) {
                if ($ktpSize <= 1500000 && $aktaSize <= 1500000 && $kkSize <= 1500000 && $ijazahSize <= 1500000 && $fotoSize <= 1500000 && $sktmSize <= 1500000) {

                    $ktpNameNew    = $userName . '.' . $ktpActExt;
                    $ktpDesti      = '../assets/files/ktp/' . $ktpNameNew;

                    $aktaNameNew   = $userName . '.' . $aktaActExt;
                    $aktaDesti     = '../assets/files/akta/' . $aktaNameNew;

                    $kkNameNew     = $userName . '.' . $kkActExt;
                    $kkDesti       = '../assets/files/kk/' . $kkNameNew;

                    $ijazahNameNew = $userName . '.' . $ijazahActExt;
                    $ijazahDesti   = '../assets/files/ijazah/' . $ijazahNameNew;

                    $fotoNameNew   = $userName . '.' . $fotoActExt;
                    $fotoDesti     = '../assets/files/foto/' . $fotoNameNew;

                    $sktmNameNew    = $userName . '.' . $sktmActExt;
                    $sktmDesti      = '../assets/files/sktm/' . $sktmNameNew;

                    move_uploaded_file($ktpTmpName, $ktpDesti);
                    move_uploaded_file($aktaTmpName, $aktaDesti);
                    move_uploaded_file($kkTmpName, $kkDesti);
                    move_uploaded_file($ijazahTmpName, $ijazahDesti);
                    move_uploaded_file($fotoTmpName, $fotoDesti);
                    move_uploaded_file($sktmTmpName, $sktmDesti);

                    $dataupdate = 'UPDATE `mahasiswas` SET `formKtp` = ?, `formAkta` = ?, `formKk` = ?, `formIjazah` = ?, `formFoto` = ?, `formSktm` = ? WHERE `formEmail` = ?';
                    $stmtupdate = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmtupdate, $dataupdate)) {
                        echo '<script>window.location="' . base_url('file.php?error=stmtupdate') . '";</script>';
                        exit();
                    }

                    mysqli_stmt_bind_param($stmtupdate, 'sssssss', $ktpNameNew, $aktaNameNew, $kkNameNew, $ijazahNameNew, $fotoNameNew, $sktmNameNew, $userEmail);
                    mysqli_stmt_execute($stmtupdate);
                    mysqli_stmt_close($stmtupdate);

                    echo
                    '<script>
                        alert("Upload Berkas Pendaftaran Berhasil")
                        document.location="' . base_url('../file') . '";
                    </script>';
                    exit();
                } else {
                    echo '<script>window.location="' . base_url('file.php?error=bigfile') . '";</script>';
                    exit();
                }
            } else {
                echo '<script>window.location="' . base_url('file.php?error=upload') . '";</script>';
                exit();
            }
        }
        
        if ($ktpError == 0 && $aktaError == 0 && $kkError == 0 && $ijazahError == 0 && $fotoError == 0) {
            if (in_array($ktpActExt, $allowed) && in_array($aktaActExt, $allowed) && in_array($kkActExt, $allowed) && in_array($ijazahActExt, $allowed) && in_array($fotoActExt, $allowed)) {
                if ($ktpSize <= 1500000 && $aktaSize <= 1500000 && $kkSize <= 1500000 && $ijazahSize <= 1500000 && $fotoSize <= 1500000) {

                    $ktpNameNew    = $userName . '.' . $ktpActExt;
                    $ktpDesti      = '../assets/files/ktp/' . $ktpNameNew;

                    $aktaNameNew   = $userName . '.' . $aktaActExt;
                    $aktaDesti     = '../assets/files/akta/' . $aktaNameNew;

                    $kkNameNew     = $userName . '.' . $kkActExt;
                    $kkDesti       = '../assets/files/kk/' . $kkNameNew;

                    $ijazahNameNew = $userName . '.' . $ijazahActExt;
                    $ijazahDesti   = '../assets/files/ijazah/' . $ijazahNameNew;

                    $fotoNameNew   = $userName . '.' . $fotoActExt;
                    $fotoDesti     = '../assets/files/foto/' . $fotoNameNew;

                    move_uploaded_file($ktpTmpName, $ktpDesti);
                    move_uploaded_file($aktaTmpName, $aktaDesti);
                    move_uploaded_file($kkTmpName, $kkDesti);
                    move_uploaded_file($ijazahTmpName, $ijazahDesti);
                    move_uploaded_file($fotoTmpName, $fotoDesti);

                    $dataupdate = 'UPDATE `mahasiswas` SET `formKtp` = ?, `formAkta` = ?, `formKk` = ?, `formIjazah` = ?, `formFoto` = ? WHERE `formEmail` = ?';
                    $stmtupdate = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmtupdate, $dataupdate)) {
                        echo '<script>window.location="' . base_url('file.php?error=stmtupdate') . '";</script>';
                        exit();
                    }

                    mysqli_stmt_bind_param($stmtupdate, 'ssssss', $ktpNameNew, $aktaNameNew, $kkNameNew, $ijazahNameNew, $fotoNameNew, $userEmail);
                    mysqli_stmt_execute($stmtupdate);
                    mysqli_stmt_close($stmtupdate);

                    echo
                    '<script>
                        alert("Upload Berkas Pendaftaran Berhasil")
                        document.location="' . base_url('../file') . '";
                    </script>';
                    exit();
                } else {
                    echo '<script>window.location="' . base_url('file.php?error=bigfile') . '";</script>';
                    exit();
                }
            } else {
                echo '<script>window.location="' . base_url('file.php?error=upload') . '";</script>';
                exit();
            }
        }

        echo '<script>window.location="' . base_url('file.php?error=error') . '";</script>';
        exit();

    } else {
        echo '<script>window.location="' . base_url('file.php?error=form') . '";</script>';
        exit();
    }
}


$dataselect = 'SELECT `formId`, `formNo`, `formJalur`,`formNama`, `formEmail`, `formHp` FROM `mahasiswas` ORDER BY `formNo`';
$stmtselect = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
    echo '<script>window.location="' . base_url('confirm.php?error=stmtselect') . '";</script>';
    exit();
}

mysqli_stmt_execute($stmtselect);
$mahasiswas = mysqli_stmt_get_result($stmtselect);
