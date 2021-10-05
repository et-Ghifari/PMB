<?php
require_once '../config/connect.php';
session_unset();
session_destroy();

echo '<script>window.location="' . base_url() . '";</script>';
exit();
