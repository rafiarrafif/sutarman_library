<?php
include "logic/connection.php";

 $query = "SELECT * FROM sandi WHERE id = 1";
 $result = mysqli_query($conn, $query);

 $row = mysqli_fetch_assoc($result);

 $time_session = $row['time_session'];

  $session_duration = $time_session;
  session_set_cookie_params($session_duration);
  session_start();

  if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
  }
  $admin_db = $row['admin_db'];
  $pass = $row['pass'];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $admin_db && $password === $pass) {
      $_SESSION['user_id'] = 1;
      header("Location: home.php");
      exit();
    } else {
      echo '<script>';
      echo 'document.addEventListener("DOMContentLoaded", function() {';
      echo 'var modal = document.getElementById("popup");';
      echo 'modal.style.display = "block";';
      echo 'var closeModalBtn = document.getElementsByClassName("close1")[0];';
      echo 'closeModalBtn.addEventListener("click", function() {';
      echo 'modal.style.display = "none";';
      echo '});';
      echo 'window.addEventListener("click", function(event) {';
      echo 'if (event.target == modal) {';
      echo 'modal.style.display = "none";';
      echo '}';
      echo '});';
      echo '});';
      echo '</script>';
    }
  }
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>Harap Login Terlebih Dahulu</title>
    <link rel="icon" href="assets/Logo.png">
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/popup.css" />
</head>

<body>
    <button id="openModalBtn" class="Btn-Modal">Buka Modal</button>
    <div id='popup' class='popup'>
        <div class='popup-content'>
            <span class="close1">&times;</span>
            <h3>Ups.. 🤪</h3>
            <hr />
            <p id='text'>Sandi yang anda masukan salah</p>
            <button type='button' id='closeModalBtn' class='btn-close'>Tutup</button>
        </div>
    </div>
    <div class="center">
        <h1>Login</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="username" required />
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required />
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Login" class="submition" id="openModalBtn" />
    </div>
    </form>
    </div>
    <script src="js/popup.js"></script>
</body>

</html>

<?php
// include "connection.php";

// $query = "SELECT * FROM sandi";
// $result = mysqli_query($conn, $query);

// while ($row = mysqli_fetch_array($result)) {
//     $admin_db = $row['admin_db'];
//     $pass = $row['pass'];

//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//       $admin = $_POST["admin"];
//       $sandi = $_POST["sandi"];

//       if ($admin == $admin_db) {
//         if ($sandi == $pass) {
//           header("Location: home.html");
//           exit;
//         } else {
//           echo "<script>alert('Password Salah');</script>";
//         }
//       } else {
//         echo "<script>alert('Username Salah');</script>";
//       }
//     } else {

//     }
// }


?>