<?php
require '../../../../database/db.php';

$nama       = $_POST['nama'];
$nis        = $_POST['nis'];
$password   = md5($_POST['password']);
$jenkel     = $_POST['jeniskelamin'];
$alamat     = $_POST['alamat'];
$telp       = $_POST['telepon'];
$email      = $_POST['email'];
$kelas      = $_POST['kelas'];


$query = mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', password='$password', jenis_kelamin='$jenkel', alamat='$alamat', telp='$telp', email='$email', id_kelas='$kelas' WHERE nis='$nis'");


if ($query) {
    echo "<script>
    alert('Data Berhasil diEdit');
    window.location='../../../index.php?page=siswa&msg=Berhasil mengupdate data siswa';</script>";
} else {
    return false;
}
