<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">List Tugas</h5>

            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div class="table-responsive border px-2 py-4 ">
                    <table class="table table-bordered table-hover table-striped " id="data-table">
                        <thead style="background-color: #4e73df;">
                            <tr class="text-light">
                                <th scope="col">No</th>
                                <th scope="col">Nama Tugas</th>
                                <th scope="col">Mata Pelajaran</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nip = $_SESSION['username'];
                            $query = "SELECT tugas.id_tugas,tugas.judul_tugas,mata_pelajaran.id_mapel,mata_pelajaran.nama_mapel,kelas.nama_kelas FROM `tugas` INNER JOIN mata_pelajaran ON mata_pelajaran.id_mapel=tugas.id_mapel INNER JOIN kelas ON kelas.id_kelas=mata_pelajaran.id_kelas INNER JOIN guru ON guru.id_guru=mata_pelajaran.id_guru WHERE guru.nip=$nip";

                            $data_guru = mysqli_query($koneksi, $query);
                            $nomor = 1;
                            while ($d = mysqli_fetch_array($data_guru)) {
                            ?>
                                <tr>
                                    <td><?php echo $nomor++; ?></td>
                                    <td><?php echo $d['judul_tugas']; ?></td>
                                    <td><?php echo $d['nama_mapel']; ?></td>
                                    <td><?php echo $d['nama_kelas']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <!-- ?page=hapusMobil&nopol_mobil= echo $data['nopol_mobil']; ?> -->
                                        <a class="btn btn-primary px-1 py-1 " href="index.php?page=nilai&id_tugas=<?= $d['id_tugas'] ?>&id_mapel=<?= $d['id_mapel'] ?>">
                                            <span>Lihat Rekap Nilai</span></a>
                                    </td>
                                </tr>
                                <!-- Update Data Guru -->

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>

            </div>


        </div>
    </div>
</div>