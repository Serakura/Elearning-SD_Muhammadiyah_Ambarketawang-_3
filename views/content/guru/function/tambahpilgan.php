<?php
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$tugas = $_POST['id_tugas'];
$soal = $_POST['soal'];
$jawaban_a = $_POST['jawaban_a'];
$jawaban_b = $_POST['jawaban_b'];
$jawaban_c = $_POST['jawaban_c'];
$jawaban_d = $_POST['jawaban_d'];
$kunci = $_POST['kuncijawaban'];

$query = mysqli_query($koneksi, "INSERT INTO pilihan_ganda 
						(soal,jawaban_a,jawaban_b,jawaban_c,jawaban_d,kunci_jawaban,id_tugas)
 						VALUES 
 						('$soal','$jawaban_a','$jawaban_b','$jawaban_c','$jawaban_d','$kunci','$tugas')");

if ($query) {
    echo "<script>
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas&msg=Berhasil membuat soal pilihan ganda';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=pilgan&id_mapel=$mapel&id_tugas=$tugas&msg=Gagal membuat soal pilihan ganda';
</script>";
}
