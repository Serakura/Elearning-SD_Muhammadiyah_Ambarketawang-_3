<?php
$mapel = $_GET['id_mapel'];
$tugas = $_GET['id_tugas'];
$siswa = $_GET['id_siswa'];

$show_siswa = mysqli_query($koneksi, "SELECT nis,nama FROM siswa WHERE id_siswa = $siswa");
while ($rw = mysqli_fetch_row($show_siswa)) {
    $nis = $rw[0];
    $nama = $rw[1];
}
?>
<h1 class="h4 mb-0 text-dark text-capitalize font-weight-bold fst-italic mb-3"><?php echo $nis . ' - ' . $nama ?></h1>
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <div>
        <a class="btn btn-primary px-5 py-2 " href="index.php?page=pekerjaansiswa&id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>">
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
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5 class="m-0 fw-normal text-dark mb-4"><?php echo $rw[2] ?></h5>
                            <p class="m-0 fw-light text-dark"><span>Tanggal Mulai :</span> <?php echo '  ' . $rw[4] ?></p>
                            <p class="m-0 fw-light text-dark"><span>Tanggal Selesai :</span> <?php echo '  ' . $rw[5] ?></p>
                        </div>
                        <div class="mr-3">
                            <form action="./content/guru/function/tambahnilai.php" method="POST">
                                <div class="d-flex justify-content-center mb-3">
                                    <?php
                                    $n = mysqli_query($koneksi, "SELECT total_nilai FROM nilai WHERE id_tugas = $tugas AND id_siswa=$siswa");
                                    while ($as = mysqli_fetch_row($n)) {
                                        $sw = $as[0];
                                    }
                                    ?>
                                    <input type="number" class="d-block" style="width: 120px; height:120px; text-align:center; font-size:50px;" maxlength="3" min="0" max="100" value="<?= $sw ?>" name="nilai" required>
                                    <input type="text" name="id_mapel" value="<?= $mapel ?>" hidden>
                                    <input type="text" name="id_tugas" value="<?= $tugas ?>" hidden>
                                    <input type="text" name="id_siswa" value="<?= $siswa ?>" hidden>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary px-2 py-2 ">
                                        Beri Nilai</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card-body text-dark">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-primary">Jawaban Pilihan Ganda</h5>
                                    <?php
                                    $ab = mysqli_query($koneksi, "SELECT COUNT(jawaban) FROM `jawaban_siswa` INNER JOIN pilihan_ganda ON pilihan_ganda.id_pilgan = jawaban_siswa.id_soal WHERE jawaban_siswa.jawaban=pilihan_ganda.kunci_jawaban AND jawaban_siswa.id_tugas=$tugas AND jawaban_siswa.id_siswa=$siswa AND tipe='pilgan'");
                                    while ($rz = mysqli_fetch_row($ab)) {
                                        $benar = $rz[0];
                                    }
                                    $ac = mysqli_query($koneksi, "SELECT COUNT(*) FROM pilihan_ganda  WHERE id_tugas=$tugas");
                                    while ($rz = mysqli_fetch_row($ac)) {
                                        $jumlah_soal = $rz[0];
                                    }

                                    ?>
                                    <p class="m-0">Jawaban Benar : <u><?= $benar ?></u> dari <?= $jumlah_soal ?> Soal </p>
                                </div>
                                <div class="card-body text-dark">
                                    <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT pilihan_ganda.*,jawaban_siswa.jawaban FROM pilihan_ganda INNER JOIN jawaban_siswa ON jawaban_siswa.id_soal=pilihan_ganda.id_pilgan WHERE pilihan_ganda.id_tugas=$tugas AND jawaban_siswa.tipe='pilgan' AND jawaban_siswa.id_siswa=$siswa");
                                    while ($d = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="card shadow mb-2" style="border-left: 10px solid <?php if ($d['jawaban'] == null || $d['jawaban'] == '') {
                                                                                                                    echo 'grey';
                                                                                                                } else if ($d['kunci_jawaban'] != $d['jawaban']) {
                                                                                                                    echo 'red';
                                                                                                                } else {
                                                                                                                    echo 'green';
                                                                                                                } ?>;">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-body text-dark">
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">
                                                                <?php echo $no ?>.
                                                            </div>
                                                            <div class="col-10">
                                                                <?php echo $d['soal'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">
                                                            </div>
                                                            <div class="col-10">
                                                                Jawaban :
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal  <?php if ($d['jawaban'] == "A" && $d['kunci_jawaban'] == $d['jawaban']) {
                                                                                        echo "bg-success text-light";
                                                                                    } else if ($d['jawaban'] == "A" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-danger text-light";
                                                                                    } else if ($d['kunci_jawaban'] == "A" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-warning text-light";
                                                                                    } ?>">
                                                                    <p>A. </p>
                                                                    <?php echo $d['jawaban_a'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal  <?php if ($d['jawaban'] == "B" && $d['kunci_jawaban'] == $d['jawaban']) {
                                                                                        echo "bg-success text-light";
                                                                                    } else if ($d['jawaban'] == "B" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-danger text-light";
                                                                                    } else if ($d['kunci_jawaban'] == "B" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-warning text-light";
                                                                                    } ?>">
                                                                    <p>B. </p>
                                                                    <?php echo $d['jawaban_b'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal  <?php if ($d['jawaban'] == "C" && $d['kunci_jawaban'] == $d['jawaban']) {
                                                                                        echo "bg-success text-light";
                                                                                    } else if ($d['jawaban'] == "C" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-danger text-light";
                                                                                    } else if ($d['kunci_jawaban'] == "C" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-warning text-light";
                                                                                    } ?>">
                                                                    <p>C. </p>
                                                                    <?php echo $d['jawaban_c'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal  <?php if ($d['jawaban'] == "D" && $d['kunci_jawaban'] == $d['jawaban']) {
                                                                                        echo "bg-success text-light";
                                                                                    } else if ($d['jawaban'] == "D" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-danger text-light";
                                                                                    } else if ($d['kunci_jawaban'] == "D" && $d['kunci_jawaban'] != $d['jawaban']) {
                                                                                        echo "bg-warning text-light";
                                                                                    } ?>">
                                                                    <p>D. </p>
                                                                    <?php echo $d['jawaban_d'] ?>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-primary">Jawaban Essay</h5>

                                </div>
                                <div class="card-body text-dark">
                                    <?php
                                    $n = 0;
                                    $query1 = mysqli_query($koneksi, "SELECT essay.*,jawaban_siswa.jawaban FROM essay INNER JOIN jawaban_siswa ON jawaban_siswa.id_soal=essay.id_essay WHERE essay.id_tugas=$tugas AND jawaban_siswa.tipe='essay' AND jawaban_siswa.id_siswa=$siswa");
                                    while ($a = mysqli_fetch_array($query1)) {
                                        $n++;
                                    ?>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="card shadow mb-2">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-body text-dark">

                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">
                                                                <?php echo $n ?>.
                                                            </div>
                                                            <div class="col-10">
                                                                <?php echo $a['soal'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">.
                                                            </div>
                                                            <div class="col-10">
                                                                <textarea name="" id="" cols="20" rows="4" class="form-control" disabled><?php echo $a['jawaban'] ?></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php } ?>