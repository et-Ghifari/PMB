<?php

require_once 'selectProgres.php';

if (isset($_POST['uploadFile'])) {

    if (isset($_SESSION['useremail']) == $emailMandiri) {

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

        $kipExt       = explode('.', $kipName);
        $kipActExt    = strtolower(end($kipExt));

        $pkhExt       = explode('.', $pkhName);
        $pkhActExt    = strtolower(end($pkhExt));

        $kksExt       = explode('.', $kksName);
        $kksActExt    = strtolower(end($kksExt));

        if (!$ktpError == 0 || !$aktaError == 0 || !$kkError == 0 || !$ijazahError == 0 || !$fotoError == 0 || !$kipError == 0 || !$pkhError == 0 || !$kksError == 0) {
            echo '<script>window.location="' . base_url('file.php?error=error') . '";</script>';
            exit();
        }

        if (!in_array($ktpActExt, $allowed) || !in_array($aktaActExt, $allowed) || !in_array($kkActExt, $allowed) || !in_array($ijazahActExt, $allowed) || !in_array($fotoActExt, $allowed) || !in_array($kipActExt, $allowed) || !in_array($pkhActExt, $allowed) || !in_array($kksActExt, $allowed)) {
            echo '<script>window.location="' . base_url('file.php?error=upload') . '";</script>';
            exit();
        }

        if ($ktpSize >= 1500000 || $aktaSize >= 1500000 || $kkSize >= 1500000 || $ijazahSize >= 1500000 || $fotoSize >= 1500000 || $kipSize >= 1500000 || $pkhSize >= 1500000 || $kksSize >= 1500000) {
            echo '<script>window.location="' . base_url('file.php?error=bigfile') . '";</script>';
            exit();
        }

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

        $pkhNameNew    = $userName . '.' . $pkhActExt;
        $pkhDesti      = '../assets/files/pkh/' . $pkhNameNew;

        $kksNameNew    = $userName . '.' . $kksActExt;
        $kksDesti      = '../assets/files/kks/' . $kksNameNew;

        move_uploaded_file($ktpTmpName, $ktpDesti);
        move_uploaded_file($aktaTmpName, $aktaDesti);
        move_uploaded_file($kkTmpName, $kkDesti);
        move_uploaded_file($ijazahTmpName, $ijazahDesti);
        move_uploaded_file($fotoTmpName, $fotoDesti);
        move_uploaded_file($kipTmpName, $kipDesti);
        move_uploaded_file($pkhTmpName, $pkhDesti);
        move_uploaded_file($kksTmpName, $kksDesti);

        $fileJalur = 'Mandiri';

        $datainsert = 'INSERT INTO `files` (`filesJalur`, `filesNama`, `filesEmail`, `filesKtp`, `filesAkta`,
                                            `filesKk`, `filesIjazah`, `filesFoto`, `filesKip`, `filesPkh`,
                                            `filesKks`)
                                            VALUE
                                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmtinsert = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
            echo '<script>window.location="' . base_url('file.php?error=stmtinsertm') . '";</script>';
            exit();
        }

        mysqli_stmt_bind_param($stmtinsert, 'sssssssssss',
                                $fileJalur,
                                $userName,
                                $userEmail,
                                $ktpNameNew,
                                $aktaNameNew,
                                $kkNameNew,
                                $ijazahNameNew,
                                $fotoNameNew,
                                $kipNameNew,
                                $pkhNameNew,
                                $kksNameNew);
        mysqli_stmt_execute($stmtinsert);
        mysqli_stmt_close($stmtinsert);

        echo
        '<script>
                alert("Upload Berkas Pendaftaran Berhasil")
                document.location="' . base_url('../file') . '";
            </script>';
        exit();
    } else {
        echo '<script>window.location="' . base_url('file.php?error=form') . '";</script>';
        exit();
    }

    if (isset($_SESSION['useremail']) == $emailBeasiswa) {

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

        $kipExt       = explode('.', $kipName);
        $kipActExt    = strtolower(end($kipExt));

        $pkhExt       = explode('.', $pkhName);
        $pkhActExt    = strtolower(end($pkhExt));

        $kksExt       = explode('.', $kksName);
        $kksActExt    = strtolower(end($kksExt));

        if (!$ktpError == 0 || !$aktaError == 0 || !$kkError == 0 || !$ijazahError == 0 || !$fotoError == 0 || !$kipError == 0 || !$pkhError == 0 || !$kksError == 0) {
            echo '<script>window.location="' . base_url('file.php?error=error') . '";</script>';
            exit();
        }

        if (!in_array($ktpActExt, $allowed) || !in_array($aktaActExt, $allowed) || !in_array($kkActExt, $allowed) || !in_array($ijazahActExt, $allowed) || !in_array($fotoActExt, $allowed) || !in_array($kipActExt, $allowed) || !in_array($pkhActExt, $allowed) || !in_array($kksActExt, $allowed)) {
            echo '<script>window.location="' . base_url('file.php?error=upload') . '";</script>';
            exit();
        }

        if ($ktpSize >= 1500000 || $aktaSize >= 1500000 || $kkSize >= 1500000 || $ijazahSize >= 1500000 || $fotoSize >= 1500000 || $kipSize >= 1500000 || $pkhSize >= 1500000 || $kksSize >= 1500000) {
            echo '<script>window.location="' . base_url('file.php?error=bigfile') . '";</script>';
            exit();
        }

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

        $pkhNameNew    = $userName . '.' . $pkhActExt;
        $pkhDesti      = '../assets/files/pkh/' . $pkhNameNew;

        $kksNameNew    = $userName . '.' . $kksActExt;
        $kksDesti      = '../assets/files/kks/' . $kksNameNew;

        move_uploaded_file($ktpTmpName, $ktpDesti);
        move_uploaded_file($aktaTmpName, $aktaDesti);
        move_uploaded_file($kkTmpName, $kkDesti);
        move_uploaded_file($ijazahTmpName, $ijazahDesti);
        move_uploaded_file($fotoTmpName, $fotoDesti);
        move_uploaded_file($kipTmpName, $kipDesti);
        move_uploaded_file($pkhTmpName, $pkhDesti);
        move_uploaded_file($kksTmpName, $kksDesti);

        $fileJalur = 'Beasiswa';

        $datainsert = 'INSERT INTO `files` (`filesJalur`, `filesNama`, `filesEmail`, `filesKtp`, `filesAkta`,
                                            `filesKk`, `filesIjazah`, `filesFoto`, `filesKip`, `filesPkh`,
                                            `filesKks`)
                                            VALUE
                                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmtinsert = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
            echo '<script>window.location="' . base_url('file.php?error=stmtinsertb') . '";</script>';
            exit();
        }

        mysqli_stmt_bind_param($stmtinsert, 'sssssssssss',
                                $fileJalur,
                                $userName,
                                $userEmail,
                                $ktpNameNew,
                                $aktaNameNew,
                                $kkNameNew,
                                $ijazahNameNew,
                                $fotoNameNew,
                                $kipNameNew,
                                $pkhNameNew,
                                $kksNameNew);
        mysqli_stmt_execute($stmtinsert);
        mysqli_stmt_close($stmtinsert);

        echo
        '<script>
                alert("Upload Berkas Pendaftaran Berhasil")
                document.location="' . base_url('../file') . '";
            </script>';
        exit();
    } else {
        echo '<script>window.location="' . base_url('file.php?error=form') . '";</script>';
        exit();
    }
}