<?php

function emptyInputRegister($name, $email, $username, $password, $confirm)
{
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirm)) {
        return true;
    }
    return false;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function invalidUid($username)
{
    if (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        return true;
    }
    return false;
}

function pwdMatch($password, $confirm)
{
    if ($password != $confirm) {
        return true;
    }
    return false;
}

function uidExist($conn, $email, $username)
{
    $sql  = 'SELECT `usersEmail`, `usersUid`, `usersPwd` FROM `users` WHERE `usersUid` = ? OR `usersEmail` = ?;';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../register.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $email, $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password)
{
    $sql  = 'INSERT INTO `users` (`usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES (?, ?, ?, ?);';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../register.php?error=stmtfailed');
        exit();
    }

    $hashePwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $username, $hashePwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return mysqli_affected_rows($conn);
    exit();
}

function emptyInputLogin($username, $password)
{

    if (empty($username) || empty($password)) {
        return true;
    }
    return false;
}

function invalidLogin($conn, $username, $password)
{
    $uidExists = uidExist($conn, $username, $username);

    if ($uidExists == false) {
        header('Location: ../login.php?error=wrnguseremail');
        exit();
    }

    $pwdHashed = $uidExists['usersPwd'];
    $checkPwd  = password_verify($password, $pwdHashed);

    if ($checkPwd == false) {
        header('Location: ../login.php?error=wrngpassword');
        exit();
    } elseif ($checkPwd == true) {
        session_start();
        $_SESSION['useruid'] = $uidExists['usersUid'];
        $_SESSION['useremail'] = $uidExists['usersEmail'];

        return mysqli_affected_rows($conn);
        exit();
    }
}

function updateUser($conn, $userid, $name, $email, $username, $password)
{
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, 'UPDATE `users` SET `usersName` = "' . $name . '",
                                            `usersEmail` = "' . $email . '",
                                            `usersUid` = "' . $username . '",
                                            `usersPwd` = "' . $password . '"
                                            WHERE `usersId` = "' . $userid . '"');

    return mysqli_affected_rows($conn);
    exit();
}

function deleteUser($conn, $userid)
{
    mysqli_query($conn, 'DELETE FROM `users` WHERE `usersId` = "' . $userid . '"');
    return mysqli_affected_rows($conn);
    exit();
}
