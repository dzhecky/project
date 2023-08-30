<h5>Halaman tambah data siswa</h5>
<br>
<a href="?url=siswa" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Kembali</a>
<hr>
<form action="?url=proses_tambah_siswa" method="post" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="number" name="nisn" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="number" name="nis" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kelas</label>
        <select name="id_kelas" class="form-control" required>
            <option value="">Pilih Kelas</option>
            <?php
                include '../koneksi.php';
                $kelas = mysqli_query($koneksi,"SELECT * FROM kelas ORDER BY nama_kelas ASC");
                foreach($kelas as $data_kelas){
                ?>
                    <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas']; ?> </option>
                <?php } ?>
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="form-group mb-2">
        <label>Foto siswa</label>
        <input type="file" name="file" class="form-control">
    </div>
    <div class="form-group mb-2">
        <label>No telpon</label>
        <input type="number" name="no_telp" class="form-control" required>
    </div>
    <div class="form mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-control" required>
            <option value="">Pilih SPP</option>
            <?php
                include '../koneksi.php';
                $spp = mysqli_query($koneksi,"SELECT * FROM spp ORDER BY id_spp ASC");
                foreach($spp as $data_spp){
                ?>
                    <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> | <?= number_format($data_spp['nominal'],2,',','.'); ?> </option>
                <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>