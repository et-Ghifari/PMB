<?php
require_once '../config/connect.php';

if (!isset($_SESSION['useremail'])) {
    echo '<script>window.location="' . base_url('login.php') . '";</script>';
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
            Dhasboard
        </div>
    </section>
    <?php include_once '../include/script.php'; ?>
</body>

</html>