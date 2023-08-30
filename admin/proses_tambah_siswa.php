<?php
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];

    $ekstensi_dibolehkan = array('png','jpg');
    $penamaan = $_FILES['file']['name']; //fungsi buat ambil nama gambar nya
    $dot = explode('.',$penamaan);
    $ekstensi = strtolower(end($dot)); //memilih ekstensinya
    $ukuran = $_FILES['file']['size']; //buat membatasi ukuran file nya
    $file_tmp = $_FILES['file']['tmp_name']; //lokasi awal file nya

    //enkripsi nama gambar agar tidak double

    $image = md5(uniqid($penamaan,true) . time()).'.'.$ekstensi; //gabungin nama gambar sama ekstensi nya (format gambarnya)

    if($count < 1){
    if($ukuran==0){
        //kalo ga mau pake gambar
            include '../koneksi.php';
            $sql = "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp')";
            $query = mysqli_query($koneksi, $sql);

            if($query){
                header("Location:?url=siswa");
            }else{
                echo "<script>alert('Data tidak tersimpan!'); window.locatin.assign('?url=siswa');</script>";
            }

    }else{
        //kalo mau
            include '../koneksi.php';
            $sql = "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,id_spp,image) VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp','$image')";
            $query = mysqli_query($koneksi, $sql);

            if($query){
                header("Location:?url=siswa");
            }else{
                echo "<script>alert('Data tidak tersimpan!'); window.locatin.assign('?url=siswa');</script>";
            }
    }
    //proses upload gambar
    if(in_array($ekstensi, $ekstensi_dibolehkan) === true){
        //validasi ukuran gambar
        if($ukuran < 15000000){
            move_uploaded_file($file_tmp, '../images/'.$image);

            include '../koneksi.php';
            $sql = "INSERT INTO siswa(nisn,nis,nama,id_kelas,alamat,no_telp,id_spp,image) VALUES('$nisn','$nis','$nama','$id_kelas','$alamat','$no_telp','$id_spp','$image')";
            $query = mysqli_query($koneksi, $sql);

            if($query){
                header("Location:?url=siswa");
            }else{
                echo "<script>alert('Data tidak tersimpan!'); window.locatin.assign('?url=siswa');</script>";
            }
        }else{
            //kalo file lebih dari ukuran yg disaranin
            echo "<script>alert('ukuran file melebihi dengan yang diperbolehkan!'); window.locatin.assign('?url=siswa');</script>";
        }
    }else{
        //kalo file nya tidak sesuai ekstensi
            echo "<script>alert('format harus berupa png atau jpg!'); window.locatin.assign('?url=siswa');</script>";
    }
}else{
    $_SESSION['alert'] = "NISN sudah terdaftar ";
    header("Location:?url=tambah_siswa");
    exit(0);
}
    


?>