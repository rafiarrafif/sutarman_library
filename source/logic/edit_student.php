<?php
include 'connection.php';

if(isset($_GET['nis'])){
  $nis = $_GET['nis'];

  $sql = "SELECT * FROM siswa WHERE nis='$nis'";
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
  $nis = $_POST['nis'];
  $nama = $_POST['namestudent'];
  $kelas = $_POST['class'];
  $jenis_kelamin = $_POST['jenis_kelamin'];

  $sql = "UPDATE siswa SET namestudent='$nama', class='$kelas', jenis_kelamin='$jenis_kelamin' WHERE nis='$nis'";
  $result = mysqli_query($conn, $sql);

  if($result){
    header('Location: ../student.php');
    exit();
  }else{
    echo "Ada Kesalahan Teknis.";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Student</title>
    <link rel="icon" href="../assets/Logo.png">
    <link rel="stylesheet" href="../css/edit.css">
</head>

<body>
    <h1>Edit Student</h1>
    <br>
    <form method="POST" class="form-buku">
        <h2><?php echo $data['nis']?></h2>
        <input type="hidden" name="nis" value="<?php echo $data['nis']; ?>">
        <div class="input">
            <label for="nama">Name:</label>
            <input type="text" id="nama" name="namestudent" value="<?php echo $data['namestudent']; ?>">
        </div>
        <div class="input1">
            <label for="kelas">Class:</label>
            <select name="class" class="select-form" id="class" placeholder="Silahkan Pilih Kelas" required>
                <option value="X MIPA 1" <?php if($data['class'] == 'X MIPA 1') echo ' selected'; ?>>X MIPA 1</option>
                <option value="X MIPA 2" <?php if($data['class'] == 'X MIPA 2') echo ' selected'; ?>>X MIPA 2</option>
                <option value="X MIPA 3" <?php if($data['class'] == 'X MIPA 3') echo ' selected'; ?>>X MIPA 3</option>
                <option value="X MIPA 4" <?php if($data['class'] == 'X MIPA 4') echo ' selected'; ?>>X MIPA 4</option>
                <option value="X MIPA 5" <?php if($data['class'] == 'X MIPA 5') echo ' selected'; ?>>X MIPA 5</option>
                <option value="X MIPA 6" <?php if($data['class'] == 'X MIPA 6') echo ' selected'; ?>>X MIPA 6</option>
                <option value="X MIPA 7" <?php if($data['class'] == 'X MIPA 7') echo ' selected'; ?>>X MIPA 7</option>
                <option value="X MIPA 8" <?php if($data['class'] == 'X MIPA 8') echo ' selected'; ?>>X MIPA 8</option>
                <option value="X MIPA 9" <?php if($data['class'] == 'X MIPA 9') echo ' selected'; ?>>X MIPA 9</option>
                <option value="X MIPA 10" <?php if($data['class'] == 'X MIPA 10') echo ' selected'; ?>>X MIPA 10
                </option>
                <option value="XI MIPA 1" <?php if($data['class'] == 'XI MIPA 1') echo ' selected'; ?>>XI MIPA 1
                </option>
                <option value="XI MIPA 2" <?php if($data['class'] == 'XI MIPA 2') echo ' selected'; ?>>XI MIPA 2
                </option>
                <option value="XI MIPA 3" <?php if($data['class'] == 'XI MIPA 3') echo ' selected'; ?>>XI MIPA 3
                </option>
                <option value="XI MIPA 4" <?php if($data['class'] == 'XI MIPA 4') echo ' selected'; ?>>XI MIPA 4
                </option>
                <option value="XI MIPA 5" <?php if($data['class'] == 'XI MIPA 5') echo ' selected'; ?>>XI MIPA 5
                </option>
                <option value="XI MIPA 6" <?php if($data['class'] == 'XI MIPA 6') echo ' selected'; ?>>XI MIPA 6
                </option>
                <option value="XI MIPA 7" <?php if($data['class'] == 'XI MIPA 7') echo ' selected'; ?>>XI MIPA 7
                </option>
                <option value="XI MIPA 8" <?php if($data['class'] == 'XI MIPA 8') echo ' selected'; ?>>XI MIPA 8
                </option>
                <option value="XI MIPA 9" <?php if($data['class'] == 'XI MIPA 9') echo ' selected'; ?>>XI MIPA 9
                </option>
                <option value="XI MIPA 10" <?php if($data['class'] == 'XI MIPA 10') echo ' selected'; ?>>XI MIPA 10
                </option>
                <option value="XII MIPA 1" <?php if($data['class'] == 'XII MIPA 1') echo ' selected'; ?>>XII MIPA 1
                </option>
                <option value="XII MIPA 2" <?php if($data['class'] == 'XII MIPA 2') echo ' selected'; ?>>XII MIPA 2
                </option>
                <option value="XII MIPA 3" <?php if($data['class'] == 'XII MIPA 3') echo ' selected'; ?>>XII MIPA 3
                </option>
                <option value="XII MIPA 4" <?php if($data['class'] == 'XII MIPA 4') echo ' selected'; ?>>XII MIPA 4
                </option>
                <option value="XII MIPA 5" <?php if($data['class'] == 'XII MIPA 5') echo ' selected'; ?>>XII MIPA 5
                </option>
                <option value="XII MIPA 6" <?php if($data['class'] == 'XII MIPA 6') echo ' selected'; ?>>XII MIPA 6
                </option>
                <option value="XII MIPA 7" <?php if($data['class'] == 'XII MIPA 7') echo ' selected'; ?>>XII MIPA 7
                </option>
                <option value="XII MIPA 8" <?php if($data['class'] == 'XII MIPA 8') echo ' selected'; ?>>XII MIPA 8
                </option>
                <option value="XII MIPA 9" <?php if($data['class'] == 'XII MIPA 9') echo ' selected'; ?>>XII MIPA 9
                </option>
                <option value="XII MIPA 10" <?php if($data['class'] == 'XII MIPA 10') echo ' selected'; ?>>XII MIPA 10
                </option>
            </select>
        </div>
        <div class="input1">
            <label for="kelas" class="form-label">Gender:</label>
            <select name="jenis_kelamin" class="form-select" id="jenis_kelamin">
                <option value="" disabled selected>Please Select Gender</option>
                <option value="Male" <?php if($data['jenis_kelamin'] == 'Male') echo ' selected'; ?>>Male
                </option>
                <option value="Female" <?php if($data['jenis_kelamin'] == 'Female') echo ' selected'; ?>>Female
                </option>
            </select>
        </div>

        <div class="submit-btn">
            <input type="submit" name="edit" class="submit" value="edit">
        </div>
    </form>
</body>

</html>