<div class="container-fluid p-1">
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" style="float:right;" data-target="#tambahdatasiswa" data-whatever="Siswa">Tambah Data Siswa</button>
</div>

<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIS</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT nama,nis,password,jenis_kelamin,alamat,telp,email,kelas.nama_kelas AS kelas from siswa INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas";

            $data_siswa = mysqli_query($koneksi, $query);
            $nomor = 1;
            while ($d = mysqli_fetch_array($data_siswa)) {
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['nis']; ?></td>
                    <td><?php echo $d['jenis_kelamin']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['telp']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['kelas']; ?></td>
                    <td>
                        <!-- ?page=hapusMobil&nopol_mobil= echo $data['nopol_mobil']; ?> -->
                        <a data-toggle="modal" data-target="#updatedatasiswa<?php echo $d['nis']; ?>" class="link"><img name="pencil" src="../assets/edit.png"></a>
                        <a href="./content/admin/function/hapussiswa.php?nis=<?php echo $d['nis'] ?>" class="link"><img name="delete" src="../assets/delete.png" onclick="return confirm('Yakin Akan di Hapus ?')"></a>
                    </td>
                </tr>
                <!-- Update Data Guru -->
                <div class="modal fade" id="updatedatasiswa<?php echo $d['nis'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Data Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            $nis = $d['nis'];
                            $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="modal-body">
                                    <form action="./content/admin/function/updatesiswa.php" method="POST">
                                        <div class="form-group">
                                            <label for="nama" class="col-form-label">Nama:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip" class="col-form-label">NIS:</label>
                                            <input type="text" class="form-control" id="" name="" value="<?php echo $row['nis']; ?>" disabled>
                                            <input type="hidden" class="form-control" id="nis" name="nis" value="<?php echo $row['nis']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-form-label">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password" value="<?php $password = md5($row['password']);
                                                                                                                                echo $password; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jeniskelamin" class="col-form-label">Jenis Kelamin:</label>
                                            <select id="jeniskelamin" class="form-control" name="jeniskelamin" value="<?php echo $row['jenis_kelamin']; ?>" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == "Laki-laki") {
                                                                                echo 'selected';
                                                                            } ?>>Laki-laki</option>
                                                <option value="Perempuan" <?php if ($row['jenis_kelamin'] == "Perempuan") {
                                                                                echo 'selected';
                                                                            } ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon" class="col-form-label">Telepon:</label>
                                            <input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo $row['telp']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="col-form-label">Alamat:</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required><?php echo $row['alamat']; ?></textarea>
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