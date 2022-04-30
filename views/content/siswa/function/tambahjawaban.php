<?php
error_reporting(E_ERROR);
require '../../../../database/db.php';

$mapel = $_POST['id_mapel'];
$tugas = $_POST['id_tugas'];
$siswa = $_POST['id_siswa'];
$pilihan = $_POST['pilihan'];
$essay = $_POST['essay'];
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');

$query = mysqli_query($koneksi, "SELECT tgl_mulai,tgl_selesai FROM tugas WHERE id_tugas = $tugas");
while ($d = mysqli_fetch_row($query)) {
    $tgl_mulai = $d[0];
    $tgl_selesai = $d[1];
}

if ($tgl_mulai < $date && $tgl_selesai > $date) {
    $query = mysqli_query($koneksi, "SELECT * FROM pilihan_ganda WHERE id_tugas = $tugas");
    $query1 = mysqli_query($koneksi, "SELECT * FROM essay WHERE id_tugas = $tugas");
    while ($d = mysqli_fetch_array($query)) {
        $id = $d['id_pilgan'];
        $jawaban = $pilihan[$d['id_pilgan']];
        if (empty($jawaban)) {
            $pilgan = mysqli_query($koneksi, "INSERT INTO jawaban_siswa 
            (tipe,jawaban,id_soal,id_tugas,id_siswa)
             VALUES 
             ('pilgan','','$id','$tugas','$siswa')");
        } else {
            $pilgan = mysqli_query($koneksi, "INSERT INTO jawaban_siswa 
            (tipe,jawaban,id_soal,id_tugas,id_siswa)
             VALUES 
             ('pilgan','$jawaban','$id','$tugas','$siswa')");
        }
    }
    while ($d = mysqli_fetch_array($query1)) {
        $id = $d['id_essay'];
        $jawaban = $essay[$d['id_essay']];
        if (empty($jawaban)) {
            $essay = mysqli_query($koneksi, "INSERT INTO jawaban_siswa 
            (tipe,jawaban,id_soal,id_tugas,id_siswa)
             VALUES 
             ('essay','','$id','$tugas','$siswa')");
        } else {
            $essay = mysqli_query($koneksi, "INSERT INTO jawaban_siswa 
            (tipe,jawaban,id_soal,id_tugas,id_siswa)
             VALUES 
             ('essay','$jawaban','$id','$tugas','$siswa')");
        }
    }
    $nilai = mysqli_query($koneksi, "INSERT INTO nilai 
    (total_nilai,id_tugas,id_siswa)
     VALUES 
     ('','$tugas','$siswa')");
    echo "<script>
    window.location='../../../index.php?page=mapel&id_mapel=$mapel&msg=Berhasil mengerjakan tugas';
</script>";
} else {
    echo "<script>
    window.location='../../../index.php?page=mapel&id_mapel=$mapel&msg=Gagal mengerjakan tugas';
</script>";
}
