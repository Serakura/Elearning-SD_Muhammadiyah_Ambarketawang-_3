<?php
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$siswa = $_POST['id_siswa'];
$tugas = $_POST['id_tugas'];
$nilai = $_POST['nilai'];

$query = mysqli_query($koneksi, "UPDATE nilai SET total_nilai='$nilai' WHERE id_siswa='$siswa' AND id_tugas='$tugas'");
if ($query) {
    echo "<script>
    alert('Berhasil memberikan nilai');
    window.location='../../../index.php?page=pekerjaansiswa&id_mapel=$mapel&id_tugas=$tugas';
</script>";
} else {
    echo "<script>
    alert('Gagal memberikan nilai');
    window.location='../../../index.php?page=jawaban&id_mapel=$mapel&id_tugas=$tugas&id_siswa=$siswa';
</script>";
}
