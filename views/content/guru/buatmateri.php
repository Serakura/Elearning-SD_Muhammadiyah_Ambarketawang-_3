<?php
$mapel = $_GET['id_mapel'];
?>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">Buat Materi</h5>
            </div>
            <div class="card-body text-dark">
                <form action="./content/guru/function/tambahmateri.php" method="POST" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control" id="judul" name="judul" required>
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
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea>
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
                                            <textarea class="form-control ckeditor" name="isimateri" id="editor1" required></textarea>
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

                        <button class="btn btn-primary px-4 py-2 " type="submit">Upload Materi</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>