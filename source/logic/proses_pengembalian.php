<?php
include "connection.php";

if(!$conn){
    echo "Terjadi Kesalahan saat menghubungkan ke database";
}

$id = $_GET['id'];
$isbn = $_GET['isbn'];



$query = "DELETE FROM pinjaman WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if ($result) {
    $query = "UPDATE buku SET jumlah = jumlah + 1 WHERE isbn = '$isbn'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location: ../pinjaman.php");
    } else {
        echo "Terjadi kesalahan. Pengembalian buku gagal.";
    }
} else {
    echo "Terjadi kesalahan. Pengembalian buku gagal.";
}

mysqli_close($conn);
?>