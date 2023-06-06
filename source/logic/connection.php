<?php
// ini_set('display_errors', 0);
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "library"; 

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    echo "Koneksi ke Database sedang ada masalah";
}
?>