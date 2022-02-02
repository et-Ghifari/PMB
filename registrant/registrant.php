<?php
require_once '../config/connect.php';
require_once '../config/function.php';
require_once '../progres/formProgres.php';

if (!isset($_SESSION['useremail']) || !isset($_SESSION['useruid'])) {
    echo '<script>window.location="' . base_url('../auth/login.php') . '";</script>';
    exit();
}

if (!$_SESSION['userlevel'] == 'admin') {
    echo '<script>window.location="' . base_url('../dashboard') . '";</script>';
}
?>
<!DOCTYPE html>
<html>
<?php include_once '../include/head.php'; ?>

<body class="theme-cyan">
    <?php include_once '../include/sidebar.php'; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CALON MAHASISWA</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Calon Mahasiswa</h2>
                        </div>
                        <div class="body">
                            <div class="panel-group" id="accordion_19" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-col-cyan">
                                    <div class="panel-heading" role="tab" id="headingOne_19">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapseOne_19" aria-expanded="true" aria-controls="collapseOne_19">
                                                <i class="material-icons">local_library</i>Jalur Mandiri
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_19">
                                        <div class="panel-body">
                                            <div id="" class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>NO.</th>
                                                            <th>NAMA LENGKAP</th>
                                                            <th>ALAMAT EMAIL</th>
                                                            <th>No.TELP/WA</th>
                                                            <th class="col-sm-1 align-center"><i class="material-icons">settings</i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($mandiris as $mandiri) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $mandiri['formNo'] ?></td>
                                                                <td><?php echo $mandiri['formNama'] ?></td>
                                                                <td><?php echo $mandiri['formEmail'] ?></td>
                                                                <td><?php echo $mandiri['formHp'] ?></td>
                                                                <td class="align-center">
                                                                    <a href="" class="btn bg-cyan waves-effect" data-toggle="tooltip" data-placement="left" title="Review"><i class="material-icons">visibility</i></a>
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
                                    <div class="panel-heading" role="tab" id="headingTwo_19">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" href="#collapseTwo_19" aria-expanded="true" aria-controls="collapseTwo_19">
                                                <i class="material-icons">school</i>Jalur Beasiswa
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo_19" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo_19">
                                        <div class="panel-body">
                                            <div id="" class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>NO.</th>
                                                            <th>NAMA LENGKAP</th>
                                                            <th>ALAMAT EMAIL</th>
                                                            <th>No.TELP/WA</th>
                                                            <th class="col-sm-1 align-center"><i class="material-icons">settings</i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($beasiswas as $beasiswa) {
                                                        ?>
                                                            <tr>
                                                                <td class="align-center"><?php echo $beasiswa['formNo'] ?></td>
                                                                <td><?php echo $beasiswa['formNama'] ?></td>
                                                                <td><?php echo $beasiswa['formEmail'] ?></td>
                                                                <td><?php echo $beasiswa['formHp'] ?></td>
                                                                <td class="align-center">
                                                                    <a href="" class="btn bg-cyan waves-effect" data-toggle="tooltip" data-placement="left" title="Review"><i class="material-icons">visibility</i></a>
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
                    </div>
                </div>
            </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>