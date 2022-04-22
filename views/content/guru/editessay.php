<?php
$mapel = $_GET['id_mapel'];
$tugas = $_GET['id_tugas'];
$soal = $_GET['id_essay'];
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
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM essay WHERE id_essay = $soal");
                    while ($h = mysqli_fetch_row($query)) {
                    ?>
                        <form action="./content/guru/function/updateessay.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="card shadow mb-2">
                                        <!-- Card Body -->
                                        <div class="card-body text-dark">
                                            <div class="row">
                                                <div class="col-md-3 d-flex align-items-center justify-content-between">
                                                    <h3>Soal Essay</h3>
                                                    <h3>:</h3>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="soal" id="editor2" required><?php echo $h['1'] ?></textarea>
                                                    <input type="text" class="form-control" id="id_mapel" name="id_mapel" value="<?= $mapel ?>" hidden>
                                                    <input type="text" class="form-control" id="id_tugas" name="id_tugas" value="<?= $tugas ?>" hidden>
                                                    <input type="text" class="form-control" id="id_essay" name="id_essay" value="<?= $soal ?>" hidden>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                            <div class="d-sm-flex align-items-center justify-content-between my-4">
                                <a class="btn btn-primary px-5 py-2 " href="index.php?page=buatsoal&id_mapel=<?= $mapel ?>&id_tugas=<?= $tugas ?>">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                    <span>Kembali</span></a>

                                <button class="btn btn-primary px-4 py-2 " type="submit">Update Soal</button>
                            </div>
                        <?php } ?>
                        </form>

                </div>
            </div>
        </div>
    </div>

<?php } ?>