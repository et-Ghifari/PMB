<?php

require_once 'selectProgres.php';

if (isset($_POST['uploadBukti'])) {

    if (isset($_SESSION['useremail']) == $emailMandiri) {
       
        $buktiName    = $_FILES['bukti']['name'];
        $buktiType    = $_FILES['bukti']['type'];
        $buktiSize    = $_FILES['bukti']['size'];
        $buktiError   = $_FILES['bukti']['error'];
        $buktiTmpName = $_FILES['bukti']['tmp_name'];

        $allowed      = array('jpg', 'jpeg', 'png', 'pdf');

        $buktiExt       = explode('.', $buktiName);
        $buktiActExt    = strtolower(end($buktiExt));

        if (!$buktiError == 0) {
            echo '<script>window.location="' . base_url('proof.php?error=error') . '";</script>';
            exit();
        }

        if (!in_array($buktiActExt, $allowed)) {
            echo '<script>window.location="' . base_url('proof.php?error=upload') . '";</script>';
            exit();
        }

        if ($buktiSize >= 1500000) {
            echo '<script>window.location="' . base_url('proof.php?error=bigfile') . '";</script>';
            exit();
        }

        $buktiNameNew    = $userName . '.' . $buktiActExt;
        $buktiDesti      = '../assets/files/bukti/' . $buktiNameNew;
        
        move_uploaded_file($buktiTmpName, $buktiDesti);

        $fileJalur = 'Mandiri';

        $datainsert = 'INSERT INTO `proofs` (`proofsJalur`, `proofsNama`, `proofsEmail`, `proofsImage`) VALUE (?, ?, ?, ?)';
        $stmtinsert = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
            echo '<script>window.location="' . base_url('proof.php?error=stmtinsertm') . '";</script>';
            exit();
        }

        mysqli_stmt_bind_param($stmtinsert, 'ssss', $fileJalur, $userName, $userEmail, $buktiNameNew);
        mysqli_stmt_execute($stmtinsert);
        mysqli_stmt_close($stmtinsert);

        echo
        '<script>
                alert("Upload Tanda Bukti Berhasil")
                document.location="' . base_url('../proof') . '";
            </script>';
        exit();
    } else {
        echo '<script>window.location="' . base_url('proof.php?error=form') . '";</script>';
        exit();
    }

    if (isset($_SESSION['useremail']) == $emailBeasiswa) {

        $buktiName    = $_FILES['bukti']['name'];
        $buktiType    = $_FILES['bukti']['type'];
        $buktiSize    = $_FILES['bukti']['size'];
        $buktiError   = $_FILES['bukti']['error'];
        $buktiTmpName = $_FILES['bukti']['tmp_name'];

        $allowed      = array('jpg', 'jpeg', 'png', 'pdf');

        $buktiExt     = explode('.', $buktiName);
        $buktiActExt  = strtolower(end($buktiExt));

        if (!$buktiError == 0) {
            echo '<script>window.location="' . base_url('proof.php?error=error') . '";</script>';
            exit();
        }

        if (!in_array($buktiActExt, $allowed)) {
            echo '<script>window.location="' . base_url('proof.php?error=upload') . '";</script>';
            exit();
        }

        if ($buktiSize >= 1500000) {
            echo '<script>window.location="' . base_url('proof.php?error=bigfile') . '";</script>';
            exit();
        }

        $buktiNameNew    = $userName . '.' . $buktiActExt;
        $buktiDesti      = '../assets/files/bukti/' . $buktiNameNew;
        
        move_uploaded_file($buktiTmpName, $buktiDesti);

        $fileJalur = 'Mandiri';

        $datainsert = 'INSERT INTO `proofs` (`proofsJalur`, `proofsNama`, `proofsEmail`, `proofsImage`) VALUE (?, ?, ?, ?)';
        $stmtinsert = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
            echo '<script>window.location="' . base_url('proof.php?error=stmtinsertb') . '";</script>';
            exit();
        }

        mysqli_stmt_bind_param($stmtinsert, 'ssss', $fileJalur, $userName, $userEmail, $buktiNameNew);
        mysqli_stmt_execute($stmtinsert);
        mysqli_stmt_close($stmtinsert);

        echo
        '<script>
                alert("Upload Tanda Bukti Berhasil")
                document.location="' . base_url('../proof') . '";
            </script>';
        exit();
    } else {
        echo '<script>window.location="' . base_url('proof.php?error=form') . '";</script>';
        exit();
    }
}

if (isset($_GET['id']))
{
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    if (empty($id))
    {
        return false;
    }

    $dataselect = 'SELECT `proofsId`, `proofsNama`, `proofsEmail`, `proofsImage`, `proofsStatus` FROM `proofs` WHERE `proofsId` = ?';
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

$dataselect = 'SELECT `proofsId`, `proofsNama`, `proofsJalur`, `proofsEmail`, `proofsImage`, `proofsStatus` FROM `proofs` ORDER BY `proofsNama`';
$stmtselect = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
    echo '<script>window.location="' . base_url('confirm.php?error=stmtselect') . '";</script>';
    exit();
}

mysqli_stmt_execute($stmtselect);
$proofs = mysqli_stmt_get_result($stmtselect);