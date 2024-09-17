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
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparant fixed-top">
            <div class="container">
                <!-- Logo -->
            <a id="navbarLink" class="navbar-brand" href="home.php" aria-current="page" style="display: flex; align-items: center;">
                <img src="image/pnplogo.png" alt="Perpustakaan Logo" width="50" style="margin-right: 10px;">
                    <span>Perpustakaan Politeknik Negeri Padang</span>
            </a>
                <!--toggle btn-->
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
                                <a class="nav-link" href="#kontak">Kontak</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="informasi.php">Informasi</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="javascript:history.back()">Kembali</a>
                            </li>
                            
                        </ul>
                    <!--Login/Sign up-->

                    <?php
    require 'koneksicom.php';
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $password = ($_POST['password']);

        //$valid_email = "andi@gmail.com";
        //$valid_passw = "123";


        //query ke databse
        $sql = "SELECT * FROM user WHERE nama='$nama' AND password='$password'";

        $result = $db->query($sql);
        $data=$result->fetch_assoc();
        // $data=mysqli_fetch_assoc($result);

        if ($result->num_rows > 0) {
            $_SESSION['nama'] = $nama;
            $_SESSION['login'] = TRUE;
            $_SESSION['level'] = $data['level'];
            header("Location: dashboardusers.php");
        }else {
            echo '<div id="loginAlert" class="alert alert-danger alert-dismissible show" role="alert" style="position: fixed; bottom: 5px; right: 20px;">
                    Login Gagal. Silakan coba lagi.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }

?>
                    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="text-white text-decoration-none px-3 py-1 rounded-4" style="background-color: #FF8F01;"
                            data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                    
                        <!-- Modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                    
                                        <!-- Pills content -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="pills-login" role="tabpanel"
                                                aria-labelledby="tab-login">
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
                                                        <label class="form-check-label" for="exampleCheck1"
                                                            style="margin-right: 205px ;">Remember me</label>
                                                        <!-- Simple link -->
                                                        <a href="forgot_password.php class=text-decoration-none">Forgot password?</a>
                                                    </div>
                                            </div>
                    
                    
                    
                                            <!-- Submit button -->
                                            <div class="d-grid gap-2 col-12 mx-auto" style="margin-bottom: 10px; margin-top: 30px;">
                                                <button style="background-color: #FF8F01;" class="btn text-white" type="submit" name="submit" >Log in</button>
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

        <section>
            <div class="container">
                <div class="row py-5">
                     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-body">
                    <!-- Judul -->
                    <h5 class="card-title" style="margin-top: 80px;">Informasi Perpustakaan</h5>
                    <hr class="my-4"> <!-- Garis pembatas -->

                    <!-- Konten -->
                    <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Alamat:</h6>
                        <p>Gedung C Kampus Politeknik Negeri Padang, Padang, Indonesia</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Telp:</h6>
                        <p>(0751) 72590</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Fax:</h6>
                        <p>(0751) 72576</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Jam Buka:</h6>
                        <p>Senin - Jumat: 08.00 WIB - 15.00 WIB</p>
                        <p>Isoma: 12.00 - 13.00 WIB</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Koleksi:</h6>
                        <p>Kami memiliki berbagai jenis koleksi, dari Fiksi hingga Ilmu Material.</p>
                        <p>Koleksi mencakup bahan cetak dan digital seperti CD-ROM, CD, VCD, dan DVD.</p>
                        <p>Kami juga mengumpulkan surat kabar dan majalah.</p>
                    </div>

                    <div class="mb-3">
                        <h6 class="card-subtitle mb-2">Keanggotaan:</h6>
                        <p>Untuk meminjam koleksi, Anda harus menjadi anggota perpustakaan dengan memenuhi syarat dan kondisi.</p>
                    </div>
                    <hr class="my-4">
                </div>
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


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="bootstrap/bootstrap.bundle.min..js"></script>
        <script src="bootstrap/jquery-3.6.4.min.js"></script>
        <script src="bootstrap/bootstrap.bundle.min.5.2.js"></script>
        <script src="home.js"></script>
   <script>
            function scrollToSection(sectionId) {
                const section = document.querySelector(sectionId);
                if (section) {
                    section.scrollIntoView({ behavior: 'smooth' });
                }
            }
        </script>
<script>
    // Menggunakan JavaScript untuk menangani klik pada tombol Register di dalam modal login
    document.getElementById('openSignupModalBtn').addEventListener('click', function () {
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
    $(document).ready(function(){
        setTimeout(function(){
            $("#loginAlert").fadeOut(1000); // 1000 adalah durasi fading dalam milidetik
        }, 3000); // 5000 adalah waktu sebelum memulai fading dalam milidetik
    });
</script>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Moment.js for real-time clock -->
<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Real-time clock script -->
<script>
    // Update jam secara real-time
    function updateClock() {
        var now = moment().format('HH:mm:ss');
        document.getElementById('jam').value = now;
        setTimeout(updateClock, 1000); // Perbarui setiap detik
    }

    // Panggil fungsi pertama kali
    updateClock();
</script>


    </body>
    
</html>