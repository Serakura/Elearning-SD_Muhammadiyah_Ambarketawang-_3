<?php
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$tugas = $_POST['id_tugas'];
$essay = $_POST['id_essay'];
$soal = $_POST['soal'];


$query = mysqli_query($koneksi, "UPDATE essay SET soal='$soal' WHERE id_essay='$essay'");

if ($query) {
    echo "<script>
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas&msg=Berhasil mengupdate soal essay';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=essay&id_mapel=$mapel&id_tugas=$tugas&msg=Gagal mengupdate soal essay';
</script>";
}
