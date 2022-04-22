<?php
$tugas = $_GET['id_tugas'];
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a class="btn btn-primary px-5 py-2 mb-2" href="index.php?page=rekapnilai">
        <i class="fas fa-fw fa-arrow-left"></i>
        <span>Kembali</span></a>
    <a class="btn btn-primary px-5 py-2 " href="./content/guru/function/downloadrekap.php?id_tugas=<?= $tugas ?>">
        <i class="fas fa-fw fa-file-pdf"></i>
        <span>Download Rekap Nilai</span></a>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 ">
                <?php
                $q = mysqli_query($koneksi, "SELECT id_tugas,judul_tugas,tgl_upload FROM tugas  WHERE id_tugas = $tugas");
                while ($rw = mysqli_fetch_row($q)) {
                ?>
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="m-0 font-weight-bold text-dark mr-2"><?php echo $rw[1] ?></h3>
                        <p class="m-0 fw-light text-dark"><span>Tanggal :</span> <?php echo '  ' . $rw[2] ?></p>
                    </div>
                    <hr style="margin: auto; color:black;" class="my-3" />

                <?php } ?>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div class="table-responsive border px-2 py-4 ">
                    <table class="table table-bordered table-hover table-striped " id="data-table">
                        <thead style="background-color: #4e73df;">
                            <tr class="text-light">
                                <th scope="col">No</th>
                                <th scope="col">Nomor Induk Siswa</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nip = $_SESSION['username'];
                            $query = "SELECT siswa.nis,siswa.nama,total_nilai FROM nilai INNER JOIN siswa ON siswa.id_siswa=nilai.id_siswa WHERE id_tugas=$tugas";

                            $data_guru = mysqli_query($koneksi, $query);
                            $nomor = 1;
                            while ($d = mysqli_fetch_array($data_guru)) {
                            ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?php echo $d['nis']; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['total_nilai']; ?></td>
                                </tr>
                                <!-- Update Data Guru -->

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>


        </div>
    </div>
</div>