<?php

    $nisn = $_GET['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];
    
    //validasi gambar
    $ekstensi_dibolehkan = array('png', 'jpg');
    $name = $_FILES['file']['name']; //fungsi buat ambil nama gambar nya
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot)); //memilih ekstensinya
    $ukuran = $_FILES['file']['size']; //buat membatasi ukuran file nya
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi awal file nya

    //enkripsi nama gambar agar tidak double

    $image = md5(uniqid($nama,true) . time()).'.'.$ekstensi; //gabungin nama gambar sama ekstensi nya (format gambarnya)
    
    if($ukuran == 0){
        //kalo ga mau ubah2
        include '../koneksi.php';
        $sql = "UPDATE siswa SET nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp',id_spp='$id_spp' WHERE nisn='$nisn'";
        $query = mysqli_query($koneksi, $sql);
    
        if($query){
            header("Location:?url=siswa");
        } else{
            echo "<script>alert('Data tidak tersimpan!'); window.locatin.assign('?url=siswa');</script>";
        }
    }else{
        //kalo mau ubah
        move_uploaded_file($file_tmp, '../images/'.$image);
        include '../koneksi.php';
        $sql = "UPDATE siswa SET nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp',id_spp='$id_spp',image='$image' WHERE nisn='$nisn'";
        $query = mysqli_query($koneksi, $sql);
    
        if($query){
            header("Location:?url=siswa");
        } else{
            echo "<script>alert('Data tidak tersimpan!'); window.locatin.assign('?url=siswa');</script>";
        }
    }



?>

include '../koneksi.php';
    $sql = "UPDATE siswa SET nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp',id_spp='$id_spp' WHERE nisn='$nisn'";
    $query = mysqli_query($koneksi, $sql);

    if($query){
        header("Location:?url=siswa");
    } else{
        echo "<script>alert('Data tidak tersimpan!'); window.locatin.assign('?url=siswa');</script>";
    }