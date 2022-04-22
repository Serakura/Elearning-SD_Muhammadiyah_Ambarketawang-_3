<div class="container-fluid p-0">
    <button type="button" class="btn btn-primary ml-5 mb-2" data-toggle="modal" style="float:right;" data-target="#tambahdatakelas" data-whatever="Kelas">Tambah Data Kelas</button>
</div>



<div class="table-responsive border px-2 py-4">
    <table class="table table-bordered table-hover table-striped " id="data-table">
        <thead style="background-color: #4e73df;">
            <tr class="text-light">
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Jumlah Siswa</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT kelas.id_kelas,nama_kelas, COUNT(siswa.id_siswa) AS jumlah_siswa FROM kelas LEFT JOIN siswa ON kelas.id_kelas=siswa.id_kelas GROUP BY kelas.id_kelas";
            $data_kelas = mysqli_query($koneksi, $query);
            $nomor = 1;
            while ($d = mysqli_fetch_array($data_kelas)) {
            ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $d['nama_kelas']; ?></td>
                    <td><?php echo $d['jumlah_siswa']; ?></td>
                    <td>
                        <!-- ?page=hapusMobil&nopol_mobil= echo $data['nopol_mobil']; ?> -->
                        <a data-toggle="modal" data-target="#updatedatakelas<?php echo $d['id_kelas']; ?>" class="link"><img name="pencil" src="../assets/edit.png"></a>
                        <a href="./content/admin/function/hapuskelas.php?id_kelas=<?php echo $d['id_kelas'] ?>" class="link"><img name="delete" src="../assets/delete.png" onclick="return confirm('Yakin Akan di Hapus ?')"></a>
                    </td>
                </tr>
                <!-- Update Data Guru -->
                <div class="modal fade" id="updatedatakelas<?php echo $d['id_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Data Kelas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php
                            $id_kelas = $d['id_kelas'];
                            $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="modal-body">
                                    <form action="./content/admin/function/updatekelas.php" method="POST">
                                        <div class="form-group">
                                            <label for="nama" class="col-form-label">Nama Kelas:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama_kelas']; ?>" required>
                                            <input type="hidden" class="form-control" id="nip" name="nip" value="<?php echo $row['id_kelas']; ?>">
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