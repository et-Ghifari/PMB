<?php
if ($_GET['id_user']) {
    $id_user = $_GET['id_user'];

    mysqli_query($conn, 'DELETE FROM `user` WHERE `id_user` = "' . $id_user . '"');

    if (mysqli_affected_rows($conn)) {
        echo
        '<script>
            alert("User berhasil dihapus!")
            document.location.href = "?m=user"
        </script>';
    }
}
