<?php
$mapel = $_GET['id_mapel'];
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');
?>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">List Materi</h5>

            </div>
            <!-- Card Body -->
            <div class="card-body">

                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM materi WHERE id_mapel = $mapel ORDER BY tanggal_upload ASC");
                while ($d = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                        <div class="card shadow" style="border-left: 5px solid green;">
                            <div class="card-body">

                                <h4 class="card-title" style="color: green;"><?php echo $d['judul_materi'] ?></h4>
                                <p class="card-text" style="font-size: 17px;"><?php echo $d['deskripsi'] ?></p>
                                <div class="d-sm-flex align-items-center justify-content-end">
                                    <a href="index.php?page=materi&id_mapel=<?= $mapel ?>&id_materi=<?php echo $d['id_materi'] ?>" class="btn btn-primary mr-2 mb-2">Lihat Materi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr style="margin: auto;" class="mb-3" />

                <?php
                } ?>
            </div>


        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">List Tugas</h5>

            </div>
            <!-- Card Body -->
            <div class="card-body">

                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM tugas WHERE id_mapel = $mapel");
                while ($d = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                        <div class="card shadow" style="border-left: 5px solid orange;">
                            <div class="card-body">

                                <h4 class="card-title" style="color: orange;"><?php echo $d['judul_tugas'] ?></h4>
                                <p class="card-text" style="font-size: 17px;"><?php echo $d['deskripsi'] ?></p>
                                <?php
                                $t = $d['id_tugas'];
                                $pilgan = mysqli_query($koneksi, "SELECT * FROM pilihan_ganda WHERE id_tugas = $t");
                                $essay = mysqli_query($koneksi, "SELECT * FROM essay WHERE id_tugas = $t");
                                echo '<p class="m-0 fw-light text-dark">Pilihan Ganda : ' . mysqli_num_rows($pilgan) . '</p>';
                                echo '<p class="m-0 fw-light text-dark">Essay : ' . mysqli_num_rows($essay) . '</p>';
                                ?>
                                <p class="m-0 fw-light text-dark"><span>Tanggal Mulai :</span> <?php echo '  ' . $d['tgl_mulai'] ?></p>
                                <p class="m-0 fw-light text-dark"><span>Tanggal Selesai :</span> <?php echo '  ' . $d['tgl_selesai'] ?></p>
                                <?php
                                $nis = $_SESSION['username'];
                                $tugas = $d['id_tugas'];
                                $nilai = mysqli_query($koneksi, "SELECT total_nilai FROM nilai INNER JOIN siswa ON siswa.id_siswa = nilai.id_siswa WHERE id_tugas=$tugas AND nis=$nis");
                                while ($n = mysqli_fetch_row($nilai)) {
                                ?>
                                    <p class="m-0 fw-light text-dark"><span>Nilai :</span> <?php echo '  ' . $n[0] ?></p>
                                <?php
                                }
                                ?>
                                <div class="d-sm-flex align-items-center justify-content-end">
                                    <a href="index.php?page=lembar_jawab&id_mapel=<?= $mapel ?>&id_tugas=<?= $d['id_tugas'] ?>" class="btn btn-primary mb-2 mr-2 <?php $id = $d['id_tugas'];
                                                                                                                                                                    $nis = $_SESSION['username'];
                                                                                                                                                                    $a = mysqli_query($koneksi, "SELECT jawaban_siswa.* FROM `jawaban_siswa` INNER JOIN siswa ON siswa.id_siswa = jawaban_siswa.id_siswa WHERE id_tugas=$id AND siswa.nis=$nis");
                                                                                                                                                                    if ($d['tgl_mulai'] < $date && $d['tgl_selesai'] > $date && mysqli_num_rows($a) <= 0) {
                                                                                                                                                                    } else if ($d['tgl_mulai'] > $date || $d['tgl_selesai'] < $date || mysqli_num_rows($a) > 0) {
                                                                                                                                                                        echo 'disabled';
                                                                                                                                                                    }  ?>"><?php
                                                                                                                                                                            if (mysqli_num_rows($a) <= 0) {
                                                                                                                                                                                echo 'Kerjakan Tugas';
                                                                                                                                                                            } else if (mysqli_num_rows($a) > 0) {
                                                                                                                                                                                echo 'Sudah Mengerjakan Tugas';
                                                                                                                                                                            }
                                                                                                                                                                            ?></a>
                                </div>


                            </div>
                        </div>
                    </div>
                    <hr style="margin: auto;" class="mb-3" />

                <?php
                } ?>
            </div>


        </div>
    </div>
</div>