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
    <link rel="stylesheet" href="css/pinjaman.css">
    <link rel="stylesheet" href="css/sidebar.css" />

    <link rel="icon" href="assets/Logo.png">
    <title>Pinjaman - Sutarman Library</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    </script>
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
                        <a href="#">
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

                <!-- <li class="mode">
            <div class="sun-moon">
              <i class="bx bx-moon icon moon"></i>
              <i class="bx bx-sun icon sun"></i>
            </div>
            <span class="mode-text text">Dark mode</span>

            <div class="toggle-switch">
              <span class="switch"></span>
            </div>
          </li> -->
            </div>
        </div>
    </nav>

    <section class="home">
        <div class="text">Library Book Loans</div>
        <!-- <h1>Form Pinjaman Buku</h1> -->
        <div class="content-area container">
            <div class="submittion col-6">
                <div class="name-it">
                    <img src="assets/add.png" alt="">
                    <p>Add Loans</p>
                </div>
                <form action="logic/proses_peminjaman.php" method="POST" class="form-pinjaman">
                    <div class="nis-input">
                        <label for="nis">Student NIS:</label>
                        <select name="nis" id="nis">
                            <?php
                                $query = "SELECT nis FROM siswa";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='$row[nis]'> $row[nis] </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="isbn-input">
                        <label for="isbn">Book ISBN:</label>
                        <select name="isbn" id="isbn">
                            <?php
                                $query = "SELECT isbn FROM buku";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='$row[isbn]'> $row[isbn] </option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="submit-btn">
                        <input type="submit" value="Borrow" class="submit">
                    </div>
                </form>
            </div>

            <div class="view-data col-6">
                <div class="name-it">
                    <img src="assets/profile.png" alt="">
                    <p>List Student Loans</p>
                </div>
                <div class="scroll-table">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Student NIS</th>
                                <th>Student Name</th>
                                <th>Book ISBN</th>
                                <th>Book Name</th>
                                <th>Return</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query2 = "UPDATE pinjaman
                                INNER JOIN siswa ON pinjaman.nis = siswa.nis
                                INNER JOIN buku ON pinjaman.isbn = buku.isbn
                                SET pinjaman.namestudent = siswa.namestudent, pinjaman.namebook = buku.namebook";
                                mysqli_query($conn, $query2);

                                $query = "SELECT * FROM pinjaman ORDER BY id DESC";
                                $result = mysqli_query($conn, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr>";
                                  echo "<td>" . $row['nis'] . "</td>";
                                  echo "<td>" . $row['namestudent'] . "</td>";
                                  echo "<td>" . $row['isbn'] . "</td>";
                                  echo "<td>" . $row['namebook'] . "</td>";
                                  echo "<td>
                                          <div class='kembalikan'>
                                            <a href='logic/proses_pengembalian.php?id=$row[id]&isbn=$row[isbn]'>Return</a>
                                          </div>
                                        </td>";
                                  echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- class="active-row" -->
            </div>
        </div>
    </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="js/sidebar.js"></script>
    <!-- <script src="js/parralax_scrolling.js"></script> -->

</body>

</html>