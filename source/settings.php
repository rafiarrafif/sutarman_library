<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="icon" href="assets/Logo.png">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="framework/boxicons/boxicon.min.css">
    <link rel="stylesheet" href="css/settings.css">
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
                            <span class="text nav-text">Pinjaman</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="book.php">
                            <i class="bx bx-book icon"></i>
                            <span class="text nav-text">Buku</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="student.php">
                            <i class="bx bx-user icon"></i>
                            <span class="text nav-text">Siswa</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <!-- <hr style="border-color: #f3f3f3;"> -->
                <li class="">
                    <a href="#">
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
        <div class="text">Control Panel Settings</div>
        <div class="content-area">
            <?php
            include 'logic/connection.php';

            if(isset($_POST['submit'])){
                $waktu_sesi = $_POST['time_session'];
                $sesi_waktu = $waktu_sesi*60;

                $sql = "UPDATE sandi SET time_session = '$sesi_waktu' WHERE id=1";
                $result = mysqli_query($conn, $sql);

                if($result){
                    header('Refresh:0');
                    exit();
                }else{
                    echo "Terjadi Kesalahan.";
                }
            }
            ?>

            <form method="POST" class="form">
                <div class="main-content">
                    <div class="session">
                        <div class="name-title">
                            <p>How much time do user give to login (Session)?</p>
                        </div>
                        <div class="input">
                            <input type="number" name="time_session" min="1" max="320">
                            <p>minute</p>
                        </div>
                    </div>
                    <div class="change-password">
                        <div class="name-title">
                            <p>Change Password Login</p>
                        </div>
                        <div class="input">
                            <a href="logic/change_password.php?id=1" onclick="navigateTo(event)">
                                <button class="change-btn">Change</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="submit-form">
                    <button name="submit" id="submit" class="submit-btn">Save Changes</button>
                </div>
            </form>
        </div>

    </section>

    <script src="js/sidebar.js"></script>
    <script>
    function navigateTo(event) {
        event.preventDefault();
        var url = event.currentTarget.getAttribute('href');
        window.location.href = url;
    }
    </script>
</body>

</html>