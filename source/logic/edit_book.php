<?php
include 'connection.php';

if(isset($_GET['isbn'])){
  $isbn = $_GET['isbn'];

  $sql = "SELECT * FROM buku WHERE isbn='$isbn'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){
    $data = mysqli_fetch_assoc($result);
  }else{
    echo "Data tidak ditemukan.";
    exit();
  }
}else{
  echo "Anda memasuki page ini dengan cara yang salah.";
  exit();
}

if(isset($_POST['edit'])){
    $isbn = $_POST['isbn'];
    $nama = $_POST['name'];
	$penulis = $_POST['writter'];
    $year = $_POST['year'];
    $amount = $_POST['amount'];
    $penerbit = $_POST['publisher'];

    $sql = "UPDATE buku SET namebook='$nama', penulis='$penulis', year='$year', jumlah='$amount', penerbit='$penerbit' WHERE isbn='$isbn'";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('Location: ../book.php');
        exit();
    }else{
        echo "Data gagal diupdate.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Book Edit</title>
    <link rel="icon" href="../assets/Logo.png">
    <link rel="stylesheet" href="../css/edit.css">
</head>

<body>
    <h1>Book Edit</h1>
    <br>

    <form method="POST" class="form-buku">
        <h2><?php echo $data['isbn']; ?></h2>
        <input type="hidden" name="isbn" value="<?php echo $data['isbn']; ?>">
        <div class="input">
            <label for="nama">Name Book:</label>
            <input type="text" name="name" id="name" value="<?php echo $data['namebook']; ?>" required>
        </div>
        <div class="input">
            <label for="penulis">Writter:</label>
            <input type="text" name="writter" id="writter" value="<?php echo $data['penulis']; ?>" required>
        </div>
        <div class="input-master">
            <div class="input1">
                <label for="tahun" class="form-label">Year Release</label>
                <select name="year">
                    <option value="<?php echo $data['year']; ?>" selected><?php echo $data['year']; ?></option>
                    <?php
                      $tahun_sekarang = date("Y");
			                for($tahun = $tahun_sekarang; $tahun >= 1900; $tahun--) {
			    	            echo "<option value='$tahun'>$tahun</option>";
    			            }
  			            ?>
                </select>
            </div>
            <div class="input1">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" min="1" max="100" value="<?php echo $data['jumlah']; ?>"
                    required>
            </div>
        </div>
        <div class="input">
            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" id="publisher" value="<?php echo $data['penerbit']; ?>" required>
        </div>
        <div class="submit-btn">
            <input type="submit" name="edit" class="submit" value="Edit">
        </div>
    </form>
</body>

</html>