<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PMB | POLIBANG</title>
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.ds.css" rel="stylesheet">
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
</head>

<body class="theme-cyan">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <b><a class="navbar-brand" href="dhasboard.php">PMB - POLIBANG</a></b>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse"></div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <!-- Informasi User -->
            <div class="user-info">
                <div class="image">
                    <img src="assets/images/users.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <?php if (isset($_SESSION['useruid'])) { ?>
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['useruid'] ?></div>
                        <div class="email"><?php echo $_SESSION['useremail'] ?></div>
                    <?php } ?>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="auth/logoutAuth.php"><i class="material-icons">input</i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="?m=home">
                            <i class="material-icons active">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="?m=user">
                            <i class="material-icons">person</i>
                            <span>User</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="material-icons">layers</i>
                            <span>Menu</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; Copyright <strong><span>POLITEKNIK BALEKAMBANG JEPARA</span></strong>. All Rights Reserved
                </div>
                <div class="version">
                    Designed by <b><a href="index.php">PMB | POLIBANG</a></b>
                </div>
            </div>
        </aside>
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php
            include $content;
            ?>
        </div>
    </section>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/plugins/node-waves/waves.js"></script>
    <script src="assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/pages/tables/jquery-datatable.js"></script>
    <script src="assets/js/demo.js"></script>

</body>

</html>