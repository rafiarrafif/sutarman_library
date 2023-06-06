<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change User Password</title>
    <link rel="icon" href="../assets/Logo.png">
    <link href="../framework/bootstrap/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/change.css">
</head>

<?php
include "connection.php";
error_reporting(E_ALL);

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql_check = "SELECT * FROM sandi WHERE id=$id";
    $result_check = mysqli_query($conn, $sql_check);
    $data = mysqli_fetch_assoc($result_check);

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $old_pass = $_POST['old_password'];
        $new_pass = $_POST['new_password'];
    
        if($old_pass === $data['pass']){
            $sql = "UPDATE sandi SET admin_db='$username', pass='$new_pass' WHERE id=$id";
            $query = mysqli_query($conn, $sql);
            if($query){
                header('Location: logout.php');
            } else {
                echo "Ada Kesalahan Teknis";
            }
        } else {
            echo "<script>alert('Password lama yang anda masukan salah');</script>";
        }
    }
    
}else{
    echo "Anda memasuki page ini dengan cara yang salah.";
    exit();
}


?>

<body>
    <?php echo $data['pass']; ?><br>
    <div class="container pt-5 px-4">
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    placeholder="Please Enter Your New Username" aria-describedby="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="old_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password"
                    placeholder="Please Enter Your Old Password">
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password"
                    placeholder="Please Enter Your New Password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>



    <script src="../framework/bootstrap/bootstrap.min.js" crossorigin="anonymous"></script>
</body>

</html>