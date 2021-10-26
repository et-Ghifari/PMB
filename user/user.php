<?php
include_once '../config/connect.php';
include_once '../config/function.php';
require_once '../progres/userProgres.php';

//Kondisi sesi login
if (!isset($_SESSION['useremail']))
{
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="theme-cyan">
    <?php include_once '../include/sidebar.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Managemen User</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari..." autofocus autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <div align="right">
                                            <a type="button" href="<?= base_url('../user') ?>" class="btn btn-default waves-effect" data-toggle="tooltip" data-placement="bottom" title="Perbarui"><i class="material-icons">refresh</i></a>
                                            <a href="addUser.php" class="btn btn-success waves-effect">
                                                <i class="material-icons">add_circle_outline</i>
                                                <span><strong>TAMBAH</strong></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="userTable" class="table-responsive">
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
                                        <?php
                                        foreach ($users as $user)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $user['usersName'] ?></td>
                                                <td><?= $user['usersEmail'] ?></td>
                                                <td><?= $user['usersUid'] ?></td>
                                                <td>
                                                    <a href="editUser.php?id=<?= $user['usersId'] ?>" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="left" title="Edit User"><i class="material-icons">edit</i></a>
                                                    <a href="deleteUser.php?id=<?= $user['usersId'] ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="right" title="Hapus User"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
                                <div align="center">
                                    <ul class="pagination">
                                        <?php
                                        if ($actPage > 1)
                                        {
                                            ?>
                                            <li class="">
                                                <a href="?page=<?= $actPage - 1 ?>"><i class="material-icons">chevron_left</i></a>
                                            </li>
                                        <?php
                                        } else
                                        {
                                            ?>
                                            <li class="disabled">
                                                <a><i class="material-icons">chevron_left</i></a>
                                            </li>
                                        <?php
                                        }
                                            ?>
                                        <?php
                                        for ($i = 1; $i <= $page; $i++)
                                        {
                                            if ($i == $actPage)
                                            {
                                                ?>
                                                <li class="active"><a href="?page=<?= $i ?>" class="waves-effect"><?= $i ?></a></li>
                                            <?php
                                            } else
                                            {
                                                ?>
                                                <li><a href="?page=<?= $i ?>" class="waves-effect"><?= $i ?></a></li>
                                            <?php
                                            }
                                        }
                                                ?>
                                        <?php
                                        if ($actPage < $page)
                                        {
                                            ?>
                                            <li class="">
                                                <a href="?page=<?= $actPage + 1 ?>"><i class="material-icons">chevron_right</i></a>
                                            </li>
                                        <?php
                                        } else
                                        {
                                            ?>
                                            <li class="disabled">
                                                <a><i class="material-icons">chevron_right</i></a>
                                            </li>
                                        <?php
                                        }
                                            ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>