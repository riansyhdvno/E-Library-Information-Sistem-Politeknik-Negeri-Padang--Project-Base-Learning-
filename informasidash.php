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

    <?php include 'navdash.php' ?>

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
        <?php include 'footerusers.php' ?>
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