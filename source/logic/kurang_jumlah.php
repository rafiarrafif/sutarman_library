<html lang="en">

<head>
    <title>Mengurangi. Harap Tunggu</title>
</head>

<body>
    <?php
    include "connection.php";

    if(!$conn){
        echo "Terjadi Kesalahan saat menghubungkan ke Server";
    }
    
    $isbn = $_GET["isbn"];
    
    $sql = "SELECT jumlah FROM buku WHERE isbn='$isbn'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($row["jumlah"] <= 0) {
        echo "<script>alert('Stock sudah habis'); window.history.back();</script>";
    } else {
        $sql = "UPDATE buku SET jumlah=jumlah-1 WHERE isbn='$isbn '";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: ../book.php');
            echo "Jumlah buku berhasil dikurangi.";
        } else {
            echo "<script>alert('Terjadi Kesalahan'); window.history.back();</script>";
        }
    }
    
    mysqli_close($conn);
    
    ?>
</body>

</html>