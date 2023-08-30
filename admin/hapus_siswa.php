<?php

    $nisn = $_GET['nisn'];

    include '../koneksi.php';
    $gambar = mysqli_query($koneksi, "select * from siswa where nisn='$nisn'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    unlink($img);

    $sql = "DELETE FROM siswa WHERE nisn='$nisn'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("Location:?url=siswa");

    } else{
        echo "<script>alert('Data tidak terhapus!'); window.locatin.assign('?url=siswa');</script>";
    }


?>