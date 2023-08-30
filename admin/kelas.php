<h5>Halaman Data Kelas</h5>
<br>
<a href="?url=tambah_kelas" class="btn btn-outline-secondary"><i class="fa fa-plus-square" aria-hidden="true"></i>  Tambah Kelas</a>
<hr>
<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr class="fw-bold">
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Kompetensi Keahlian</td>
        <td>Edit</td>
        <td>Hapus</td>
    </tr>
    </thead>
    <tbody>
    <?php
        error_reporting(0);
        include '../koneksi.php';
        $no = 1;
        $panggil = $_POST['nama'];
        if($panggil != ''){
            $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE nama_kelas LIKE '%".$panggil."%' ");
        }else{
            $query = mysqli_query($koneksi, "SELECT * FROM kelas");
        }
        $sql = "SELECT * FROM kelas ORDER BY id_kelas";
        foreach($query as $data){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nama_kelas'] ?></td>
                <td><?= $data['kompetensi_keahlian'] ?></td>
                <td>
                    <a href="?url=edit_kelas&id_kelas=<?= $data['id_kelas'] ?>" class='btn btn-warning'>Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('Apakah kamu yakin mau menghapus data ini?')" 
                        href="?url=hapus_kelas&id_kelas=<?= $data['id_kelas'] ?>" class='btn btn-danger'>Hapus</a>
                </td>
            </tr>

            <?php } ?>
            </tbody>
</table>