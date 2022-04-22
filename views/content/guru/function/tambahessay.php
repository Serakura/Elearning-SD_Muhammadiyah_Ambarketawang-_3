<?php
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$tugas = $_POST['id_tugas'];
$soal = $_POST['soal'];

$query = mysqli_query($koneksi, "INSERT INTO essay 
						(soal,id_tugas)
 						VALUES 
 						('$soal','$tugas')");

if ($query) {
    echo "<script>
    alert('Soal berhasil terupload');
    window.location='../../../index.php?page=buatsoal&id_mapel=$mapel&id_tugas=$tugas';
</script>";
} else {
    echo "<script>
    alert('Soal gagal terupload');
    window.location='../../../index.php?page=pilgan&id_mapel=$mapel&id_tugas=$tugas';
</script>";
}
