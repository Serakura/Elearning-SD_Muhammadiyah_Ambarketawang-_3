<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
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
                    $nip = $_SESSION['username'];
                    $ck = mysqli_query($koneksi, "SELECT id_guru,nama FROM guru WHERE nip = $nip ");
                    while ($row = mysqli_fetch_row($ck)) {
                        $datas = $row[0];
                        $n = $row[1];
                    }
                    $background_colors = array('green', 'red', 'blue', 'yellow', 'purple', 'brown', 'aqua', 'green', 'red', 'blue', 'yellow', 'purple', 'brown', 'aqua');
                    $i = 0;
                    $query = mysqli_query($koneksi, "SELECT *,kelas.nama_kelas FROM mata_pelajaran INNER JOIN kelas ON kelas.id_kelas = mata_pelajaran.id_kelas WHERE id_guru = $datas");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-3">
                            <div class="card shadow" style="border-left: 5px solid <?= $background_colors[$i] ?>;">
                                <div class="card-body">

                                    <h5 class="card-title" style="color: <?= $background_colors[$i] ?>;"><?php echo $d['nama_mapel'] . " - " . $d['nama_kelas'] ?></h5>
                                    <p class="card-text"><?= $n ?></p>
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
</div>