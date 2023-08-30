<?php
    session_start();
    if(empty($_SESSION['nisn'])) {
        echo "<script>
                alert('maaf kamu belum login');
                window.location.assign('../index.php');
                </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../oya.png">
    <title>Siswa - APK Pembayaran SPP</title>
</head>
<body>
    <style>
        li{
            color: white;
        }
        li i{
            margin: 0 15px;
            color: white;
        }

        nav{
            font-family: 'Montserrat';
        }
        h3{
            font-family: 'Montserrat';
        }
        h4{
            font-family: 'Montserrat';
        }
        h5{
            font-family: 'Montserrat';
        }
    </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
       <a class="navbar-brand ms-2" href="#">
            <img src="../oya.png" alt="" width="30" height="30" class="d-inline-block align-text-top ms-auto">
            OYA HIGH
        </a>
       <div class="navbar-nav ms-auto">
       <li><a class="nav-link active" href="siswa.php"><i class="fa fa-user"></i>Siswa</a></li>
        <li><a class="nav-link active" href="siswa.php?url=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></i>Logout</a></li>
      </div>
      </div>
       </nav>
    <div class="container mt-5">
       <h3>Aplikasi Pembayaran SPP</h3>
       <div class="alert alert-info">
            <marquee direction="left">Haloo! <b><?= $_SESSION['nama']  ?></b> Selamat Datang di Aplikasi Pembayaran SPP</marquee>
       </div>
       <div class="card mt-2">
        <div class="card-body">
            <!-- main konten isi web -->
            <?php
                $file = @$_GET['url'];
                    if(empty($file)) {
                        echo '<h4>Selamat datang dihalaman siswa</h4>';
                        echo 'aplikasi ini dibuat untuk memudahkan pembayaran spp siswa dan siswi';
                        echo '<hr>';
                        include'history_pembayaran.php';
                    }else{
                        include $file.'.php';
                    }
            ?>
        </div>
       </div>
    </div>

<script src="../js/bootsstrap.bundle.min.js"></script>
</body>
</html>