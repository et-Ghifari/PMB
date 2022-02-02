<?php

$userName    = $_SESSION['username'];
$userEmail   = $_SESSION['useremail'];

$dataMemail = 'SELECT `formEmail` FROM `mandiris` WHERE `formEmail` = ?';
$stmtMemail = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtMemail, $dataMemail)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtMemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtMemail, 's', $userEmail);
mysqli_stmt_execute($stmtMemail);
$resultMemail = mysqli_stmt_get_result($stmtMemail);
$emailMandiri = mysqli_fetch_assoc($resultMemail);


$dataBemail = 'SELECT `formEmail` FROM `beasiswas` WHERE `formEmail` = ?';
$stmtBemail = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtBemail, $dataBemail)) {
    echo '<script>window.location="' . base_url('file.php?error=stmtBemail') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtBemail, 's', $userEmail);
mysqli_stmt_execute($stmtBemail);
$resultBemail  = mysqli_stmt_get_result($stmtBemail);
$emailBeasiswa = mysqli_fetch_assoc($resultBemail);


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