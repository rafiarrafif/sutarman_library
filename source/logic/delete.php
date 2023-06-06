<?php
include 'connection.php';

if(!$conn){
    echo "Terjadi Kesalahan saat menghubungkan ke Server";
}

$nis = $_GET['del'];

$delete_query = "delete from siswa where nis = $nis";
$run_sql = mysqli_query($conn, $delete_query);

if($run_sql){
    header("location: ../student.php");
} else {
    echo "<script>alert('tidak dapat dihapus karena siswa masih meminjam buku'); window.history.back();</script>";
}

// delete from siswa where nis = 1234560