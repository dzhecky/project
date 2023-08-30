<h5>Halaman Data Siswa</h5>
<br>
<a href="?url=tambah_siswa" class="btn btn-outline-secondary"><i class="fa fa-plus-square" aria-hidden="true"></i>  Tambah Siswa</a>
<hr>
<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr class="fw-bold">
        <td>No</td>
        <td>NISN</td>
        <td>Password</td>
        <td>Nama</td>
        <td>Kelas</td>
        <td>Alamat</td>
        <td>Foto siswa</td>
        <td>No Telpon</td>
        <td>SPP</td>
        <td>Pilih</td>
    </tr>
    </thead>
    <tbody>
    <?php
        include '../koneksi.php';
        $no = 1;
        $sql = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY
            nama ASC";
        $query = mysqli_query($koneksi, $sql);
        foreach($query as $data){
            $gambar = $data['image']; //ambil gambar nya
            if($gambar == null){
                //jika tidak ada gambar
                $img = 'no foto';
            }else{
                //jika ada gambar
                $img = '<img src="../images/'.$gambar.'" class="zoomable">';
            }
            
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nama_kelas'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $img ?></td>
                <td><?= $data['no_telp'] ?></td>
                <td><?= $data['tahun'] ?> - <?= number_format($data['nominal'],2,',','.'); ?></td>
                <td>
                    <a href="?url=edit_siswa&nisn=<?= $data['nisn']?>" class='btn btn-warning'>Edit</a> |
                    <a onclick="return confirm('Apakah kamu yakin mau menghapus data ini?')" 
                        href="?url=hapus_siswa&nisn=<?= $data['nisn'] ?>" class='btn btn-danger'>Hapus</a>
                </td>
            </tr>

            <?php } ?>
            </tbody>
</table>