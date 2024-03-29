<div class="container-fluid p-1">
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" style="float:right;" data-target="#tambahdatamapel" data-whatever="Siswa">Tambah Mata Pelajaran</button>
</div>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">No</th>
                <th scope="col">Kode Mata Pelajaran</th>
                <th scope="col">Nama Mata Pelajaran</th>
                <th scope="col">Kelas</th>
                <th scope="col">Guru Pengampu</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT kd_mapel,nama_mapel,kelas.nama_kelas AS kelas, guru.nama AS guru from mata_pelajaran INNER JOIN kelas ON kelas.id_kelas = mata_pelajaran.id_kelas INNER JOIN guru ON guru.id_guru = mata_pelajaran.id_guru ";

            $data_siswa = mysqli_query($koneksi, $query);
            $nomor = 1;
            while ($d = mysqli_fetch_array($data_siswa)) {
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $d['kd_mapel']; ?></td>
                    <td><?php echo $d['nama_mapel']; ?></td>
                    <td><?php echo $d['kelas']; ?></td>
                    <td><?php echo $d['guru']; ?></td>
                    <td>
                        <!-- ?page=hapusMobil&nopol_mobil= echo $data['nopol_mobil']; ?> -->
                        <a data-toggle="modal" data-target="#updatedatamapel<?php echo $d['kd_mapel']; ?>" class="link"><img name="pencil" src="../assets/edit.png"></a>
                        <a href="./content/admin/function/hapusmapel.php?kd_mapel=<?php echo $d['kd_mapel'] ?>" class="link"><img name="delete" src="../assets/delete.png" onclick="return confirm('Yakin Akan di Hapus ?')"></a>
                    </td>
                </tr>
                <!-- Update Data Guru -->
                <div class="modal fade" id="updatedatamapel<?php echo $d['kd_mapel'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Mata Pelajaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            $kd = $d['kd_mapel'];
                            $query = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE kd_mapel='$kd'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="modal-body">
                                    <form action="./content/admin/function/updatemapel.php" method="POST">
                                        <div class="form-group">
                                            <label for="kode" class="col-form-label">Kode Mata Pelajaran:</label>
                                            <input type="text" class="form-control" id="" name="" value="<?php echo $row['kd_mapel']; ?>" disabled>
                                            <input type="hidden" class="form-control" id="kode" name="kode" value="<?php echo $row['kd_mapel']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama" class="col-form-label">Nama Mata Pelajaran:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_mapel']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas" class="col-form-label">Kelas:</label>
                                            <select id="kelas" class="form-control" name="kelas" value="<?php echo $row['id_kelas']; ?>" required>
                                                <option value="">Pilih Kelas</option>
                                                <?php
                                                $kelas = $row['id_kelas'];
                                                $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                                                $ii = 1;
                                                while ($wi = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?php echo $wi['id_kelas'] ?> " <?php if ($row['id_kelas'] == $wi['id_kelas']) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $wi['nama_kelas'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="guru" class="col-form-label">Guru Pengampu:</label>
                                            <select id="guru" class="form-control" name="guru" value="<?php echo $row['id_guru']; ?>" required>
                                                <option value="">Pilih Guru Pengampu</option>
                                                <?php
                                                $guru = $row['id_guru'];
                                                $query = mysqli_query($koneksi, "SELECT * FROM guru");
                                                $ii = 1;
                                                while ($wi = mysqli_fetch_array($query)) {
                                                ?>
                                                    <option value="<?php echo $wi['id_guru'] ?> " <?php if ($row['id_guru'] == $wi['id_guru']) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $wi['nama'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" style="float: right;" class="btn btn-primary" onclick="">Kirim</button>
                                    </form>
                                <?php
                            }
                                ?>
                                </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </tbody>
    </table>

</div>