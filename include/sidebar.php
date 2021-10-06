<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <b><a class="navbar-brand" href="<?= base_url('dhasboard') ?>">PMB - POLIBANG</a></b>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse"></div>
    </div>
</nav>
<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- Informasi User -->
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url('assets/images/users.png') ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <?php if (isset($_SESSION['useruid'])) { ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['useruid'] ?></div>
                    <div class="email"><?php echo $_SESSION['useremail'] ?></div>
                <?php } ?>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?= base_url('auth/logout.php') ?>"><i class="material-icons">input</i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="">
                    <a href="<?= base_url('dhasboard') ?>">
                        <i class="material-icons active">home</i>
                        <span>Dhasboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url('user') ?>">
                        <i class="material-icons">person</i>
                        <span>User</span>
                    </a>
                </li>
                <li class="">
                    <a href="<?= base_url('menu') ?>">
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
                Designed by <b><a href="<?= base_url() ?>">PMB | POLIBANG</a></b>
            </div>
        </div>
    </aside>
</section>