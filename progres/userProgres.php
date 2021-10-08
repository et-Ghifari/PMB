<?php
include_once '../config/connect.php';

if (!isset($_SESSION['useremail'])) { //Kondisi sesi login
    echo '<script>window.location="' . base_url('auth/login.php') . '";</script>';
    exit();
}

//Add user
if (isset($_POST['add'])) { //Menambahkan user ke tabel users
    $name     = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $email    = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm  = trim(mysqli_real_escape_string($conn, $_POST['confirm']));

    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirm)) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=emptyinput') . '";</script>';
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=invalidemail') . '";</script>';
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=invaliduid') . '";</script>';
        exit();
    }

    if ($password != $confirm) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=confirmwrong') . '";</script>';
        exit();
    }

    $dataselect = 'SELECT `usersEmail`, `usersUid`, `usersPwd` FROM `users` WHERE `usersEmail` = ? OR `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $email, $username);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);

    if ($row = mysqli_fetch_assoc($resultData)) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=registed') . '";</script>';
        exit();
    }

    $datainsert = 'INSERT INTO `users` (`usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES (?, ?, ?, ?)';
    $stmtinsert = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtinsert, $datainsert)) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=stmtfailed') . '";</script>';
        exit();
    }

    $pwdHashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmtinsert, 'ssss', $name, $email, $username, $pwdHashed);
    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);

    echo
    '<script>
            alert("Pembuatan Akun Berhasil")
            document.location="' . base_url('user') . '";
        </script>';
    exit();
}

//Edit user
if (isset($_GET['id'])) {
    $id         = @$_GET['id'];
    $dataselect = 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users` WHERE `usersId` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
        echo '<script>window.location="' . base_url('user/editUser.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $id);
    mysqli_stmt_execute($stmtselect);
    $resultData = mysqli_stmt_get_result($stmtselect);
    $value  = mysqli_fetch_assoc($resultData);

    //Update user
    if (isset($_POST['edit'])) {
        $name     = trim(mysqli_real_escape_string($conn, $_POST['name']));
        $email    = trim(mysqli_real_escape_string($conn, $_POST['email']));
        $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
        $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

        $dataupdate = 'UPDATE `users` SET `usersName` = ?, `usersEmail` = ?, `usersUid` = ?, `usersPwd` = ? WHERE `usersId` = ?';
        $stmtupdate = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtupdate, $dataupdate)) {
            echo '<script>window.location="' . base_url('user/editUser.php?error=stmtfailed') . '";</script>';
            exit();
        }

        $pwdHashed = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmtupdate, 'sssss', $name, $email, $username, $pwdHashed, $id);
        mysqli_stmt_execute($stmtupdate);
        mysqli_stmt_close($stmtupdate);

        echo
        '<script>
            alert("Perubahan Akun Berhasil")
            document.location="' . base_url('user') . '";
        </script>';
        exit();
    }
}

//Read user   
$dataPage = 4;
$query    = mysqli_query($conn, 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users`');
$data     = mysqli_num_rows($query);
$page     = ceil($data / $dataPage);
$actPage  = (isset($_GET['page'])) ? $_GET['page'] : 1;
$stData   = ($dataPage * $actPage) - $dataPage;

$dataselect = 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users` ORDER BY `usersName` LIMIT ?, ?';
$stmtselect = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
    echo '<script>window.location="' . base_url('user/addUser.php?error=stmtfailed') . '";</script>';
    exit();
}

mysqli_stmt_bind_param($stmtselect, 'ss', $stData, $dataPage);
mysqli_stmt_execute($stmtselect);
$users = mysqli_stmt_get_result($stmtselect);
