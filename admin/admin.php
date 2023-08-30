<?php
    session_start();
    if(empty($_SESSION['level']!='id_petugas')) {
        echo "<script>
                alert('maaf kamu belum login');
                window.location.assign('../index.php');
                </script>";
    }

    if($_SESSION['level']!='admin') {
        echo "<script>
                alert('maaf kamu bukan sesi admin');
                window.location.assign('../index.php');
                </script>";
    }

    include '../koneksi.php';
    //ambil data pembayaran
    $get1 = mysqli_query($koneksi, "select * from kelas");
    $count1 = mysqli_num_rows($get1); //jumlah semua kolom

    //ambil data siswa
    $get2 = mysqli_query($koneksi, "select * from siswa");
    $count2 = mysqli_num_rows($get2); //jumlah semua kolom

    //ambil data petugas
    $get3 = mysqli_query($koneksi, "select * from petugas");
    $count3 = mysqli_num_rows($get3); //jumlah semua kolom

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../oya.png">
    <title>Admin - APK Pembayaran SPP</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand ms-3" href="#">
    <img src="../oya.png" alt="" width="30" height="30" class="d-inline-block align-text-top ms-auto">
      OYA HIGH
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <style>
        li{
            color: white;
        }
        li i{
            margin: 0 15px;
            color: white;
        }
        .zoomable{
            width: 100px;
        }
        label{
            font-family: 'Montserrat';
        }
        nav{
            font-family: 'Montserrat';
        }
        h5{
            font-family: 'Montserrat';
        }
        h3{
            font-family: 'Montserrat';
        }
        .card{
            font-family: 'Montserrat';
        }
        p{
            font-family: 'Montserrat';
        }
        .mage{
            margin: 20px;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
    <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav mx-auto mt-2">
            <li><a class="nav-link active" href="admin.php"><i class="fa fa-user"></i>Administrator</a></li>
            <li><a class="nav-link active" href="admin.php?url=siswa"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Siswa</a></li>
            <li><a class="nav-link active" href="admin.php?url=kelas"><i class="fa fa-university" aria-hidden="true"></i>Kelas</a></li>
            <li><a class="nav-link active" href="admin.php?url=spp"><i class="fa fa-bar-chart" aria-hidden="true"></i>Spp</a></li>
            <li><a class="nav-link active" href="admin.php?url=petugas"><i class="fa fa-users" aria-hidden="true"></i>Petugas</a></li>
            <li><a class="nav-link active" href="admin.php?url=pembayaran"><i class="fa fa-credit-card-alt" aria-hidden="true"></i>Pembayaran</a></li>
            <li><a class="nav-link active" href="admin.php?url=laporan"><i class="fa fa-file-text-o" aria-hidden="true"></i>Laporan</a></li>
            <li><a class="nav-link active" href="admin.php?url=logout"><i class="fa fa-sign-out" aria-hidden="true"></i></i>Logout</a></li>
        </ul>
        </div>
        </div>
        </nav>
    <div class="container mt-5">
    <img src="../oya.png" width="120" height="120" align="left"> 
    <br>
    <h5>Aplikasi Pembayaran SPP</h5>
    <h3><b>OYA Vocational Highschool</b></h3>
    <br>
    <br>
       <div class="alert alert-info" style="font-family: Poppins;">
            <marquee direction="left">Halo admin! selamat datang di Aplikasi Pembayaran SPP</marquee>
       </div>
       <div class="card mt-2">
        <div class="card-body">
            <!-- main konten isi web -->
            <?php
                $file = @$_GET['url'];
                    if(empty($file)) {
                        echo '<h4 style="font-family: Poppins;">Selamat datang dihalaman admin</h4>';
                        echo 'Aplikasi SPP ini dibuat untuk mempermudah proses pembayaran';
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
                        $sql = "SELECT SUM(jumlah_bayar) as bayar FROM pembayaran";
                        $query = $koneksi->query($sql);
                        $jumlah = ($query->fetch_assoc()['bayar']);
    
                    ?>
                
                <h3>Rp. <?php echo number_format($jumlah); $query->close(); ?></h3>
                <a href="admin.php?url=pembayaran">Selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card bg-danger text-white p-3">
                <div class="card-header">
                    <p>Jumlah Siswa</p>
                    <hr>
                    <h3><?= $count2 ?></h3>
                    <a href="admin.php?url=siswa">Selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                </div>
        </div>
        </div>
        <div class="col">
            <div class="card bg-warning text-white p-3">
                <div class="card-header">
                    <p>Jumlah Petugas</p>
                    <hr>
                    <h3><?= $count3 ?></h3>
                    <a href="admin.php?url=petugas">Selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

                </div>
        </div>
        </div>
        <div class="col">
            <div class="card bg-secondary text-white p-3">
                <div class="card-header">
                    <p>Jumlah kelas</p>
                    <hr>
                    <h3><?= $count1 ?></h3>
                    <a href="admin.php?url=kelas">Selengkapnya <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

                </div>
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
        $('#datatables').DataTable({
            pageLength : 5,
    lengthMenu: [[5, 10, 20,100], [5, 10, 20,100]]
        });
    });
</script>
</body>
</html>