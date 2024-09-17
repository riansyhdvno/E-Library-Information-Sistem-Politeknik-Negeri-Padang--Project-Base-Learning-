<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library PNP</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.min.5.2.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>

</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparant">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand" href="home.php" aria-current="page" style="display: flex; align-items: center;">
                <img src="image/pnplogo.png" alt="Perpustakaan Logo" width="50" style="margin-right: 10px;">
                <span>Perpustakaan Politeknik Negeri Padang</span>
            </a>
            <!--toggle btn-->
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--sidebar-->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                <!--sidebar header-->
                <div class="offcanvas-header text-white border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <!--sidebar body-->
                <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0">
                    <ul class="navbar-nav justify-content-center align-items-center  fs-5 flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="isikunjungan.php">Isi Buku Tamu</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#bukuterpopuler">Buku Terpopuler</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#kontak">Kontak</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="informasi.php">Informasi</a>
                        </li>

                    </ul>
                    <!--Login/Sign up-->

                    <?php
                    require 'koneksicom.php';
                    if (isset($_POST['submit'])) {
                        $nama = $_POST['nama'];
                        $password = ($_POST['password']);

                        //query ke databse
                        $sql = "SELECT * FROM user WHERE nama='$nama' AND password='$password'";

                        $result = $db->query($sql);
                        $data = $result->fetch_assoc();
                        // $data=mysqli_fetch_assoc($result);

                        if ($result->num_rows > 0) {
                            $_SESSION['nama'] = $nama;
                            $_SESSION['login'] = TRUE;
                            $_SESSION['level'] = $data['level'];
                            header("Location: dashboard.php");
                        } else {
                            echo '<div id="loginAlert" class="alert alert-danger alert-dismissible show" role="alert" style="position: fixed; bottom: 5px; right: 20px;">
                    Login Gagal. Silakan coba lagi.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                        }
                    }

                    ?>
                    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="text-white text-decoration-none px-3 py-1 rounded-4" style="background-color: #FF8F01;" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>

                                        <!-- Pills content -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                                <form action="home.php" method="post">

                                                    <p class="text-center fs-4">Masuk ke Akun</p>

                                                    <!-- Email input -->
                                                    <div class="form-outline mb-4">
                                                        <label for="nama" class="form-label">Username</label>
                                                        <input type="nama" class="form-control" id="nama" name="nama">
                                                    </div>

                                                    <!-- Password input -->
                                                    <div class="form-outline mb-4">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password">
                                                    </div>

                                                    <!-- Checkbox -->
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1" style="margin-right: 205px ;">Remember me</label>
                                                        <!-- Simple link -->
                                                        <a href="forgot_password.php class=text-decoration-none">Forgot password?</a>
                                                    </div>
                                            </div>



                                            <!-- Submit button -->
                                            <div class="d-grid gap-2 col-12 mx-auto" style="margin-bottom: 10px; margin-top: 30px;">
                                                <button style="background-color: #FF8F01;" class="btn text-white" type="submit" name="submit">Log in</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Pills content -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </nav>

    <section class="main">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-8 pt-5" style="margin-top: 160px;">
                    <h1 class="pt-4">Perpustakaan <br>Politeknik Negeri Padang</h1>
                    <button class="btn1 mt-3" onclick="scrollToSection('#kategoribuku')">Lihat Kategori Buku</button>
                </div>
            </div>
        </div>
    </section>

    <!--===================================-->
    <section class="new">
        <div class="container">
            <div id="bukuterpopuler" class="row py-5">
                <h1 class="text-white" style="margin-top: 100px;">Buku Terpopuler</h1>
                <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="images/sains6.jpg" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title"> Pemeliharaan Sistem Pneumatik Dan Hidrolik</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/komputer5.jpg" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Sistem Komputer</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/komputer6.jpeg" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Sistem Operasi Komputer</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/komputer6.jpg" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Pengantar Ilmu Komputer</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/filosofi.png" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Filosofi Di Pagi Hari</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/komputer7.jpg" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Pengantar Aplikasi Komputer</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/Metode-Statistika_Eri-Setiawan-depan.jpg    " alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Metode Statistika</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/psikologi3.png" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Psikologi Pariwisata</h5>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <div class="img-wrapper">
                                    <img src="image/sains5.jpg" alt="...">
                                </div>
                                <div class="text-overlay">
                                    <h5 class="card-title">Membuat Larutan Kimia</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!--=====================================================================================================-->

    <section>
        <div id="kategoribuku">
            <div class="container">
                <div class="row">

                    <h1 class="text-white" style="margin-top: 90px;">Kategori Buku</h1>
                    <div class="cards-container">
                        <!-- Card 1 -->
                        <a class="cards" href="komputerhome.php">
                            <form action="komputer.php" method="GET">
                                <img src="image/computer.png" alt="">
                                <div>Computer & Science</div>
                            </form>
                        </a>

                        <!-- Card 2 -->
                        <a class="cards" href="psikologihome.php">
                            <form action="psikologihome.php" method="GET">
                                <img src="image/otakk.png" alt="">
                                <div>Philosophy & Psychology</div>
                            </form>
                        </a>

                        <!-- Card 3 -->
                        <a class="cards" href="religionhome.php">
                            <form action="religionhome.php" method="GET">
                                <img src="image/mesjidd.png" alt="">
                                <div>Religion</div>
                            </form>
                        </a>

                        <!-- Card 4 -->
                        <a class="cards" href="socialhome.php">
                            <form action="socialhome.php" method="GET">
                                <img src="image/social.png" alt="">
                                <div>Social & Science</div>
                            </form>
                        </a>

                        <!-- Card 5 -->
                        <a class="cards" href="languagehome.php">
                            <form action="languagehome.php" method="GET">
                                <img src="image/bahasaa.png" alt="">
                                <div>Language</div>
                            </form>
                        </a>

                        <!-- Card 6 -->
                        <a class="cards" href="link6.html">
                            <form action="link6.html" method="GET">
                                <img src="image/sciencee.png" alt="">
                                <div>Pure Science</div>
                            </form>
                        </a>

                        <!-- Card 7 -->
                        <a class="cards" href="link7.html">
                            <form action="link7.html" method="GET">
                                <img src="image/fisikaa.png" alt="">
                                <div>Applied Science</div>
                            </form>
                        </a>

                        <!-- Card 8 -->
                        <a class="cards" href="link8.html">
                            <form action="link8.html" method="GET">
                                <img src="image/artt.png" alt="">
                                <div>Art & Recreation</div>
                            </form>
                        </a>

                        <!-- Card 9 -->
                        <a class="cards" href="link9.html">
                            <form action="link9.html" method="GET">
                                <!-- Isi card ke-9 disini -->
                                <img src="image/imaginationn.png" alt="">
                                <div>Fiction</div>
                            </form>
                        </a>

                        <!-- Card 10 -->
                        <a class="cards" href="link10.html">
                            <form action="link10.html" method="GET">
                                <!-- Isi card ke-10 disini -->
                                <img src="image/literaturee.png" alt="">
                                <div>Literature</div>
                            </form>
                        </a>

                        <!-- Card 11 -->
                        <a class="cards" href="link11.html">
                            <form action="link11.html" method="GET">
                                <!-- Isi card ke-11 disini -->
                                <img src="image/historyy.png" alt="">
                                <div>History & Geography</div>
                            </form>
                        </a>

                        <!-- Card 12 -->
                        <a class="cards" href="link12.html">
                            <form action="link12.html" method="GET">
                                <!-- Isi card ke-12 disini -->
                                <img src="image/sportt.png" alt="">
                                <div>Sport</div>
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <footer>
        <div id="kontak" class="primary-footer" style="flex-direction: row; display: flex; background-color: rgba(255, 143, 1, 0.0); margin-top: 100px; box-shadow: 0px -5px 10px 0px rgba(0, 0, 0, 1);">
            <div class="gabungan" style="padding-left: 20px; color: white; padding-bottom: 55px;">
                <div class="hubungi">
                    <img style="width: 60px; height: 60px; margin-bottom: auto; margin-top: 30px;" src="image/pnplogo.png">
                </div>
                <div>
                    <p>Perpustakaan Politeknik Negeri Padang</p>
                </div>
                <div class="lagi">
                    <div class="coba">
                        <i class=""></i><a>Information</a>
                    </div>
                    <div class="coba">
                        <i class=""></i><a>Services</a>
                    </div>
                    <div class="coba">
                        <i class=""></i><a>Librarian</a>
                    </div>
                    <div class="coba">
                        <i class=""></i><a>Member Area</a>
                    </div>
                </div>
            </div>

            <div class="gabungan2" style="margin: auto; margin-top: 0%; padding-left: 0%;">
                <div class="tags" style="display: flex; align-items: center;">
                    <div class="hubungi" style="margin-top: 30px;">
                        <img style="width: 20px; height: 20px; margin-bottom: auto; margin-top: auto;" src="image/jamm.png">
                    </div>
                    <div>
                        <p style="margin-bottom: 0; margin-top: 30px; margin-left: 10px; color: white;">Jam Buka</p>
                    </div>
                </div>

                <div class="tags1" style="margin-top: 20px; color: white;">
                    <div class="info" style="margin: 0;">
                        <p style="margin: 0;">Senin-Jumat:</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Pukul 09.00-17.00 WIB</p>
                    </div>
                </div>

                <div class="tags1" style="margin-top: 20px; color: white;">
                    <div class="info" style="margin: 0;">
                        <p style="margin: 0;">Sabtu:</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Pukul 09.00-15.00 WIB</p>
                    </div>
                </div>

                <div class="tags1" style="margin-top: 20px; color: white;">
                    <div class="info" style="margin: 0;">
                        <p style="margin: 0;">Minggu:</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Tutup</p>
                    </div>
                </div>
            </div>

            <div class="gabungan21" style="margin: auto; margin-top: 0%; padding-left: 0%;">
                <div class="tags" style="display: flex; align-items: center;">
                    <div class="hubungi" style="margin-top: 25px;">
                        <img style="width: 35px; height: 35px; margin-bottom: auto; margin-top: auto;" src="image/homee.png">
                    </div>
                    <div>
                        <p style="margin-bottom: 0; margin-top: 30px; margin-left: 6px; color: white;">Alamat</p>
                    </div>
                </div>
                <div class="tags1" style="margin-top: 10px; color: white;">
                    <div class="info" style="margin: 0;">
                        <p style="margin: 0;">Kampus Politeknik Negeri</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Padang Limau Manis</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Kecamatan Pauh Kota Padang</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Padang</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Gedung C :</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Perpustakaan</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Politeknik Negeri Padang</p>
                    </div>
                </div>
            </div>

            <div class="gabungan21" style="margin: auto; margin-top: 0%; padding-left: 0%;">
                <div class="tags" style="display: flex; align-items: center;">
                    <div class="hubungi" style="margin-top: 25px;">
                        <img style="width: 35px; height: 35px; margin-bottom: auto; margin-top: auto;" src="image/email.png">
                    </div>
                    <div>
                        <p style="margin-bottom: 0; margin-top: 30px; margin-left: 6px; color: white;">Kontak</p>
                    </div>
                </div>
                <div class="tags1" style="margin-top: 10px; color: white;">
                    <div class="info" style="margin: 0;">
                        <p style="margin: 0;">Telp. 021-7270159 ; 021-7270751 ;</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">021-7864134</p>
                    </div>
                    <div class="diskusi" style="margin: 0;">
                        <p style="margin: 0;">Telp/Fax. 021-7863469</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="container-fluid secondary-footer" style="display: flex; font-size: 15px; padding: 15px; width: 100%; align-items: center; justify-content: center; background-color: #020225; box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.2);">
                <div class="col-md-6 col-xs-12 text-md-left text-center" style="color: white;">
                    Copyright &copy; 2019 - 2024 Politeknik Negeri Padang - All rights reserved.
                </div>
            </div>
        </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.bundle.min..js"></script>
    <script src="bootstrap/jquery-3.6.4.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.min.5.2.js"></script>
    <script src="home.js"></script>
    <script>
        function scrollToSection(sectionId) {
            const section = document.querySelector(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>
    <script>
        // Menggunakan JavaScript untuk menangani klik pada tombol Register di dalam modal login
        document.getElementById('openSignupModalBtn').addEventListener('click', function() {
            // Menutup modal login
            $('#loginModal').modal('hide');
            // Membuka modal signup
            $('#signupModal').modal('show');
        });
    </script>
    <!-- Script JavaScript untuk menghilangkan alert dengan efek fade out -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Setelah halaman dimuat, atur untuk memudarkan alert setelah 5 detik
        $(document).ready(function() {
            setTimeout(function() {
                $("#loginAlert").fadeOut(1000); // 1000 adalah durasi fading dalam milidetik
            }, 3000); // 5000 adalah waktu sebelum memulai fading dalam milidetik
        });
    </script>

</body>

</html>