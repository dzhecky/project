<?php
    $nisn = $_GET['nisn'];
    $kekurangan = $_GET['kekurangan'];
    include '../koneksi.php';
    $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);


?>




<h5 style="font-family: Poppins;">Halalam Pembayaran SPP</h5>
<a href="?url=pembayaran" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
<hr>
<form action="?url=proses_tambah_pembayaran&nisn=<?= $nisn; ?>" method="post">
<input name="id_spp" value="<?= $data['id_spp'] ?>" type="hidden" class="form-control" required>
    <div class="form-group mb-2">
        <label style="font-family: Poppins;">Nama Petugas</label>
        <input value="<?= $_SESSION['nama_petugas'] ?>" disabled class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label style="font-family: Poppins;">NISN</label>
        <input readonly name="nisn" value="<?= $data['nisn'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label style="font-family: Poppins;">Nama siswa</label>
        <input disabled value="<?= $data['nama'] ?>" type="text" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label style="font-family: Poppins;">Tanggal Bayar</label>
        <input type="date" name="tgl_bayar" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label style="font-family: Poppins;">Bulan Bayar</label>
        <select name="bulan_dibayar" class="form-control" required>
            <option value="">Pilih Bulan Dibayar</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label style="font-family: Poppins;">Tahun Bayar</label>
        <select name="tahun_dibayar" class="form-control" required>
            <option value="">Pilih Tahun Bayar</option>
            <?php
                for($i=2010; $i<=date('Y'); $i++){
                    echo"<option value='$i'>$i</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label style="font-family: Poppins;">Jumlah Bayar ( jumlah yang harus dibayar adalah <b><?= number_format($kekurangan,2,',','.') ?></b>)</label>
        <input type="number" name="jumlah_bayar" Max="<?= $kekurangan; ?>" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>