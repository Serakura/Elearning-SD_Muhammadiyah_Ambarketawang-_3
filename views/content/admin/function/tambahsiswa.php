<?php
require '../../../../database/db.php';

$nama       = $_POST['nama'];
$nis        = $_POST['nis'];
$password   = $_POST['password'];
$jenkel     = $_POST['jeniskelamin'];
$alamat     = $_POST['alamat'];
$telp       = $_POST['telepon'];
$email      = $_POST['email'];
$kelas      = $_POST['kelas'];



$cek_nis = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");

if (mysqli_num_rows($cek_nis) > 0) {
?>
    <script>
        alert('Nomor NIS Sudah digunakan!! || Silahkan Input Ulang!');
        window.location = '../../../index.php?page=siswa';
    </script>


<?php
} else {

    $query = mysqli_query($koneksi, "INSERT INTO siswa 
						(nama,nis,password,jenis_kelamin,alamat,telp,email,id_kelas)
 						VALUES 
 						('$nama','$nis','$password','$jenkel','$alamat','$telp','$email','$kelas')");


    echo "
    <script>
    alert('Data Berhasil diTambahkan');
 		window.location='../../../index.php?page=siswa';
 	</script>
     ";
}

?>