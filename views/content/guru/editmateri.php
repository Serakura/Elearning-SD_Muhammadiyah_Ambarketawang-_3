<?php
$mapel = $_GET['id_mapel'];
$materi = $_GET['id_materi'];
$query = mysqli_query($koneksi, "SELECT * FROM materi WHERE id_materi='$materi'");
while ($row = mysqli_fetch_array($query)) {
?>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">Edit Materi</h5>
                </div>
                <div class="card-body text-dark">
                    <form action="./content/guru/function/updatemateri.php?id_materi=<?= $materi ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card shadow mb-2">
                                    <!-- Card Body -->
                                    <div class="card-body text-dark">
                                        <div class="row">
                                            <div class="col-md-3 d-flex align-items-center justify-content-between">
                                                <h3>Judul Materi</h3>
                                                <h3>:</h3>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul_materi'] ?>" required>
                                                <input type="text" class="form-control" id="id_mapel" name="id_mapel" value="<?= $mapel ?>" hidden>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card shadow mb-2">
                                    <!-- Card Body -->
                                    <div class="card-body text-dark">
                                        <div class="row">
                                            <div class="col-md-3 d-flex align-items-center justify-content-between">
                                                <h3>Deskripsi Materi</h3>
                                                <h3>:</h3>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" required><?php echo $row['deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card shadow mb-2">
                                    <!-- Card Body -->
                                    <div class="card-body text-dark">
                                        <div class="row">
                                            <div class="col-md-3 d-flex align-items-center justify-content-between">
                                                <h3>Isi Materi</h3>
                                                <h3>:</h3>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control " name="isimateri" id="editor1" required><?php echo $row['isi_materi'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card shadow mb-2">
                                    <!-- Card Body -->
                                    <div class="card-body text-dark">
                                        <div class="row">
                                            <div class="col-md-3 d-flex align-items-center justify-content-between">
                                                <h3>File Materi (.pdf)</h3>
                                                <h3>:</h3>
                                            </div>
                                            <div class="col-md-9">
                                                <?php
                                                if ($row['nama_file'] != null) {
                                                    echo '<div class="d-flex justify-content-center p-3" style="font-size: 90px; color: red;">';
                                                    echo '<i class="fas fa-fw fa-file-pdf"></i>';
                                                    echo '</div>';
                                                    echo '<div class="d-flex  justify-content-center">';
                                                    echo '<p class="text">' . substr($row['nama_file'], 14)   . '</p>';
                                                    echo '</div>';
                                                    echo '<div class="d-flex  justify-content-center">';
                                                    echo '<a class="btn btn-danger mb-3 " href="./content/guru/function/hapusfilepdf.php?id_mapel=' . $mapel . '&id_materi=' . $materi . '&nama_file=' . $row['nama_file'] . '">Hapus File</a></div>';
                                                } else {
                                                    echo '<div class="d-flex  justify-content-center p-2">';
                                                    echo '<h5>Tidak ada File Materi</h5>';
                                                    echo '</div>';
                                                }
                                                ?>
                                                <input type="text" class="form-control" id="file_lama" name="file_lama" value="<?php echo $row['nama_file'] ?>" hidden>
                                                <input type="file" class="form-control" name="filemateri" id="formFile">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between my-4">
                            <a class="btn btn-primary px-5 py-2 " href="index.php?page=mapel&id_mapel=<?= $mapel ?>">
                                <i class="fas fa-fw fa-arrow-left"></i>
                                <span>Kembali</span></a>

                            <button class="btn btn-primary px-4 py-2 " type="submit">Update Materi</button>
                        </div>
                    </form>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>