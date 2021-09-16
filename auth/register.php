<?php
    require "function.php";

    if(isset($_POST["tambah"])){
        if(reg($_POST)){
        }
        echo mysqli_error($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PMB | POLIBANG</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/hm/img/favicon.png" rel="icon">
    <link href="../assets/hm/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/hm/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">    
    <link href="../assets/hm/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/hm/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/hm/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/hm/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/hm/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/hm/vendor/aos/aos.css" rel="stylesheet">
    
    <!-- Template Main CSS File -->
    <link href="../assets/hm/css/style.css" rel="stylesheet">
</head>

<body class="appointment section-bg">
    <main id="main">    
        <section>
            <div class="container">
                <div class="section-title">
                    <h2>Sign Up</h2>
                </div>
            </div>
            <div align="center">
                <div class="col-lg-4">
                <form action="" method="POST">
                    <ul>
                        <li>
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" id="name" placeholder="Nama Lengkap..." require autofocus>
                        </li>
                        <li>
                            <label>Alamat Email</label>
                            <input type="text" name="email" id="email" placeholder="Alamat Email..." require autofocus>
                        </li>
                        <li>
                            <label>Password</label>
                            <input type="password" name="password" id="password" placeholder="Nama Lengkap..." require autofocus>
                        </li>
                        <li>
                            <label>Konfirmasi Password</label>
                            <input type="password" name="cpassword" id="cpassword" placeholder="Nama Lengkap..." require autofocus>
                        </li>
                        <li>
                            <button type="submit" name="tambah">Tambah</button>
                        </li>
                    </ul>
                </form>
                    <div class="mt-5">
                        <p>Sudah Punya Akun? <b><u><a style="color:cta" href="login.php">Masuk Akun</a></u></b></p>
                    </div>
                </div>
            </div>  
        </section><!-- End Contact Section -->
    </main>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->    
    <script src="../assets/hm/vendor/jquery/jquery.min.js"></script>
    
    <script src="../assets/hm/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/hm/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/hm/vendor/php-email-form/validate.js"></script>
    <script src="../assets/hm/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../assets/hm/vendor/counterup/counterup.min.js"></script>
    <script src="../assets/hm/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/hm/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/hm/vendor/aos/aos.js"></script>
    

    <!-- Template Main JS File -->
    <script src="../assets/hm/js/main.js"></script>

</body>

</html>