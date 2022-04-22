<?php
$fil_dir = '../../../../upload_files/';
require '../../../../database/db.php';
date_default_timezone_set('Asia/Jakarta');
$mapel = $_POST['id_mapel'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$materi = $_POST['isimateri'];
$namafile = $_FILES['filemateri']['name'];
$tmpfile = $_FILES['filemateri']['tmp_name'];
$error        = $_FILES['filemateri']['error'];
$date = date('Y-m-d h:i:s');

if ($namafile == null) {
    $query = mysqli_query($koneksi, "INSERT INTO materi 
    (judul_materi,deskripsi,isi_materi,tanggal_upload,id_mapel)
     VALUES 
     ('$judul','$deskripsi','$materi','$date','$mapel')");
    echo "<script>
alert('Materi berhasil terupload');
window.location='../../../index.php?page=mapel&id_mapel=$mapel';
</script>";
} else {
    $ekstensifile     = explode('.', $namafile);
    $ekstensifile    = strtolower(end($ekstensifile));
    if ($ekstensifile != 'pdf') {
        echo "<script>
                alert('yang anda upload bukan .pdf');
                window.location='../../../index.php?page=buatmateri&id_mapel=$mapel';
            </script>";
    } else {
        $namaFileBaru  = uniqid() . '_' . $namafile;
        $pidah_folder = move_uploaded_file($tmpfile, $fil_dir . $namaFileBaru);

        if ($pidah_folder) {
            $query = mysqli_query($koneksi, "INSERT INTO materi 
                                (judul_materi,deskripsi,isi_materi,nama_file,tanggal_upload,id_mapel)
                                 VALUES 
                                 ('$judul','$deskripsi','$materi','$namaFileBaru','$date','$mapel')");
            echo "<script>
            alert('Materi berhasil terupload');
            window.location='../../../index.php?page=mapel&id_mapel=$mapel';
        </script>";
        } else {
            echo "<script>
            alert('gagal membuat materi');
            window.location='../../../index.php?page=buatmateri&id_mapel=$mapel';
        </script>";
        }
    }
}
