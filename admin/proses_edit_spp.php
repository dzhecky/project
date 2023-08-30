<?php
    $id_spp = $_GET['id_spp'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    include '../koneksi.php';
    $sql = "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$id_spp'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("Location:?url=spp");
    } else{
        echo "<script>alert('Data tidak tersimpan!'); window.locatin.assign('?url=spp');</script>";
    }


?>