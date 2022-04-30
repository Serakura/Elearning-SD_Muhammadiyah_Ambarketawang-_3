<?php
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$tugas = $_POST['id_tugas'];
$pilgan = $_POST['id_pilgan'];
$soal = $_POST['soal'];
$jawaban_a = $_POST['jawaban_a'];
$jawaban_b = $_POST['jawaban_b'];
$jawaban_c = $_POST['jawaban_c'];
$jawaban_d = $_POST['jawaban_d'];
$kunci = $_POST['kuncijawaban'];

$query = mysqli_query($koneksi, "UPDATE pilihan_ganda SET soal='$soal', jawaban_a='$jawaban_a', jawaban_b='$jawaban_b', jawaban_c='$jawaban_c', jawaban_d='$jawaban_d', kunci_jawaban='$kunci' WHERE id_pilgan='$pilgan'");

if ($query) {
    echo "<script>
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas&msg=Berhasil mengupdate soal pilihan ganda';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=pilgan&id_mapel=$mapel&id_tugas=$tugas&msg=Gagal mengupdate soal pilihan ganda';
</script>";
}
