<?php

$userName    = $_SESSION['username'];
$userEmail   = $_SESSION['useremail'];

$dataemail = 'SELECT `formEmail` FROM `mahasiswas` WHERE `formEmail` = ?';
$stmtemail = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtemail, $dataemail)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtMemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtemail, 's', $userEmail);
mysqli_stmt_execute($stmtemail);
$resultEmail = mysqli_stmt_get_result($stmtemail);
$email = mysqli_fetch_assoc($resultEmail);

$dataFemail = 'SELECT `filesEmail` FROM `files` WHERE `filesEmail` = ?';
$stmtFemail = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtFemail, $dataFemail)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtFemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtFemail, 's', $userEmail);
mysqli_stmt_execute($stmtFemail);
$resultFemail = mysqli_stmt_get_result($stmtFemail);
$emailFile    = mysqli_fetch_assoc($resultFemail);


$dataPemail = 'SELECT `proofsEmail` FROM `proofs` WHERE `proofsEmail` = ?';
$stmtPemail = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtPemail, $dataPemail)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtFemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtPemail, 's', $userEmail);
mysqli_stmt_execute($stmtPemail);
$resultPemail = mysqli_stmt_get_result($stmtPemail);
$emailProof   = mysqli_fetch_assoc($resultPemail);


$datastatus = 'SELECT `proofsStatus` FROM `proofs` WHERE `proofsEmail` = ?';
$stmtstatus = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtstatus, $datastatus)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtFemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtstatus, 's', $userEmail);
mysqli_stmt_execute($stmtstatus);
$resultStatus = mysqli_stmt_get_result($stmtstatus);
$status       = mysqli_fetch_assoc($resultStatus);