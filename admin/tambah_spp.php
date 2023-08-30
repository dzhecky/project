<h5>Halalam tambah data spp</h5>
<br>
<a href="?url=spp" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Kembali</a>
<hr>
<form action="?url=proses_tambah_spp" method="post">
    <div class="form-group mb-2">
        <label>Tahun</label>
        <input type="number" name="tahun" maxleght="4" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input type="number" name="nominal" maxleght="13" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>