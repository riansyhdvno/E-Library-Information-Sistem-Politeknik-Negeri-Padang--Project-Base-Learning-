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
                        <a class="nav-link" href="home.html#bukuterpopuler">Buku Terpopuler</a>
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