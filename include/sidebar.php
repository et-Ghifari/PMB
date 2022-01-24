<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="bars"></a>
            <b><a class="navbar-brand" href="<?= base_url('../dashboard') ?>">PMB - POLIBANG - <?php echo date('Y'); ?></a></b>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse"></div>
    </div>
</nav>
<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- Informasi User -->
        <div class="user-info">
            <div class="image">
                <?php
                if (isset($_SESSION['useruid'])) {
                ?>
                    <img src="<?= !empty($_SESSION['userimage']) ? $_SESSION['userimage'] : base_url('../assets/images/image.png') ?>" width="48" height="48" alt="<?php echo $_SESSION['username'] ?>" />
                <?php
                }
                ?>
            </div>
            <div class="info-container">
                <?php
                if (isset($_SESSION['useruid'])) {
                ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'] ?></div>
                    <div class="email"><?php echo $_SESSION['useremail'] ?></div>
                <?php
                }
                ?>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?= base_url('../profile') ?>"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?= base_url('../auth/logout.php') ?>"><i class="material-icons">input</i>Log Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?= base_url('../dashboard') ?>">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php
                $level = $_SESSION['userlevel'] == 'admin';
                if ($level) {
                ?>
                    <li>
                        <a class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Admin</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url('../user') ?>">User</a>
                            </li>
                            <li>
                                <a href="<?= base_url('../menu') ?>">Menu</a>
                            </li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <li>
                    <a href="<?= base_url('../form') ?>">
                        <i class="material-icons">assignment</i>
                        <span>Formulir Pendaftaran</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('../file') ?>">
                        <i class="material-icons">attach_file</i>
                        <span>Berkas Pendaftran</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('../proof') ?>">
                        <i class="material-icons">check_circle</i>
                        <span>Bukti Transfer</span>
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
                Designed by <b><a href="<?= base_url('../') ?>">PMB | POLIBANG</a></b>
            </div>
        </div>
    </aside>
</section>