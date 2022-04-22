<?php
require '../database/db.php';

$siswa = mysqli_query($koneksi, "SELECT id_siswa  FROM siswa");
$guru  = mysqli_query($koneksi, "SELECT id_guru FROM guru");
$kelas = mysqli_query($koneksi, "SELECT id_kelas FROM kelas");
$mapel = mysqli_query($koneksi, "SELECT id_mapel FROM mata_pelajaran");
