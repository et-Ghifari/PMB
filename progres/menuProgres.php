<?php

//Add menu
if (isset($_POST['add']))
{
    $order = trim(mysqli_real_escape_string($conn, $_POST['order']));
    $name  = trim(strtolower(mysqli_real_escape_string($conn, $_POST['name'])));
    $url   = trim(strtolower(mysqli_real_escape_string($conn, $_POST['url'])));
    $act   = trim(mysqli_real_escape_string($conn, $_POST['act']));

    $dataselect = 'SELECT `menusOrder`, `menusUrl` FROM `menus` WHERE `menusOrder` = ? OR `menusUrl` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('addMenu.php?error=stmtselect') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $order, $url);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        echo '<script>window.location="' . base_url('addMenu.php?error=registed') . '";</script>';
        exit();
    }

    $datainsert = 'INSERT INTO `menus` (`menusOrder`, `menusName`, `menusUrl`, `menusAct`) VALUES (?, ?, ?, ?)';
    $stmtinsert = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtinsert, $datainsert))
    {
        echo '<script>window.location="' . base_url('addMenu.php?error=stmtinsert') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtinsert, 'ssss', $order, $name, $url, $act);
    mysqli_stmt_execute($stmtinsert);
    mysqli_stmt_close($stmtinsert);

    echo
    '<script>
            alert("Penambahan Menu Berhasil")
            document.location="' . base_url('menu.php') . '";
        </script>';
    exit();
}

//Edit Menu
if (isset($_GET['id']))
{
    $id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
    if (empty($id))
    {
        return false;
    }

    $dataselect = 'SELECT `menusId`, `menusOrder`, `menusName`, `menusUrl`, `menusAct` FROM `menus` WHERE `menusId` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('editMenu.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $id);
    mysqli_stmt_execute($stmtselect);
    $resultData = mysqli_stmt_get_result($stmtselect);
    $value  = mysqli_fetch_assoc($resultData);

    //Update user
    if (isset($_POST['edit']))
    {
        $name  = trim(strtolower(mysqli_real_escape_string($conn, $_POST['name'])));
        $url   = trim(strtolower(mysqli_real_escape_string($conn, $_POST['url'])));
        $act   = trim(mysqli_real_escape_string($conn, $_POST['act']));

        $dataupdate = 'UPDATE `menus` SET `menusName` = ?, `menusUrl` = ?, `menusAct` = ? WHERE `menusId` = ?';
        $stmtupdate = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmtupdate, $dataupdate))
        {
            echo '<script>window.location="' . base_url('editUser.php?error=stmtfailed') . '";</script>';
            exit();
        }

        mysqli_stmt_bind_param($stmtupdate, 'ssss', $name, $url, $act, $id);
        mysqli_stmt_execute($stmtupdate);
        mysqli_stmt_close($stmtupdate);

        echo
        '<script>
            alert("Perubahan Menu Berhasil")
            document.location="' . base_url('menu.php') . '";
        </script>';
        exit();
    }
}

//Read menu
$dataselect = 'SELECT `menusId`, `menusOrder`, `menusName`, `menusUrl`, `menusAct` FROM `menus` ORDER BY `menusOrder`';
$stmtselect = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmtselect, $dataselect))
{
    echo '<script>window.location="' . base_url('menu.php?error=stmtfailed') . '";</script>';
    exit();
}

mysqli_stmt_execute($stmtselect);
$menus = mysqli_stmt_get_result($stmtselect);