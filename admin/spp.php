<h5>Halaman Data SPP</h5>
<br>
<a href="?url=tambah_spp" class="btn btn-outline-secondary"><i class="fa fa-plus-square" aria-hidden="true"></i>  Tambah SPP</a>
<hr>
<table class="table table-striped table-bordered">
    <tr class="fw-bold">
        <td>No</td>
        <td>Tahun</td>
        <td>Nominal</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    <?php
        include '../koneksi.php';
        $no = 1;
        $sql = "SELECT * FROM spp ORDER BY id_spp DESC";
        $query = mysqli_query($koneksi, $sql);
        foreach($query as $data){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['tahun'] ?></td>
                <td><?= $data['nominal'] ?></td>
                <td>
                    <a href="?url=edit_spp&id_spp=<?= $data['id_spp']?>" class='btn btn-warning'>Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('Apakah kamu yakin mau menghapus data ini?')" 
                        href="?url=hapus_spp&id_spp=<?= $data['id_spp'] ?>" class='btn btn-danger'>Hapus</a>
                </td>
            </tr>

            <?php } ?>
</table>