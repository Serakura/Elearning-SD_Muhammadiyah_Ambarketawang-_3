<?php
$mapel = $_GET['id_mapel'];
$tugas = $_GET['id_tugas'];
?>
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <div>
        <a class="btn btn-primary px-5 py-2 " href="index.php?page=mapel&id_mapel=<?= $mapel ?>">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Kembali</span></a>
    </div>
</div>
<?php
$q = mysqli_query($koneksi, "SELECT id_tugas,judul_tugas,deskripsi,tgl_upload,tgl_mulai,tgl_selesai FROM tugas WHERE id_tugas = $tugas");
while ($rw = mysqli_fetch_row($q)) {
?>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="m-0 font-weight-bold text-dark mr-2"><?php echo $rw[1] ?></h3>
                        <p class="m-0 fw-light text-dark"><span>Tanggal :</span> <?php echo '  ' . $rw[3] ?></p>
                    </div>
                    <hr style="margin: auto; color:black;" class="my-3" />
                    <h5 class="m-0 fw-normal text-dark mb-4"><?php echo $rw[2] ?></h5>
                    <?php
                    $t = $rw[0];
                    $pilgan = mysqli_query($koneksi, "SELECT * FROM pilihan_ganda WHERE id_tugas = $t");
                    $essay = mysqli_query($koneksi, "SELECT * FROM essay WHERE id_tugas = $t");
                    echo '<p class="m-0 fw-light text-dark">Pilihan Ganda : ' . mysqli_num_rows($pilgan) . '</p>';
                    echo '<p class="m-0 fw-light text-dark">Essay : ' . mysqli_num_rows($essay) . '</p>';
                    ?>
                    <p class="m-0 fw-light text-dark"><span>Tanggal Mulai :</span> <?php echo '  ' . $rw[4] ?></p>
                    <p class="m-0 fw-light text-dark"><span>Tanggal Selesai :</span> <?php echo '  ' . $rw[5] ?></p>
                </div>
                <div class="card-body text-dark">

                    <div class="table-responsive border px-2 py-4 ">
                        <table class="table table-bordered table-hover table-striped " id="data-table">
                            <thead style="background-color: #4e73df;">
                                <tr class="text-light">
                                    <th scope="col">No</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT siswa.id_siswa,siswa.nis,siswa.nama,nilai.total_nilai FROM `jawaban_siswa` INNER JOIN siswa ON siswa.id_siswa = jawaban_siswa.id_siswa INNER JOIN nilai ON nilai.id_siswa=jawaban_siswa.id_siswa WHERE jawaban_siswa.id_tugas = $tugas GROUP BY id_siswa";

                                $data_guru = mysqli_query($koneksi, $query);
                                $nomor = 1;
                                while ($d = mysqli_fetch_array($data_guru)) {
                                ?>
                                    <tr>
                                        <td><?php echo $nomor++; ?></td>
                                        <td><?php echo $d['nis']; ?></td>
                                        <td><?php echo $d['nama']; ?></td>
                                        <td><?php echo $d['total_nilai']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <!-- ?page=hapusMobil&nopol_mobil= echo $data['nopol_mobil']; ?> -->
                                            <a class="btn btn-primary px-1 py-1 " href="index.php?page=jawaban&id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>&id_siswa=<?= $d['id_siswa'] ?>">
                                                <span>Lihat Jawaban</span></a>
                                        </td>
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

<?php } ?>