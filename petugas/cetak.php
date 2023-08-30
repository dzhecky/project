<!DOCTYPE html>
<html>
<head>
    <title>Cetak struk pembayaran</title>
</head>
<body>
    <center>
        <img src="../oya.png" width="100">
        <h1>OYA Vocational School</h1>
    </center>
    <hr>
    <br>
    <table class="table table-striped table-bordered" border="1" style="border-collapse: collapse;">
<thead>
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Tahun SPP</td>
        <td>Nominal dibayar</td>
        <td>Sudah dibayar</td>
        <td>Tanggal Bayar</td>
        <td>Petugas</td>
    </tr>
</thead>
<tbody>
    <?php
        include '../koneksi.php';
        $no = 1;
        $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran .nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND
        pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC";
        $query = mysqli_query($koneksi, $sql);
        foreach($query as $data){
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nama_kelas'] ?></td>
                <td><?= $data['tahun'] ?></td>
                <td><?= number_format($data['nominal'],2,',','.'); ?></td>
                <td><?= number_format($data['jumlah_bayar'],2,',','.'); ?></td>
                <td><?= $data['tgl_bayar'] ?></td>
                <td><?= $data['nama_petugas'] ?></td>
        <?php } ?>
        </tbody>
        <script>
            window.print()
        </script>
</body>
</html>