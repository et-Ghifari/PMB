<?php

//Register user
if (isset($_POST['register']))
{
    $name     = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $email    = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $username = trim(mysqli_real_escape_string($conn, $_POST['username']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
    $confirm  = trim(mysqli_real_escape_string($conn, $_POST['confirm']));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo '<script>window.location="' . base_url('register.php?error=invalidemail') . '";</script>';
        exit();
    }

    if (!preg_match('/^[a-zA-Z0-9]*$/', $username))
    {
        echo '<script>window.location="' . base_url('register.php?error=invaliduid') . '";</script>';
        exit();
    }

    $dataselect = 'SELECT `usersEmail`, `usersUid`, `usersPwd` FROM `users` WHERE `usersEmail` = ? OR `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('register.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $email, $username);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        echo '<script>window.location="' . base_url('register.php?error=registed') . '";</script>';
        exit();
    }

    $datainsert = 'INSERT INTO `users` (`usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES (?, ?, ?, ?)';
    $stmtinsert = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtinsert, $datainsert))
    {
        echo '<script>window.location="' . base_url('register.php?error=stmtfailed') . '";</script>';
        exit();
    }

    $pwdHashed = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmtinsert, 'ssss', $name, $email, $username, $pwdHashed);
    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);

    echo
    '<script>
            alert("Pembuatan Akun Berhasil")
            document.location="' . base_url('login.php') . '";
        </script>';
    exit();
}

//Login user
if (isset($_POST['login']))
{
    $uid      = trim(mysqli_real_escape_string($conn, $_POST['uid']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['password']));

    $dataselect = 'SELECT `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `usersLevel` FROM `users` WHERE `usersEmail` = ? OR `usersUid` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('login.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $uid, $uid);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);
    $data = mysqli_fetch_assoc($resultData);

    if ($data == false)
    {
        echo '<script>window.location="' . base_url('login.php?error=uidwrong') . '";</script>';
        exit();
    }

    $pwdHashed = $data['usersPwd'];
    $checkPwd  = password_verify($password, $pwdHashed);

    if ($checkPwd == false)
    {
        echo '<script>window.location="' . base_url('login.php?error=pwdwrong') . '";</script>';
        exit();
    } elseif ($checkPwd == true) {
        $_SESSION['useruid']   = $data['usersUid'];
        $_SESSION['useremail'] = $data['usersEmail'];
        $_SESSION['userlevel'] = $data['usersLevel'];
        $_SESSION['username']  = $data['usersName'];

        echo
        '<script>
            alert("Selamat Login Berhasil")
            document.location="' . base_url('../dashboard') . '";
        </script>';
        exit();
    }
}
