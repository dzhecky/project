<h5>Halalam tambah data petugas</h5>
<a href="?url=petugas" class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Kembali</a>
<hr>
<form action="?url=proses_tambah_petugas" method="post">
    <div class="form-group mb-2">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="text" name="password" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input type="text" name="nama_petugas" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Level</label>
        <select name="level" class="form-control" required>
            <option value="">Pilih Level Petugas</option>
            <option value="admin">Admin</option>
            <option value="petugas">petugas</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="reset" class="btn btn-warning">Kosongkan</button>
    </div>
</form>