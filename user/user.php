<?php
require_once '../progres/userProgres.php';
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
                            <ul class="header-dropdown m-r-0 m-t-0">
                                <li class="button-demo">
                                    <a href="addUser.php" class="btn btn-success waves-effect">Tambah</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NAMA LENGKAP</th>
                                            <th>ALAMAT EMAIL</th>
                                            <th>USERNAME</th>
                                            <th><i class="material-icons">settings</i></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NAMA LENGKAP</th>
                                            <th>ALAMAT EMAIL</th>
                                            <th>USERNAME</th>
                                            <th><i class="material-icons">settings</i></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?php echo $user['usersName'] ?></td>
                                                <td><?php echo $user['usersEmail'] ?></td>
                                                <td><?php echo $user['usersUid'] ?></td>
                                                <td>
                                                    <a href="editUser.php?id=<?= $user['usersId'] ?>" class="btn btn-primary waves-effect">edit</a>
                                                    <a href="deleteUser.php?id=<?= $user['usersId'] ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</a>
                                                    <!-- <a href="?m=deleteUser&usersId=<?php echo $user['usersId'] ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</a> -->
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
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