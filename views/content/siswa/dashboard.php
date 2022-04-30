<?php
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s'); ?>
<div class="row">
    <div class="col-xl-9 col-lg-12 col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Mata Pelajaran</h5>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <?php
                    $datas = '';
                    $nis = $_SESSION['username'];
                    $ck = mysqli_query($koneksi, "SELECT id_kelas FROM siswa WHERE nis = $nis");
                    while ($row = mysqli_fetch_row($ck)) {
                        $datas = $row[0];
                    }
                    $background_colors = array('green', 'red', 'blue', 'yellow', 'purple', 'brown', 'aqua', 'green', 'red', 'blue', 'yellow', 'purple', 'brown', 'aqua');
                    $i = 0;
                    $query = mysqli_query($koneksi, "SELECT id_mapel,kd_mapel,nama_mapel,kelas.nama_kelas,guru.nama FROM `mata_pelajaran` INNER JOIN kelas ON kelas.id_kelas = mata_pelajaran.id_kelas INNER JOIN guru ON guru.id_guru = mata_pelajaran.id_guru WHERE kelas.id_kelas=$datas");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
                            <div class="card shadow" style="border-left: 5px solid <?= $background_colors[$i] ?>;">
                                <div class="card-body">

                                    <h5 class="card-title" style="color: <?= $background_colors[$i] ?>;"><?php echo $d['nama_mapel'] . " - " . $d['nama_kelas'] ?></h5>
                                    <p class="card-text"><?= $d['nama'] ?></p>
                                    <a href="index.php?page=mapel&id_mapel=<?= $d['id_mapel'] ?>" class="btn btn-primary">Lihat Kelas</a>
                                </div>
                            </div>
                        </div>

                    <?php $i++;
                    } ?>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Tugas Terbaru</h5>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT tugas.*,mata_pelajaran.nama_mapel,mata_pelajaran.id_mapel,kelas.nama_kelas FROM tugas INNER JOIN mata_pelajaran ON tugas.id_mapel = mata_pelajaran.id_mapel INNER JOIN kelas ON kelas.id_kelas = mata_pelajaran.id_kelas INNER JOIN guru ON guru.id_guru = mata_pelajaran.id_guru WHERE kelas.id_kelas=$datas AND tugas.tgl_mulai> '$date' AND tugas.tgl_selesai> '$date'");

                    while ($d = mysqli_fetch_array($query)) {
                        $ty = $d['id_tugas'];
                        $query1 = mysqli_query($koneksi, "SELECT jawaban_siswa.* FROM jawaban_siswa INNER JOIN siswa ON siswa.id_siswa = jawaban_siswa.id_siswa  WHERE siswa.nis=$nis AND id_tugas=$ty");
                        if (mysqli_num_rows($query) > 0) {
                    ?>

                            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                                <div class="card shadow" style="border-left: 5px solid red;">
                                    <div class=" card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title"><?php echo $d['nama_mapel'] . " - " . $d['nama_kelas'] ?></h5>

                                        </div>

                                        <p class="card-text"><?= $d['judul_tugas'] ?></p>
                                        <a href="index.php?page=lembar_jawab&id_mapel=<?= $d['id_mapel'] ?>&id_tugas=<?= $d['id_tugas'] ?>" class="btn btn-primary <?php if (mysqli_num_rows($query1) > 0 || $d['tgl_mulai'] > $date) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    } ?>">Kerjakan</a>
                                    </div>
                                </div>
                            </div>

                    <?php
                        }
                    } ?>
                </div>

            </div>
        </div>
    </div>
</div>