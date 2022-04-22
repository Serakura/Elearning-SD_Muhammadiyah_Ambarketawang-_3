<?php
$mapel = $_GET['id_mapel'];
?>
<div class="d-sm-flex align-items-center justify-content-end mb-4">
    <div>
        <a href="index.php?page=buatmateri&id_mapel=<?= $mapel ?>" class="btn btn-primary">Tambah Materi</a>
        <a href="index.php?page=buattugas&id_mapel=<?= $mapel ?>" class="btn btn-primary ml-3">Tambah Tugas</a>
    </div>
</div>

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
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <div class="d-sm-flex align-items-center justify-content-start">
                                        <a href="index.php?page=materi&id_mapel=<?= $mapel ?>&id_materi=<?php echo $d['id_materi'] ?>" class="btn btn-primary mr-2 mb-2">Lihat Materi</a>
                                        <a href="index.php?page=editmateri&id_mapel=<?= $mapel ?>&id_materi=<?php echo $d['id_materi'] ?>" class="btn btn-primary mb-2 ">Edit Materi</a>
                                    </div>
                                    <a href="./content/guru/function/hapusmateri.php?id_mapel=<?= $mapel ?>&id_materi=<?php echo $d['id_materi'] ?>" class="btn btn-danger mb-2">Hapus Materi</a>
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

                                <div class="d-sm-flex align-items-center justify-content-between mt-3">
                                    <div class="d-sm-flex align-items-center justify-content-start">
                                        <a href="index.php?page=buatsoal&id_mapel=<?= $mapel ?>&id_tugas=<?= $d['id_tugas'] ?>" class="btn btn-primary mb-2 mr-2">Buat Soal</a>
                                        <a href="index.php?page=edittugas&id_mapel=<?= $mapel ?>&id_tugas=<?php echo $d['id_tugas'] ?>" class="btn btn-primary mb-2 ">Edit Tugas</a>
                                    </div>
                                    <a href="index.php?page=pekerjaansiswa&id_mapel=<?= $mapel ?>&id_tugas=<?php echo $d['id_tugas'] ?>" class="btn btn-primary mb-2 ">Pekerjaan Siswa</a>
                                    <a href="./content/guru/function/hapustugas.php?id_mapel=<?= $mapel ?>&id_tugas=<?php echo $d['id_tugas'] ?>" class="btn btn-danger mb-2">Hapus Tugas</a>
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