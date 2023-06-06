<?php
include 'connection.php';

$isbn = $_GET['del'];

$delete_query = "delete from buku where isbn = '$isbn';";
$run_sql = mysqli_query($conn, $delete_query);

if($run_sql){
    header("location: ../book.php");
} else {
    echo "<script>alert('Terjadi Kesalahan'); window.history.back();</script>";
    exit();
    // header("location: book.php");
}