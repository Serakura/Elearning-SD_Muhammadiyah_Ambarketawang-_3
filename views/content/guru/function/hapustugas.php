<?php
require '../../../../database/db.php';
$tugas = $_GET['id_tugas'];
$mapel = $_GET['id_mapel'];

$pilgan = mysqli_query($koneksi, "SELECT * FROM pilihan_ganda WHERE id_tugas=$tugas");
$essay = mysqli_query($koneksi, "SELECT * FROM essay WHERE id_tugas=$tugas");
$nilai = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_tugas=$tugas");
$jawaban = mysqli_query($koneksi, "SELECT * FROM jawaban_siswa WHERE id_tugas=$tugas");

if (mysqli_num_rows($pilgan) == 0 && mysqli_num_rows($essay) == 0 && mysqli_num_rows($nilai) == 0 && mysqli_num_rows($jawaban) == 0) {
    $delete = mysqli_query($koneksi, "DELETE FROM tugas WHERE id_tugas=$tugas");
    if ($delete) {
        echo "<script>
    alert('Tugas berhasil terhapus');
    window.location='../../../index.php?page=mapel&id_mapel=$mapel';
</script>";
    }
} else if (mysqli_num_rows($pilgan) > 0 && mysqli_num_rows($essay) > 0 && mysqli_num_rows($nilai) > 0 && mysqli_num_rows($jawaban) > 0) {
    $delete1 = mysqli_query($koneksi, "DELETE FROM pilihan_ganda WHERE id_tugas=$tugas");
    $delete2 = mysqli_query($koneksi, "DELETE FROM essay WHERE id_tugas=$tugas");
    $delete3 = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_tugas=$tugas");
    $delete4 = mysqli_query($koneksi, "DELETE FROM jawaban_siswa WHERE id_tugas=$tugas");
    if ($delete1 && $delete2 && $delete3 && $delete4) {
        $delete = mysqli_query($koneksi, "DELETE FROM tugas WHERE id_tugas=$tugas");
        if ($delete) {
            echo "<script>
            alert('Tugas berhasil terhapus');
            window.location='../../../index.php?page=mapel&id_mapel=$mapel';
        </script>";
        }
    }
} else if (mysqli_num_rows($pilgan) > 0) {
    $delete1 = mysqli_query($koneksi, "DELETE FROM pilihan_ganda WHERE id_tugas=$tugas");
    $delete2 = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_tugas=$tugas");
    $delete3 = mysqli_query($koneksi, "DELETE FROM jawaban_siswa WHERE id_tugas=$tugas");
    if ($delete1 && $delete2 && $delete3) {
        $delete = mysqli_query($koneksi, "DELETE FROM tugas WHERE id_tugas=$tugas");
        if ($delete) {
            echo "<script>
            alert('Tugas berhasil terhapus');
            window.location='../../../index.php?page=mapel&id_mapel=$mapel';
        </script>";
        }
    }
} else if (mysqli_num_rows($essay) > 0) {
    $delete1 = mysqli_query($koneksi, "DELETE FROM essay WHERE id_tugas=$tugas");
    $delete2 = mysqli_query($koneksi, "DELETE FROM nilai WHERE id_tugas=$tugas");
    $delete3 = mysqli_query($koneksi, "DELETE FROM jawaban_siswa WHERE id_tugas=$tugas");
    if ($delete1 && $delete2 && $delete3) {
        $delete = mysqli_query($koneksi, "DELETE FROM tugas WHERE id_tugas=$tugas");
        if ($delete) {
            echo "<script>
            alert('Tugas berhasil terhapus');
            window.location='../../../index.php?page=mapel&id_mapel=$mapel';
        </script>";
        }
    }
} else {
    echo "<script>
    alert('Tugas gagal terhapus');
    window.location='../../../index.php?page=mapel&id_mapel=$mapel';
</script>";
}
