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
                    <p class="m-0 fw-light text-dark"><span>Tanggal Mulai :</span> <?php echo '  ' . $rw[4] ?></p>
                    <p class="m-0 fw-light text-dark"><span>Tanggal Selesai :</span> <?php echo '  ' . $rw[5] ?></p>
                </div>
                <div class="card-body text-dark">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-primary">Soal Pilihan Ganda</h5>
                                    <a class="btn btn-primary" href="index.php?page=pilgan&id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>">
                                        Tambah Soal</a>
                                </div>
                                <div class="card-body text-dark">
                                    <?php
                                    $no = 0;
                                    $query = mysqli_query($koneksi, "SELECT * FROM pilihan_ganda WHERE id_tugas=$tugas");
                                    while ($d = mysqli_fetch_array($query)) {
                                        $no++;
                                    ?>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                <div class="card shadow mb-2">
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
                                                                <div class="soal  <?php if ($d['kunci_jawaban'] == "A") {
                                                                                        echo "bg-success text-light";
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
                                                                <div class="soal  <?php if ($d['kunci_jawaban'] == "B") {
                                                                                        echo "bg-success text-light";
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
                                                                <div class="soal  <?php if ($d['kunci_jawaban'] == "C") {
                                                                                        echo "bg-success text-light";
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
                                                                <div class="soal  <?php if ($d['kunci_jawaban'] == "D") {
                                                                                        echo "bg-success text-light";
                                                                                    } ?>">
                                                                    <p>D. </p>
                                                                    <?php echo $d['jawaban_d'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr style="margin: auto;" class="mt-3" />
                                                        <div class="mt-2 py-3 d-flex flex-row align-items-center justify-content-center">
                                                            <a class="btn btn-primary mr-3" href="index.php?page=editpilgan&id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>&id_pilgan=<?= $d['id_pilgan'] ?>">
                                                                Edit</a>
                                                            <a class="btn btn-danger mr-2" href="./content/guru/function/hapuspilgan.php?id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>&id_pilgan=<?= $d['id_pilgan'] ?>">
                                                                Hapus</a>
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
                                    <a class="btn btn-primary" href="index.php?page=essay&id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>">
                                        Tambah Soal</a>
                                </div>
                                <div class="card-body text-dark">
                                    <?php
                                    $n = 0;
                                    $query1 = mysqli_query($koneksi, "SELECT * FROM essay WHERE id_tugas=$tugas");
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
                                                        <hr style="margin: auto;" class="mt-3" />
                                                        <div class="py-3 d-flex flex-row align-items-center justify-content-center">
                                                            <a class="btn btn-primary mr-3" href="index.php?page=editessay&id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>&id_essay=<?= $a['id_essay'] ?>">
                                                                Edit</a>
                                                            <a class="btn btn-danger mr-2" href="./content/guru/function/hapusessay.php?id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>&id_essay=<?= $a['id_essay'] ?>">
                                                                Hapus</a>
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