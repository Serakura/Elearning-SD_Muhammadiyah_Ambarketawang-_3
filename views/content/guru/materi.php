<?php
$mapel = $_GET['id_mapel'];
$materi = $_GET['id_materi'];
?>
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <div>
        <a class="btn btn-primary px-5 py-2 " href="index.php?page=mapel&id_mapel=<?= $mapel ?>">
            <i class="fas fa-fw fa-arrow-left"></i>
            <span>Kembali</span></a>
    </div>
</div>
<?php
$q = mysqli_query($koneksi, "SELECT judul_materi,deskripsi,isi_materi,nama_file,tanggal_upload FROM materi WHERE id_materi = $materi");
while ($rw = mysqli_fetch_row($q)) {
?>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 ">
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="m-0 font-weight-bold text-dark mr-2"><?php echo $rw[0] ?></h3>
                        <p class="m-0 fw-light text-dark"><span>Tanggal :</span> <?php echo $rw[4] ?></p>
                    </div>
                    <hr style="margin: auto; color:black;" class="my-3" />
                    <h5 class="m-0 fw-normal text-dark"><?php echo $rw[1] ?></h5>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-body">
                                    <?php echo $rw[2] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($rw[3] != null) {
                    ?>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-body">
                                        <object type="application/pdf" data="../upload_files/<?php echo $rw[3] ?>" width="100%" height="800px">
                                        </object>
                                        <!-- <object type="application/pdf" data="" width="600" height="400"></object> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        >
    <?php } ?>