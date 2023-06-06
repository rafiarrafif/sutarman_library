<?php
    // ini_set('display_errors', 0);
    include "connection.php";

    if (!$conn) {
        echo "Koneksi ke server sedang ada masalah.";
    }

    $isbn = $_GET["isbn"];

    $sql = "UPDATE buku SET jumlah=jumlah+1 WHERE isbn='" . $isbn . "'";

    $sql_jumlah = "SELECT jumlah FROM buku WHERE isbn='" . $isbn . "'";
    $query_jumlah = mysqli_query($conn, $sql_jumlah);
    $result_jumlah = mysqli_fetch_assoc($query_jumlah);
    $jumlah = $result_jumlah['jumlah'];

    if ($jumlah < 100){
        if (mysqli_query($conn, $sql)) {
            header('Location: ../book.php');
            echo "Jumlah buku berhasil ditambah.";
        } else {
            echo "Terjadi kesalahan";
        }
    } else {
        echo "<script>alert('Maximal stock hanya 100 saja'); window.history.back();</script>";
    }

mysqli_close($conn);
?>