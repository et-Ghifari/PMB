<?php

if (isset($_POST['editProfil']))
{
    $image = $_FILES['image'];
    
    $imageName    = $_FILES['image']['name'];
    $imageType    = $_FILES['image']['type'];    
    $imageSize    = $_FILES['image']['size'];
    $imageError   = $_FILES['image']['error'];
    $imageTmpName = $_FILES['image']['tmp_name'];

    $imageExt     = explode('.', $imageName);
    $imageActExt  = strtolower(end($imageExt));

    $allowed      = array('jpg', 'jpeg', 'png');

    if (!$imageError == 0)
    {
        echo '<script>window.location="' . base_url('profile.php?error=error') . '";</script>';
        exit();
    }

    if (!in_array($imageActExt, $allowed))
    {
        echo '<script>window.location="' . base_url('profile.php?error=upload') . '";</script>';
        exit();
    }    

    if ($imageSize > 2500000)
    {
        echo '<script>window.location="' . base_url('profile.php?error=bigfile') . '";</script>';
        exit();
    }

    $username = $_SESSION['username'];
    $imageNameNew = $username.'.'.$imageActExt;
    $imageDesti   = '../assets/images/users/'.$imageNameNew;
    
    move_uploaded_file($imageTmpName, $imageDesti);
    
    $dataimage = 'UPDATE `users` SET `usersImage` = ? WHERE `usersName` = ?';
    $stmtimage = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtimage, $dataimage))
    {
        echo '<script>window.location="' . base_url('editUser.php?error=stmtfailed') . '";</script>';
        exit();
    }
    
    mysqli_stmt_bind_param($stmtimage, 'ss', $imageNameNew, $username);
    mysqli_stmt_execute($stmtimage);
    mysqli_stmt_close($stmtimage);
    
    $dataselect = 'SELECT `usersName`, `usersImage` FROM `users` WHERE `usersName` = ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect))
    {
        echo '<script>window.location="' . base_url('login.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 's', $username);
    mysqli_stmt_execute($stmtselect);

    $resultData = mysqli_stmt_get_result($stmtselect);
    $data = mysqli_fetch_assoc($resultData);
    
    $_SESSION['username']  = $data['usersName'];
    $_SESSION['userimage']  = $data['usersImage'];

    echo
    '<script>
            alert("Photo profil berhasil di ganti")
            document.location="' . base_url('../dashboard') . '";
        </script>';
    exit();
}