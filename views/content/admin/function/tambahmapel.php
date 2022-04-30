<?php
require '../../../../database/db.php';

$kode       = $_POST['kode'];
$nama        = $_POST['nama'];
$kelas      = $_POST['kelas'];
$guru      = $_POST['guru'];


$cek_mapel = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE kd_mapel='$kode'");

if (mysqli_num_rows($cek_mapel) > 0) {
?>
    <script>
        window.location = '../../../index.php?page=mapel&msg=Gagal menambahkan data mata pelajaran karena Kode Mata Pelajaran sudah digunakan';
    </script>


<?php
} else {

    $query = mysqli_query($koneksi, "INSERT INTO mata_pelajaran 
						(kd_mapel,nama_mapel,id_kelas,id_guru)
 						VALUES 
 						('$kode','$nama','$kelas','$guru')");


    echo "
    <script>
 		window.location='../../../index.php?page=mapel&msg=Berhasil menambahkan data mata pelajaran';
 	</script>
     ";
}

?>