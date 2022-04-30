<?php
require '../../../../database/db.php';

$nama       = $_POST['nama'];
$nip        = $_POST['nip'];
$password   = md5($_POST['password']);
$jenkel     = $_POST['jeniskelamin'];
$alamat     = $_POST['alamat'];
$telp       = $_POST['telepon'];
$email      = $_POST['email'];


$query = mysqli_query($koneksi, "UPDATE guru SET nama='$nama', password='$password', jenis_kelamin='$jenkel', alamat='$alamat', telp='$telp', email='$email' WHERE nip='$nip'");


if ($query) {
    echo "<script>
    alert('Data Berhasil diEdit');
    window.location='../../../index.php?page=guru&msg=Berhasil mengupdate data guru';</script>";
} else {
    return false;
}
