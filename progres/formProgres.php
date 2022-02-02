<?php

if (isset($_POST['addMandiri']))
{
    
    $formJalur       = trim(mysqli_real_escape_string($conn, $_POST['jalur']));
    $formProdi       = trim(mysqli_real_escape_string($conn, $_POST['prodi']));
    $formKelas       = trim(mysqli_real_escape_string($conn, $_POST['kelas']));
    $formNisn        = trim(mysqli_real_escape_string($conn, $_POST['nisn']));

    $formNik         = trim(mysqli_real_escape_string($conn, $_POST['nik']));
    $formNama        = trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $formTptLahir    = trim(mysqli_real_escape_string($conn, $_POST['tempat']));
    $formTglLahir    = trim(mysqli_real_escape_string($conn, $_POST['tgl']));
    $formBlnLahir    = trim(mysqli_real_escape_string($conn, $_POST['bln']));

    $formThnLahir    = trim(mysqli_real_escape_string($conn, $_POST['thn']));
    $formJk          = trim(mysqli_real_escape_string($conn, $_POST['jk']));
    $formHobi        = trim(mysqli_real_escape_string($conn, $_POST['hobi']));
    $formCita        = trim(mysqli_real_escape_string($conn, $_POST['cita']));
    $formAnakke      = trim(mysqli_real_escape_string($conn, $_POST['anakke']));

    $formSaudara     = trim(mysqli_real_escape_string($conn, $_POST['saudara']));
    $formBerat       = trim(mysqli_real_escape_string($conn, $_POST['berat']));
    $formTinggi      = trim(mysqli_real_escape_string($conn, $_POST['tinggi']));
    $formJalan       = trim(mysqli_real_escape_string($conn, $_POST['jalan']));
    $formRt          = trim(mysqli_real_escape_string($conn, $_POST['rt']));

    $formRw          = trim(mysqli_real_escape_string($conn, $_POST['rw']));
    $formDesa        = trim(mysqli_real_escape_string($conn, $_POST['desa']));
    $formKec         = trim(mysqli_real_escape_string($conn, $_POST['kecamatan']));
    $formKab         = trim(mysqli_real_escape_string($conn, $_POST['kabupaten']));
    $formProv        = trim(mysqli_real_escape_string($conn, $_POST['provinsi']));

    $formKodepos     = trim(mysqli_real_escape_string($conn, $_POST['kodepos']));
    $formHp          = trim(mysqli_real_escape_string($conn, $_POST['hp']));
    $formEmail       = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $formAsalSekolah = trim(mysqli_real_escape_string($conn, $_POST['asalsekolah']));
    $formSkhun       = trim(mysqli_real_escape_string($conn, $_POST['skhun']));

    $formTahunLulus  = trim(mysqli_real_escape_string($conn, $_POST['tahunlulus']));
    $formKk          = trim(mysqli_real_escape_string($conn, $_POST['kk']));
    $formNikAyah     = trim(mysqli_real_escape_string($conn, $_POST['nikAyah']));
    $formNamaAyah    = trim(mysqli_real_escape_string($conn, $_POST['ayah']));
    $formPekerjaanA  = trim(mysqli_real_escape_string($conn, $_POST['pekerjaanAyah']));

    $formPendidikanA = trim(mysqli_real_escape_string($conn, $_POST['pendidikanAyah']));
    $formNikIbu      = trim(mysqli_real_escape_string($conn, $_POST['nikIbu']));
    $formNamaIbu     = trim(mysqli_real_escape_string($conn, $_POST['ibu']));
    $formPekerjaanI  = trim(mysqli_real_escape_string($conn, $_POST['pekerjaanIbu']));
    $formPendidikanI = trim(mysqli_real_escape_string($conn, $_POST['pendidikanIbu']));

    $formPenghasilan = trim(mysqli_real_escape_string($conn, $_POST['penghasilan']));
    $formLomba       = trim(mysqli_real_escape_string($conn, $_POST['lomba']));
    $formTingkat     = trim(mysqli_real_escape_string($conn, $_POST['tingkat']));
    $formPeringkat   = trim(mysqli_real_escape_string($conn, $_POST['peringkat']));
    $formTahun       = trim(mysqli_real_escape_string($conn, $_POST['tahun']));

    $formOrganisasi  = trim(mysqli_real_escape_string($conn, $_POST['organisasi']));
    $formKeadaan     = trim(mysqli_real_escape_string($conn, $_POST['keadaan']));   
    
    if (empty($formProdi) || empty($formNisn) || empty($formKk) || empty($formOrganisasi))
    {
        echo '<script>document.location="' . base_url('formMandiri.php?error=emptyform') . '";</script>';
        exit();
    }

    $getMaxId = mysqli_query($conn, 'SELECT MAX(RIGHT(`formNo`, 5)) AS `formId` FROM `mandiris`');
    $d = mysqli_fetch_object($getMaxId);
    $formNo = 'PMB'.date('Y').sprintf('%05s', $d->formId + 1);

    $datamandiri = 'INSERT INTO `mandiris`
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
                    `formKk`,
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
                    
    $stmtmandiri = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtmandiri, $datamandiri))
    {
        echo '<script>window.location="' . base_url('formMandiri.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtmandiri, 'sssssssssssssssssssssssssssssssssssssssssssssss',
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
                            $formKk,
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
                            $formKeadaan);

    mysqli_stmt_execute($stmtmandiri);
    mysqli_stmt_close($stmtmandiri);

    echo
    '<script>
            alert("Pendaftaran Jalur Mandiri Berhasil")
            document.location="' . base_url('form.php') . '";
        </script>';
    exit();
}

if (isset($_POST['addBeasiswa']))
{       
    $formBeasiswa    = trim(mysqli_real_escape_string($conn, $_POST['beasiswa']));    
    $formJalur       = trim(mysqli_real_escape_string($conn, $_POST['jalur']));
    $formProdi       = trim(mysqli_real_escape_string($conn, $_POST['prodi']));
    $formKelas       = trim(mysqli_real_escape_string($conn, $_POST['kelas']));

    $formNisn        = trim(mysqli_real_escape_string($conn, $_POST['nisn']));
    $formNik         = trim(mysqli_real_escape_string($conn, $_POST['nik']));
    $formNama        = trim(mysqli_real_escape_string($conn, $_POST['nama']));
    $formTptLahir    = trim(mysqli_real_escape_string($conn, $_POST['tempat']));
    $formTglLahir    = trim(mysqli_real_escape_string($conn, $_POST['tgl']));

    $formBlnLahir    = trim(mysqli_real_escape_string($conn, $_POST['bln']));
    $formThnLahir    = trim(mysqli_real_escape_string($conn, $_POST['thn']));    
    $formJk          = trim(mysqli_real_escape_string($conn, $_POST['jk']));
    $formHobi        = trim(mysqli_real_escape_string($conn, $_POST['hobi']));
    $formCita        = trim(mysqli_real_escape_string($conn, $_POST['cita']));

    $formAnakke      = trim(mysqli_real_escape_string($conn, $_POST['anakke']));
    $formSaudara     = trim(mysqli_real_escape_string($conn, $_POST['saudara']));
    $formBerat       = trim(mysqli_real_escape_string($conn, $_POST['berat']));
    $formTinggi      = trim(mysqli_real_escape_string($conn, $_POST['tinggi']));
    $formJalan       = trim(mysqli_real_escape_string($conn, $_POST['jalan']));

    $formRt          = trim(mysqli_real_escape_string($conn, $_POST['rt']));
    $formRw          = trim(mysqli_real_escape_string($conn, $_POST['rw']));
    $formDesa        = trim(mysqli_real_escape_string($conn, $_POST['desa']));
    $formKec         = trim(mysqli_real_escape_string($conn, $_POST['kecamatan']));
    $formKab         = trim(mysqli_real_escape_string($conn, $_POST['kabupaten']));

    $formProv        = trim(mysqli_real_escape_string($conn, $_POST['provinsi']));
    $formKodepos     = trim(mysqli_real_escape_string($conn, $_POST['kodepos']));
    $formHp          = trim(mysqli_real_escape_string($conn, $_POST['hp']));
    $formEmail       = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $formAsalSekolah = trim(mysqli_real_escape_string($conn, $_POST['asalsekolah']));

    $formSkhun       = trim(mysqli_real_escape_string($conn, $_POST['skhun']));
    $formTahunLulus  = trim(mysqli_real_escape_string($conn, $_POST['tahunlulus']));
    $formKk          = trim(mysqli_real_escape_string($conn, $_POST['kk']));
    $formNikAyah     = trim(mysqli_real_escape_string($conn, $_POST['nikAyah']));
    $formNamaAyah    = trim(mysqli_real_escape_string($conn, $_POST['ayah']));

    $formPekerjaanA  = trim(mysqli_real_escape_string($conn, $_POST['pekerjaanAyah']));
    $formPendidikanA = trim(mysqli_real_escape_string($conn, $_POST['pendidikanAyah']));
    $formNikIbu      = trim(mysqli_real_escape_string($conn, $_POST['nikIbu']));
    $formNamaIbu     = trim(mysqli_real_escape_string($conn, $_POST['ibu']));
    $formPekerjaanI  = trim(mysqli_real_escape_string($conn, $_POST['pekerjaanIbu']));

    $formPendidikanI = trim(mysqli_real_escape_string($conn, $_POST['pendidikanIbu']));
    $formPenghasilan = trim(mysqli_real_escape_string($conn, $_POST['penghasilan']));
    $formLomba       = trim(mysqli_real_escape_string($conn, $_POST['lomba']));
    $formTingkat     = trim(mysqli_real_escape_string($conn, $_POST['tingkat']));
    $formPeringkat   = trim(mysqli_real_escape_string($conn, $_POST['peringkat']));

    $formTahun       = trim(mysqli_real_escape_string($conn, $_POST['tahun']));
    $formOrganisasi  = trim(mysqli_real_escape_string($conn, $_POST['organisasi']));
    $formKeadaan     = trim(mysqli_real_escape_string($conn, $_POST['keadaan']));

    if (empty($formProdi) || empty($formNisn) || empty($formKk) || empty($formOrganisasi))
    {
        echo '<script>window.location="' . base_url('formBeasiswa.php?error=emptyform') . '";</script>';
        exit();
    }

    $getMaxId = mysqli_query($conn, 'SELECT MAX(RIGHT(`formNo`, 5)) AS `formId` FROM `beasiswas`');
    $d = mysqli_fetch_object($getMaxId);
    $formNo = 'PMB'.date('Y').sprintf('%05s', $d->formId + 1);

    $databeasiswa = 'INSERT INTO `beasiswas`
                    (`formNo`,
                    `formBeasiswa`,
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
                    `formKk`,
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

    $stmtbeasiswa = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtbeasiswa, $databeasiswa))
    {
        echo '<script>window.location="' . base_url('formBeasiswa.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtbeasiswa,'ssssssssssssssssssssssssssssssssssssssssssssssss',
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
                            $formKk,
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
                            $formKeadaan);

    mysqli_stmt_execute($stmtbeasiswa);
    mysqli_stmt_close($stmtbeasiswa);

    echo
    '<script>
            alert("Pendaftaran Jalur Beasiswa Berhasil")
            document.location="' . base_url('form.php') . '";
        </script>';
    exit();
}


if (isset($_GET['id']))
{
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    if (empty($id))
    {
        return false;
    }    

    $dataselect = 'SELECT
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`, `formEmail`, `proofsImage`, `proofStatus`,
                    `formId`, `formNama`
                    FROM `proofs` WHERE `formfsId` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('confirm.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $id);
    mysqli_stmt_execute($stmtselect);
    $resultData = mysqli_stmt_get_result($stmtselect);
    $value  = mysqli_fetch_assoc($resultData);

    //Update user
    if (isset($_POST['confirm']))
    {                
        $status   = trim(mysqli_real_escape_string($conn, $_POST['status']));

        $dataupdate = 'UPDATE `proofs` SET `proofsStatus` = ? WHERE `proofsId` = ?';
        $stmtupdate = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtupdate, $dataupdate))
        {
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


$dataMselect = 'SELECT `formId`, `formNo`,`formNama`, `formEmail`, `formHp` FROM `mandiris` ORDER BY `formNo`';
$stmtMselect = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtMselect, $dataMselect)) {
    echo '<script>window.location="' . base_url('confirm.php?error=stmtselect') . '";</script>';
    exit();
}

mysqli_stmt_execute($stmtMselect);
$mandiris = mysqli_stmt_get_result($stmtMselect);


$dataBselect = 'SELECT `formId`, `formNo`,`formNama`, `formEmail`, `formHp` FROM `beasiswas` ORDER BY `formNo`';
$stmtBselect = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtBselect, $dataBselect)) {
    echo '<script>window.location="' . base_url('confirm.php?error=stmtselect') . '";</script>';
    exit();
}

mysqli_stmt_execute($stmtBselect);
$beasiswas = mysqli_stmt_get_result($stmtBselect);

