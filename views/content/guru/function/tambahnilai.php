<?php
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$siswa = $_POST['id_siswa'];
$tugas = $_POST['id_tugas'];
$nilai = $_POST['nilai'];

$query = mysqli_query($koneksi, "UPDATE nilai SET total_nilai='$nilai' WHERE id_siswa='$siswa' AND id_tugas='$tugas'");
if ($query) {
    echo "<script>
    window.location='../../../index.php?page=pekerjaansiswa&id_mapel=$mapel&id_tugas=$tugas&msg=Berhasil menambahkan nilai';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=jawaban&id_mapel=$mapel&id_tugas=$tugas&id_siswa=$siswa&msg=Gagal menambahkan nilai';
</script>";
}
