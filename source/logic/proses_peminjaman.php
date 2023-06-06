<?php
include "connection.php";

if(!$conn){
    echo "Terjadi Kesalahan saat menghubungkan ke database";
}

$query_buku = "SELECT jumlah FROM buku  WHERE isbn = '$isbn'";


$nis = $_POST['nis'];
$isbn = $_POST['isbn'];

$query = "INSERT INTO pinjaman (nis, isbn) VALUES ('$nis', '$isbn')";
$result = mysqli_query($conn, $query);

$query_buku = "SELECT jumlah FROM buku WHERE isbn = '$isbn'";
$result_buku = mysqli_query($conn, $query_buku);
while ($row = mysqli_fetch_array($result_buku)) {
    $jumlah = $row['jumlah']; 
}

if ($jumlah >= 1){
    if ($result) {
        $query = "UPDATE buku SET jumlah = jumlah - 1 WHERE isbn = '$isbn'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header("Location: ../pinjaman.php");
        } else {
            echo "Terjadi kesalahan. Pinjaman gagal ditambahkan. 1";
        }
    } else {
        echo "Terjadi kesalahan. Pinjaman gagal ditambahkan. 2";
    }
}else {
    echo "<script>alert('Udah Habis'); window.history.back();</script>";
}



mysqli_close($conn);
?>