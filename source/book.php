<?php
include "logic/connection.php";

// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }
session_start();

$query = "SELECT * FROM sandi WHERE id = 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$time_session = $row['time_session'];
$session_duration = $time_session; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_duration) {
    session_unset();
    session_destroy();

    header("Location: login.php");
    exit();
}

$_SESSION['last_activity'] = time();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="framework/boxicons/boxicon.min.css" rel="stylesheet" />

    <link href="framework/bootstrap/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/buku.css">

    <link rel="icon" href="assets/Logo.png">
    <title>Book Data - Sutarman Library</title>

    <!-- <script src="js/validasi_tahun.js"></script> -->
</head>

<body>

    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="assets/Logo.png" alt="" />
                    </span>

                    <div class="text logo-text">
                        <span class="name">Sutarman</span>
                        <span class="profession">Library</span>
                    </div>
                </div>

                <i class="bx bx-chevron-right toggle"></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="home.php">
                                <i class="bx bx-home-alt icon"></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="pinjaman.php">
                                <i class="bx bx-food-menu icon"></i>
                                <span class="text nav-text">Loans</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="book.php">
                                <i class="bx bx-book icon"></i>
                                <span class="text nav-text">Book</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="student.php">
                                <i class="bx bx-user icon"></i>
                                <span class="text nav-text">Student</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="settings.php">
                            <i class='bx bx-cog icon'></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="logic/logout.php">
                            <i class="bx bx-log-out icon"></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>

        <section class="home">
            <button id="openModalBtn" class="Btn-Modal">Buka Modal</button>
            <div id='popup' class='popup'>
                <div class='popup-content'>
                    <span class="close1">&times;</span>
                    <h3>Ups.. 🤪</h3>
                    <hr />
                    <p id='text'>Buku tidak dapat dihapus. Masih Ada siswa yang meminjam buku ini</p>
                    <button type='button' id='closeModalBtn' class='btn-close'>Tutup</button>
                </div>
            </div>
            <?php
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
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
            ?>
            <div class="text">Daftar Buku Perpustakaan</div>
            <!-- <h1>Form Pinjaman Buku</h1> -->
            <div class="content-area">
                <div class="submittion">
                    <div class="name-it">
                        <img src="assets/add.png" alt="">
                        <p>Insert Book</p>
                    </div>
                    <form action="book.php" method="POST" class="form-buku">
                        <div class="input">
                            <label for="isbn">ISBN:</label>
                            <input type="text" name="isbn" id="isbn" maxlength="13" required>
                        </div>
                        <div class="input">
                            <label for="nama">Name Book:</label>
                            <input type="text" name="name" id="name" required>
                        </div>
                        <div class="input">
                            <label for="writter">Writter:</label>
                            <input type="text" name="writter" id="writter" required>
                        </div>
                        <div class="input-master">
                            <div class="input1">
                                <label for="year" class="form-label">Year Release</label>
                                <select name="year" id="year">
                                    <option value="77" selected>Select Year</option>
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
                                <input type="number" name="amount" id="amount" min="1" max="100" required>
                            </div>
                        </div>
                        <div class="input">
                            <label for="publisher">Publisher:</label>
                            <input type="text" name="publisher" id="publisher" required>
                        </div>
                        <div class="input">

                        </div>
                        <div class="submit-btn">
                            <input type="submit" name="submit" class="submit" value="Add Book">
                        </div>
                    </form>
                    <?php
						require_once("logic/connection.php");
	
						ini_set('display_errors', 0);

						if(isset($_POST['submit'])){
	
							$isbn = $_POST['isbn'];
							$nama = $_POST['name'];
							$penulis = $_POST['writter'];
							$tahun = $_POST['year'];
							$penerbit = $_POST['publisher'];
							$jumlah = $_POST['amount'];
	
							$query_check_isbn = "SELECT * FROM buku WHERE isbn='$isbn'";
							$result_check_isbn = mysqli_query($conn, $query_check_isbn);
	
                            if ($tahun == '77') {
                                echo "<script>alert('Please enter the year of release first'); window.history.back();</script>";
                              } else {
                                if(mysqli_num_rows($result_check_isbn) > 0) {
                                    echo "<script>alert('ISBN telah tersedia, silahkan gunakan yang lain.');</script>";
                                } else {
                                    $query_insert = "INSERT INTO buku (isbn, namebook, penulis, year, penerbit, jumlah) VALUES ('$isbn', '$nama', '$penulis', '$tahun', '$penerbit', '$jumlah')";
                                    $result_insert = mysqli_query($conn, $query_insert);
        
                                    if($result_insert) {
                                          header("Refresh:0");
                                    } else {
                                          echo "A technical error occurred. Your data may not be saved";
                                    }
                                  }
                              }
							
						}
	
						mysqli_close($conn);
                        
    				?>
                </div>
                <div class="view-buku">
                    <div class="name-it">
                        <img src="assets/Book_Exits.png" alt="">
                        <p>Registered Book List</p>
                    </div>
                    <div class="scroll-table">
                        <table class="content-table book-table">
                            <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Name Book</th>
                                    <th>Writter</th>
                                    <th>Year Release</th>
                                    <th>Publisher</th>
                                    <th>Amount</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
								include 'logic/connection.php';
								$query = "SELECT * FROM buku ORDER BY namebook ASC";
								$result = mysqli_query($conn, $query);
								while ($row = mysqli_fetch_array($result)) {
									// $id = $row['id'];
									$isbn = $row['isbn'];
									$nama = $row['namebook'];
									$penulis = $row['penulis'];
									$year = $row['year'];
									$penerbit = $row['penerbit'];
									$jumlah = $row['jumlah'];

									echo "<tr>";
									echo "<td>$isbn</td>";
									echo "<td>$nama</td>";
									echo "<td>$penulis</td>";
									echo "<td>$year</td>";
									echo "<td>$penerbit</td>";
									echo "<td>$jumlah</td>";
									echo "<td>
											<div class='operation'>
												<a href='logic/edit_book.php?isbn=$row[isbn]'><i class='bx bxs-edit bx-sm' style='color:#675afe'  ></i></a>
											</div>
										</td>";
									echo "<td>
											<div class='operation'>
												<a href='logic/delete_book.php?del=$row[isbn]'><i class='bx bxs-trash-alt bx-sm' style='color:#675afe'  ></i></a>
											</div>
										</td>";
									echo "<td><a href='logic/tambah_jumlah.php?isbn=$row[isbn]'>
                                                <i class='bx bxs-plus-circle bx-sm'></i>
                                              </a>
                                              <a href='logic/kurang_jumlah.php?isbn=$row[isbn]'>
                                                <i class='bx bxs-minus-circle bx-sm'></i>
                                              </a>
                                            </td>";
									echo "</tr>";
								}
        						?>
                            </tbody>
                            <?php
 								mysqli_close($conn);
							?>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <script src="framework/bootstrap/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="js/popup.js">
        </script>
        <script src="js/sidebar.js"></script>
    </body>

</html>