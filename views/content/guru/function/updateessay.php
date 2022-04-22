<?php
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$tugas = $_POST['id_tugas'];
$essay = $_POST['id_essay'];
$soal = $_POST['soal'];


$query = mysqli_query($koneksi, "UPDATE essay SET soal='$soal' WHERE id_essay='$essay'");

if ($query) {
    echo "<script>
    alert('Soal berhasil terupdate');
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas';
</script>";
} else {
    echo "<script>
    alert('Soal gagal terupdate');
    window.location='../../../index.php?page=essay&id_mapel=$mapel&id_tugas=$tugas';
</script>";
}
