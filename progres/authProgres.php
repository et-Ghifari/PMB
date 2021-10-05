<?php
include_once '../config/connect.php';

if (isset($_POST['register'])) {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirm)) {
        echo '<script>window.location="' . base_url('auth/register.php?error=emptyinput') . '";</script>';
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>window.location="' . base_url('auth/register.php?error=invalidemail') . '";</script>';
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        echo '<script>window.location="' . base_url('auth/register.php?error=invaliduid') . '";</script>';
        exit();
    }

    if ($password != $confirm) {
        echo '<script>window.location="' . base_url('auth/register.php?error=confirmwrong') . '";</script>';
        exit();
    }

    $dataselect = 'SELECT `usersEmail`, `usersUid`, `usersPwd` FROM `users` WHERE `usersEmail` = ? OR `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
        echo '<script>window.location="' . base_url('auth/register.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $email, $username);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);

    if ($row = mysqli_fetch_assoc($resultData)) {
        echo '<script>window.location="' . base_url('auth/register.php?error=registed') . '";</script>';
        exit();
    }

    $datainsert = 'INSERT INTO `users` (`usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES (?, ?, ?, ?)';
    $stmtinsert = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
        echo '<script>window.location="' . base_url('auth/register.php?error=stmtfailed') . '";</script>';
        exit();
    }

    $pwdHashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmtinsert, 'ssss', $name, $email, $username, $pwdHashed);
    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);

    echo
    '<script>
            alert("Pembuatan Akun Berhasil")
            document.location="' . base_url('auth') . '";
        </script>';
    exit();
}

if (isset($_POST['login'])) {
    $uid      = $_POST['uid'];
    $password = $_POST['password'];

    if (empty($uid) || empty($password)) {
        echo '<script>window.location="' . base_url('auth/login.php?error=emptyinput') . '";</script>';
        exit();
    }

    $dataselect = 'SELECT `usersEmail`, `usersUid`, `usersPwd` FROM `users` WHERE `usersEmail` = ? OR `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
        echo '<script>window.location="' . base_url('auth/login.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $uid, $uid);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);
    $data = mysqli_fetch_assoc($resultData);

    if ($data == false) {
        echo '<script>window.location="' . base_url('auth/login.php?error=uidwrong') . '";</script>';
        exit();
    }

    $pwdHashed = $data['usersPwd'];
    $checkPwd = password_verify($password, $pwdHashed);

    if ($checkPwd == false) {
        echo '<script>window.location="' . base_url('auth/login.php?error=pwdwrong') . '";</script>';
        exit();
    } elseif ($checkPwd == true) {
        $_SESSION['useruid'] = $data['usersUid'];
        $_SESSION['useremail'] = $data['usersEmail'];

        echo
        '<script>
            alert("Selamat Login Berhasil")
            document.location="' . base_url('dhasboard') . '";
        </script>';
        exit();
    }
}
