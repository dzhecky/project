


<h5>Laporan  Pembayaran</h5>
<style>
    .form-inline{
        display: flex;
    }
</style>
<div class="row">
    <div class="col-auto">
        <form method="post" class= "form-inline">
            <input type="date" name="tgl_mulai" class="form-control">
            <input type="date" name="tgl_selesai" class="form-control mx-3">
            <button type="submit" name="filter_tgl" class="btn btn-outline-secondary mx-3">Filter</button>
        </form>
    </div>
    </div>
    <br>
    <table class="table table-striped table-bordered">
        <tr class="fw-bold">
            <td>No</td>
            <td>NISN</td>
            <td>Nama</td>
            <td>Kelas</td>
            <td>Tahun SPP</td>
            <td>Harus dibayar</td>
            <td>Sudah dibayar</td>
            <td>Tanggal Bayar</td>
            <td>Petugas</td>
        </tr>
        <?php

        if(isset($_POST['filter_tgl'])){
            $mulai = $_POST['tgl_mulai'];
            $selesai = $_POST['tgl_selesai'];

            if($mulai!=null || $selesai!=null){

            $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran .nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND
            pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND tgl_bayar BETWEEN '$mulai' and '$selesai' ORDER BY tgl_bayar DESC";

            }else{
                $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran .nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND
                pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC";
            }
            
        }else{
            $sql = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran .nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND
            pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC";

        }

            include '../koneksi.php';
            $no = 1;
            $query = mysqli_query($koneksi, $sql);
            foreach($query as $data){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nisn'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['nama_kelas'] ?></td>
                    <td><?= $data['tahun'] ?></td>
                    <td><?= number_format($data['nominal'],2,',','.'); ?></td>
                    <td><?= number_format($data['jumlah_bayar'],2,',','.'); ?></td>
                    <td><?= $data['tgl_bayar echo substr("Hello world",6);'] ?></td>
                    <td><?= $data['nama_petugas'] ?></td>
                </tr>

                <?php } ?>
    </table>
    <br>
    <a href="cetak_laporan.php" class="btn btn-outline-dark me-md-2">Exel</a>
    <a href="cetak.php" target="_blank" class="btn btn-outline-dark">Print</a>