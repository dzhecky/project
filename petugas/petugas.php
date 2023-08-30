<?php
    session_start();
    if(empty($_SESSION['level']!='id_petugas')) {
        echo "<script>
                alert('maaf kamu belum login');
                window.location.assign('../index2.php');
                </script>";
    }

    if($_SESSION['level']!='petugas') {
        echo "<script>
                alert('maaf kamu bukan sesi admin');
                window.location.assign('../index2.php');
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../oya.png">
    <title>Petugas - APK Pembayaran SPP</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<body>
    <style>
        h5{
            font-family: 'Montserrat';
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-family: Poppins;">
<div class="container">
<a class="navbar-brand ms-2" href="#">
    <img src="../oya.png" alt="" width="30" height="30" class="d-inline-block align-text-top ms-auto">
      OYA HIGH
    </a>
    <style>
        li{
            color: white;
        }
        li i{
            margin: 0 15px;
            color: white;
        }
        .mage{
            margin: 20px;
        }
        .zoomable{
            width: 100px;
        }
    </style>
       <div class="navbar-nav ms-auto">
       <li><a class="nav-link active" href="petugas.php"><i class="fa fa-user"></i>Petugas</a></li>
        <li><a class="nav-link active" href="petugas.php?url=pembayaran"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>Pembayaran</a></li>
        <li><a class="nav-link active" href="petugas.php?url=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></i>Logout</a></li>
      </div>
       </nav>
       </div>
    <div class="container mt-5">
    <img src="../oya.png" width="120" height="120" align="left"> 
    <br>
    <h5>Aplikasi Pembayaran SPP</h5>
    <h3><b>OYA Vocaational Highschool</b></h3>
    <br>
    <br>
       <div class="alert alert-info" style="font-family: Poppins;">
            <marquee direction="left">Halo petugas <b><?= $_SESSION['nama_petugas'] ?>!</b> Aplikasi Pembayaran SPP</marquee>
       </div>
       <div class="card mt-2">
        <div class="card-body">
            <!-- main konten isi web -->
            <?php
                $file = @$_GET['url'];
                    if(empty($file)) {
                        echo '<h4 style="font-family: Poppins;">Selamat datang dihalaman petugas</h4>';
                        echo 'aplikasi ini dibuat untuk memudahkan pembayaran spp siswa dan siswi';
                    }else{
                        include $file.'.php';
                    }
            ?>
        </div>
       </div>
       <?php
            $file = @$_GET['url'];
            if (!$file){

        ?>
        <div class="row mt-4">
        <div class="col">
            <div class="card bg-info text-white p-3">
                <div class="card-header">
                    <p>Total Pembayaran</p>
                    <hr>
                    <?php
                        include '../koneksi.php';
                        $sql = "SELECT SUM(jumlah_bayar) as bayar FROM pembayaran";
                        $query = $koneksi->query($sql);
                        $jumlah = ($query->fetch_assoc()['bayar']);
    
                    ?>
                
                <h3>Rp. <?php echo number_format($jumlah); $query->close(); ?></h3>
                <a href="petugas.php?url=pembayaran">Selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

                </div>
            </div>
        </div>
    </div>

    <?php
    }
    ?>
    <br><br><br>


<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatables').DataTable();
    });
</script>
</body>
</html>