<?php
$mapel = $_GET['id_mapel'];
$tugas = $_GET['id_tugas'];
$s = $_SESSION['username'];
$q = mysqli_query($koneksi, "SELECT id_siswa FROM siswa WHERE nis = $s");
while ($rw = mysqli_fetch_row($q)) {
    $siswa = $rw[0];
}
?>
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <div>
        <a class="btn btn-primary px-5 py-2 " href="index.php?page=mapel&id_mapel=<?= $mapel ?>">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Kembali</span></a>
    </div>
</div>
<form action="./content/siswa/function/tambahjawaban.php" method="POST" enctype="multipart/form-data">
    <input type="text" class="form-control" id="id_mapel" name="id_mapel" value="<?= $mapel ?>" hidden>
    <input type="text" class="form-control" id="id_tugas" name="id_tugas" value="<?= $tugas ?>" hidden>
    <input type="text" class="form-control" id="id_siswa" name="id_siswa" value="<?= $siswa ?>" hidden>
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

                        </div>

                    </div>
                <?php } ?>
                <div class="card-body text-dark">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-primary">Soal Pilihan Ganda</h5>
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
                                </div>
                                <div class="card-body text-dark">
                                    <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT * FROM pilihan_ganda  WHERE id_tugas=$tugas");
                                    while ($d = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="card shadow mb-2" style="border-left: 5px solid;">
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
                                                                Jawab :
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-end align-items-center">
                                                                <input name="pilihan[<?php echo $d['id_pilgan'] ?>]" type="radio" value="A">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal ">
                                                                    <p>A. </p>
                                                                    <?php echo $d['jawaban_a'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-end align-items-center">
                                                                <input name="pilihan[<?php echo $d['id_pilgan'] ?>]" type="radio" value="B">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal ">
                                                                    <p>B. </p>
                                                                    <?php echo $d['jawaban_b'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-end align-items-center">
                                                                <input name="pilihan[<?php echo $d['id_pilgan'] ?>]" type="radio" value="C">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal">
                                                                    <p>C. </p>
                                                                    <?php echo $d['jawaban_c'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-end align-items-center">
                                                                <input name="pilihan[<?php echo $d['id_pilgan'] ?>]" type="radio" value="D">
                                                            </div>
                                                            <div class="col-10">
                                                                <div class="soal">
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
                                    <h5 class="m-0 font-weight-bold text-primary">Soal Essay</h5>

                                </div>
                                <div class="card-body text-dark">
                                    <?php
                                    $n = 0;
                                    $query1 = mysqli_query($koneksi, "SELECT * FROM essay  WHERE id_tugas=$tugas");
                                    while ($a = mysqli_fetch_array($query1)) {
                                        $n++;
                                    ?>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="card shadow mb-2" style="border-left: 5px solid;">
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
                                                            <div class="col-1  d-flex justify-content-center">

                                                            </div>
                                                            <div class="col-10">
                                                                Jawab :
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-1  d-flex justify-content-center">.
                                                            </div>
                                                            <div class="col-10">
                                                                <textarea name="essay[<?php echo $a['id_essay'] ?>]" id="essay" cols="20" rows="8" class="form-control"></textarea>
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
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary py-3 px-3 fw-bold fs-5" type="submit">Selesai Mengerjakan</button>
                    </div>

                </div>
                </div>
            </div>

        </div>


</form>