<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2><?php echo $tittle ?></h2>
                <ul class="header-dropdown m-r-0 m-t-0">
                    <li>
                        <a href="?m=addUser" class="btn btn-success waves-effect">Tambah</a>
                    </li>
                </ul>
            </div>
            <div class="body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NAMA LENGKAP</th>
                            <th>ALAMAT EMAIL</th>
                            <th>USERNAME</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?php echo $user['usersName'] ?></td>
                                <td><?php echo $user['usersEmail'] ?></td>
                                <td><?php echo $user['usersUid'] ?></td>
                                <td>
                                    <a href="?m=editUser&usersId=<?php echo $user['usersId'] ?>" class="btn btn-primary waves-effect">edit</a>
                                    <a href="?m=deleteUser&usersId=<?php echo $user['usersId'] ?>" class="btn btn-danger waves-effect" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>