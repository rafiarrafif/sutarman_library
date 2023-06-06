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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="framework/boxicons/boxicon.min.css" rel="stylesheet" />
    <link href="framework/google_font/font_home.css" rel="stylesheet" />
    <link href="framework/bootstrap/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/table_home.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/home.css">

    <link rel="icon" href="assets/Logo.png">
    <title>Home Dashboard - Sutarman Library</title>
</head>

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
                        <a href="#">
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
        <div class="text">Main Dashboard</div>
        <main>
            <?php 
                include 'logic/connection.php';
                
                $query = "SELECT COUNT(*) AS jumlah_siswa FROM siswa";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $jumlahsiswa = $row["jumlah_siswa"];

                $query1 = "SELECT COUNT(*) AS jumlah_pinjaman FROM pinjaman";
                $result1 = mysqli_query($conn, $query1);
                $row1 = mysqli_fetch_assoc($result1);
                $jumlahpinjaman = $row1["jumlah_pinjaman"];

                $query2 = "SELECT SUM(jumlah) AS buku_tersedia FROM buku";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                $bukutersedia = $row2["buku_tersedia"];
            ?>
            <div class="row ms-1 mx-xl-5">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                            Available Books
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php 
                                            echo "$bukutersedia ";
                                            echo "Book";
                                            ?>
                                            <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end d-flex justify-content-end">
                                    <div class="background-gradient">
                                        <img src="assets/tersedia.png" alt="" class="icon_dashboard">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                            Borrowed book
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php
                                            echo "$jumlahpinjaman ";
                                            echo "Book";
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end d-flex justify-content-end">
                                    <a href="#pinjaman">
                                        <div class="background-gradient">
                                            <img src="assets/dipinjam.png" alt="" class="icon_dashboard">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                            Total of Entire Book</ </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php
                                            $allbook = $jumlahpinjaman + $bukutersedia;
                                            echo "$allbook ";
                                            echo "Book";
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end d-flex justify-content-end">
                                    <a href="#daftar-buku">
                                        <div class="background-gradient">
                                            <img src="assets/Total_book.png" alt="" class="icon_dashboard">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                            Total of Entire Student
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            <?php
                                            echo "$jumlahsiswa ";
                                            echo "Student";
                                            ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end d-flex justify-content-end">
                                    <a href="#view-siswa">
                                        <div class="background-gradient">
                                            <img src="assets/Student_profile.png" alt="" class="icon_dashboard">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br>
            </div>
            <div class="view-buku" id="daftar-buku">
                <div class="name-it">
                    <img src="assets/Book_Exits.png" alt="">
                    <p>Registered Book List</p>
                </div>
                <div class="scroll-table">
                    <table class="content-table book-table">
                        <thead>
                            <tr>
                                <th>ISBN</th>
                                <th>Book Name</th>
                                <th>Writter</th>
                                <th>Year Release</th>
                                <th>Publisher</th>
                                <th>Amount</th>
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
            <div class="view-pinjaman col-6" id="pinjaman">
                <div class="name-it">
                    <img src="assets/Book_borrowed.png" alt="">
                    <p>List of Student Loans</p>
                </div>
                <div class="scroll-table">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Student NIS</th>
                                <th>Student Name</th>
                                <th>Book ISBN</th>
                                <th>Book Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include'logic/connection.php';

                                $query2 = "UPDATE pinjaman
                                INNER JOIN siswa ON pinjaman.nis = siswa.nis
                                INNER JOIN buku ON pinjaman.isbn = buku.isbn
                                SET pinjaman.namestudent = siswa.namestudent, pinjaman.namebook = buku.namebook";
                                mysqli_query($conn, $query2);

                                $query = "SELECT pinjaman.*, siswa.nis, buku.isbn FROM pinjaman 
                                          INNER JOIN siswa ON pinjaman.nis = siswa.nis
                                          INNER JOIN buku ON pinjaman.isbn = buku.isbn
                                          ORDER BY siswa.namestudent ASC";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr>";
                                  echo "<td>" . $row['nis'] . "</td>";
                                  echo "<td>" . $row['namestudent'] . "</td>";
                                  echo "<td>" . $row['isbn'] . "</td>";
                                  echo "<td>" . $row['namebook'] . "</td>";
                                  echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- class="active-row" -->
            </div>
            <div class="view-siswa" id="view-siswa">
                <div class="name-it">
                    <img src="assets/profile.png" alt="">
                    <p>Daftar Siswa </p>
                </div>
                <table class="content-table book-table">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Name Student</th>
                            <th>Class</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						include 'logic/connection.php';
						$query = "SELECT * FROM siswa";
						$result = mysqli_query($conn, $query);
						while ($row = mysqli_fetch_array($result)) {
							// $id = $row['id'];
							$nis = $row['nis'];
							$nama = $row['namestudent'];
							$kelas = $row['class'];
							$jenis_kelamin = $row['jenis_kelamin'];
							echo "<tr>";
							echo "<td>$nis</td>";
							echo "<td>$nama</td>";
							echo "<td>$kelas</td>";
							echo "<td>$jenis_kelamin</td>";
							echo "</tr>";
						}
        				?>
                    </tbody>
                </table>
            </div>
        </main>

    </section>
    <script src="framework/bootstrap/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script src="framework/fontawesome/fontawesome.js" crossorigin="anonymous"></script>
    <script src="js/sidebar.js"></script>
</body>

</html>