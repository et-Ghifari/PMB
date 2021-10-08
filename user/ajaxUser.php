<?php
require_once '../progres/userProgres.php';

if (empty(@$_GET['keyword'])) {
    $dataselect = 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users` ORDER BY `usersName` LIMIT ?, ?';
    $stmtselect = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtselect, $dataselect)) {
        echo '<script>window.location="' . base_url('user/addUser.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtselect, 'ss', $stData, $dataPage);
    mysqli_stmt_execute($stmtselect);
    $users = mysqli_stmt_get_result($stmtselect);
} else {
    $keyword  = '%' . @$_GET['keyword'] . '%';

    $datasearch = 'SELECT `usersId`, `usersName`, `usersEmail`, `usersUid` FROM `users` WHERE `usersName` LIKE ? OR `usersEmail` LIKE ? OR `usersUid` LIKE ?';
    $stmtsearch = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtsearch, $datasearch)) {
        echo '<script>window.location="' . base_url('user/user.php?error=stmtfailed') . '";</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmtsearch, 'sss', $keyword, $keyword, $keyword);
    mysqli_stmt_execute($stmtsearch);
    $users = mysqli_stmt_get_result($stmtsearch);
}
?>
<table class="table">
    <thead>
        <tr>
            <th class="col-sm-4">NAMA LENGKAP</th>
            <th class="col-sm-4">ALAMAT EMAIL</th>
            <th class="col-sm-2">USERNAME</th>
            <th class="col-sm-2"><i class="material-icons">settings</i></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?= $user['usersName'] ?></td>
                <td><?= $user['usersEmail'] ?></td>
                <td><?= $user['usersUid'] ?></td>
                <td>
                    <a href="editUser.php?id=<?= $user['usersId'] ?>" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="left" title="Edit User"><i class="material-icons">edit</i></a>
                    <a href="deleteUser.php?id=<?= $user['usersId'] ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="right" title="Hapus User"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>