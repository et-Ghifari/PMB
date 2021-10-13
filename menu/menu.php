<?php
include_once '../config/connect.php';
include_once '../config/function.php';
require_once '../progres/menuProgres.php';
//Kondisi sesi login
if (!isset($_SESSION['useremail']))
{
    echo '<script>window.location="' . base_url('auth/login.php') . '";</script>';
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
                            <h2>Managemen Menu</h2>
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
                                            <a type="button" href="<?= base_url('menu') ?>" class="btn btn-default waves-effect" data-toggle="tooltip" data-placement="bottom" title="Perbarui"><i class="material-icons">refresh</i></a>
                                            <a href="addMenu.php" class="btn btn-success waves-effect">
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
                                            <th class="col-sm-4">POSISI MENU</th>
                                            <th class="col-sm-4">NAMA MENU</th>
                                            <th class="col-sm-2">URL MENU</th>
                                            <th class="col-sm-2"><i class="material-icons">settings</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($menus as $menu)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $menu['menusOrder'] ?></td>
                                                <td><?= $menu['menusName'] ?></td>
                                                <td><?= $menu['menusUrl'] ?></td>
                                                <td>
                                                    <a href="editMenu.php?id=<?= $menu['menusId'] ?>" class="btn btn-primary waves-effect" data-toggle="tooltip" data-placement="left" title="Edit Menu"><i class="material-icons">edit</i></a>
                                                    <a href="deleteMenu.php?id=<?= $menu['menusId'] ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" data-toggle="tooltip" data-placement="right" title="Hapus Menu"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                            ?>
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