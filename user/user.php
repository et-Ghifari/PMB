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
                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <form action="" method="POST">
                                                <input type="text" name="keyword" class="form-control" placeholder="Cari..." autofocus autocomplete="off">
                                                <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" name="search" class="btn bg-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Cari"><i class="material-icons">search</i></button>
                                            </form>
                                            <a type="button" href="<?= base_url('user') ?>" class="btn bg-grey btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="bottom" title="Perbarui"><i class="material-icons">refresh</i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div align="right">
                                            <a href="addUser.php" class="btn btn-success waves-effect">
                                                <i class="material-icons">add_circle_outline</i>
                                                <span><strong>TAMBAH</strong></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>NAMA LENGKAP</th>
                                            <th>ALAMAT EMAIL</th>
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
                            </div>
                            <div align="center">
                                <ul class="pagination">
                                    <li class="active"><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect">2</a></li>
                                    <li><a href="javascript:void(0);" class="waves-effect">3</a></li>
                                </ul>
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