<h5>Halaman Data Petugas</h5>
<br>
<a href="?url=tambah_petugas" class="btn btn-outline-secondary"><i class="fa fa-plus-square" aria-hidden="true"></i>  Tambah Petugas</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Username</td>
        <td>Password</td>
        <td>Nama Petugas</td>
        <td>Level</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
        include '../koneksi.php';
        $no = 1;
        $sql = "SELECT * FROM petugas ORDER BY id_petugas DESC";
        $query = mysqli_query($koneksi, $sql);
        foreach($query as $data){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['password'] ?></td>
                <td><?= $data['nama_petugas'] ?></td>
                <td><?= $data['level'] ?></td>
                <td>
                    <a href="?url=edit_petugas&id_petugas=<?= $data['id_petugas']?>" class='btn btn-warning'>Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('Apakah kamu yakin mau menghapus data ini?')" 
                        href="?url=hapus_petugas&id_petugas=<?= $data['id_petugas'] ?>" class='btn btn-danger'>Hapus</a>
                </td>
            </tr>

            <?php } ?>
</table>