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

    <script src="framework/jQuery/jQuery.min.js"></script>
    <script src="framework/bootstrap/bootstrap.min.js" crossorigin="anonymous"></script>

    <link href="framework/bootstrap/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/siswa.css">
    <link href="framework/boxicons/boxicon.min.css" rel="stylesheet" />

    <link rel="icon" href="assets/Logo.png">
    <title>Student Data - Sutarman Library</title>
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
                        <a href="#">
                            <i class="bx bx-user icon"></i>
                            <span class="text nav-text">Student</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <!-- <hr style="border-color: #f3f3f3;"> -->
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
    <?php
		require_once("logic/connection.php");
	
		if(isset($_POST['submit'])){
	
		  $nis = $_POST['nis'];
		  $nama = $_POST['nama'];
		  $kelas = $_POST['class'];
		  $jenis_kelamin = $_POST['jenis_kelamin'];
	
		  $query_check_nis = "SELECT * FROM siswa WHERE nis='$nis'";
		  $result_check_nis = mysqli_query($conn, $query_check_nis);
	
		  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$jenis_kelamin = $_POST['jenis_kelamin'];

		
			if ($jenis_kelamin == 'Pilih Jenis Kelamin') {
			  $error_message = "Mohon pilih jenis kelamin Anda";
			} else {
				if(mysqli_num_rows($result_check_nis) > 0) {
					echo "<script>alert('NIS telah tersedia, silahkan gunakan yang lain.');</script>";
				} else {
					$query_insert = "INSERT INTO siswa (nis, namestudent, class, jenis_kelamin) VALUES ('$nis', '$nama', '$kelas', '$jenis_kelamin')";
					$result_insert = mysqli_query($conn, $query_insert);
				
					if($result_insert) {
					  header("Refresh:0");
					} else {
					  echo "Error: " . $query_insert . "<br>" . mysqli_error($conn);
					}
				}
			}
		  }
	  
		}
	
		mysqli_close($conn);

    	?>
    <section class="home">
        <div class="text">List of Library Member</div>
        <div class="content-area">
            <div class="submittion">
                <div class="name-it">
                    <img src="assets/add.png" alt="">
                    <p>Add Student</p>
                </div>

                <form action="student.php" method="POST" class="form-siswa">
                    <div class="input">
                        <label for="isbn">NIS:</label>
                        <input type="text" name="nis" id="nis" required>
                    </div>
                    <div class="input">
                        <label for="nama">Name Student:</label>
                        <input type="text" name="nama" id="nama" required>
                    </div>
                    <div class="input1">
                        <label for="penulis">Gender:</label>
                        <select name="jenis_kelamin" class="select-form" id="jenis_kelamin" required>
                            <option selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="input1">
                        <label for="class">Class:</label>
                        <select name="class" class="select-form" id="kelas" placeholder="Silahkan Pilih Kelas" required>
                            <option value="X MIPA 1">X MIPA 1</option>
                            <option value="X MIPA 2">X MIPA 2</option>
                            <option value="X MIPA 3">X MIPA 3</option>
                            <option value="X MIPA 4">X MIPA 4</option>
                            <option value="X MIPA 5">X MIPA 5</option>
                            <option value="X MIPA 6">X MIPA 6</option>
                            <option value="X MIPA 7">X MIPA 7</option>
                            <option value="X MIPA 8">X MIPA 8</option>
                            <option value="X MIPA 9">X MIPA 9</option>
                            <option value="X MIPA 10">X MIPA 10</option>
                            <option value="XI MIPA 1">XI MIPA 1</option>
                            <option value="XI MIPA 2">XI MIPA 2</option>
                            <option value="XI MIPA 3">XI MIPA 3</option>
                            <option value="XI MIPA 4">XI MIPA 4</option>
                            <option value="XI MIPA 5">XI MIPA 5</option>
                            <option value="XI MIPA 6">XI MIPA 6</option>
                            <option value="XI MIPA 7">XI MIPA 7</option>
                            <option value="XI MIPA 8">XI MIPA 8</option>
                            <option value="XI MIPA 9">XI MIPA 9</option>
                            <option value="XI MIPA 10">XI MIPA 10</option>
                            <option value="XII MIPA 1">XII MIPA 1</option>
                            <option value="XII MIPA 2">XII MIPA 2</option>
                            <option value="XII MIPA 3">XII MIPA 3</option>
                            <option value="XII MIPA 4">XII MIPA 4</option>
                            <option value="XII MIPA 5">XII MIPA 5</option>
                            <option value="XII MIPA 6">XII MIPA 6</option>
                            <option value="XII MIPA 7">XII MIPA 7</option>
                            <option value="XII MIPA 8">XII MIPA 8</option>
                            <option value="XII MIPA 9">XII MIPA 9</option>
                            <option value="XII MIPA 10">XII MIPA 10</option>
                        </select>
                    </div>
                    <div class="submit-btn">
                        <input type="submit" name="submit" class="submit" value="Add Student">
                    </div>
                    <?php if (isset($error_message)) {
						echo $error_message;
		 			} ?>
                </form>
            </div>
            <div class="view-data">
                <div class="name-it">
                    <img src="assets/profile.png" alt="">
                    <p>Daftar Siswa </p>
                </div>
                <div class="scroll-table">
                    <table class="content-table book-table">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Name Student</th>
                                <th>Class</th>
                                <th>Gender</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
						include 'logic/connection.php';
						$query = "SELECT * FROM siswa GROUP BY namestudent ASC";
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
							echo "<td><a href='logic/edit_student.php?nis=$row[nis]'><i class='bx bxs-edit bx-sm' style='color:#675afe'></i></a></td>";
							echo "<td><a href='logic/delete.php?del=$row[nis]'><i class='bx bxs-trash-alt bx-sm' style='color:#675afe'></i></a></td>";
							echo "</tr>";
						}
        				?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                var jenis_kelamin = $('#jenis_kelamin').val();
                if (jenis_kelamin == 'Select Gender') {
                    event.preventDefault();
                    alert('Pilih jenis kelamin terlebih dahulu');
                }
            });
        });
        </script>
    </section>
    <script src="js/sidebar.js"></script>
</body>

</html>