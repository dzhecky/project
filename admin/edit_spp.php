<?php
    $id_spp = $_GET['id_spp'];
    include '../koneksi.php';
    $sql = "SELECT * FROM spp WHERE id_spp='$id_spp'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);


?>




<h5>Halalam edit data spp</h5>
<a href="?url=spp" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Kembali</a>
<hr>
<form action="?url=proses_edit_spp&id_spp=<?= $id_spp; ?>" method="post">
    <div class="form-group mb-2">
        <label>Tahun</label>
        <input value="<?= $data['tahun'] ?>" type="number" name="tahun" maxleght="4" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input value="<?= $data['nominal'] ?>" type="number" name="nominal" maxleght="13" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>