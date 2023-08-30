<h5>Halalam tambah data kelas</h5>
<a href="?url=kelas" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
<hr>
<form action="?url=proses_tambah_kelas" method="post">
    <div class="form-group mb-2">
        <label>Nama Kelas</label>
        <input type="text" name="nama_kelas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kompetensi Keahlian</label>
        <input type="text" name="kompetensi_keahlian" class="form-control" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>