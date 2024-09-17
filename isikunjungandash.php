 <?php
    // memanggil file koneksi 
    require 'koneksicom.php';

    if (isset($_POST['submit'])) {
        // mengambil nilai yang dikirimkan dari inputan form
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $keperluan = $_POST['keperluan'];
        $tanggal = $_POST['tanggal'];
        $waktu = $_POST['waktu'];

        // menyimpan query insert ke table tamu
        $query = "INSERT INTO kunjungan(nama, email, keperluan, tanggal, waktu) VALUES ('$nama','$email','$keperluan', '$tanggal', '$waktu')";

        // cek apakah query sukses atau gagal
        if ($db->query($query) == TRUE) {
            echo '<div id="berhasilAlert" class="alert alert-success alert-dismissible show" role="alert" style="position: fixed; bottom: 5px; right: 20px;">
                    Berhasil.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        } else {
            echo "Data gagal Dikirim. " . $db->error;
        };
    }
    ?>
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

     <!--Isi buku tamu-->
     <section id="bukutamu">
         <div class="container">
             <div class="row py-5">
                 <h1 class="text-center mb-4" style="margin-top: 70px;">Silahkan Isi Buku Tamu</h1>
                 <div class="row justify-content-center">
                     <div class="col-md-6">
                         <form method="post">
                             <div class="mb-3">
                                 <label for="nama" class="form-label">Nama</label>
                                 <input type="text" class="form-control" id="nama" name="nama" required>
                             </div>
                             <div class="mb-3">
                                 <label for="email" class="form-label">Email</label>
                                 <input type="email" class="form-control" id="email" name="email" required>
                             </div>
                             <div class="mb-3">
                                 <label for="keperluan" class="form-label">Keperluan</label>
                                 <textarea class="form-control" id="keperluan" name="keperluan" rows="3" required></textarea>
                             </div>
                             <div class="mb-3">
                                 <label for="tanggal" class="form-label">Tanggal</label>
                                 <input type="date" class="form-control" id="tanggal" name="tanggal" required readonly>
                             </div>
                             <div class="mb-3">
                                 <label for="waktu" class="form-label">Jam</label>
                                 <input type="text" class="form-control" id="waktu" name="waktu" readonly>
                             </div>
                             <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                         </form>
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
                 $("#berhasilAlert").fadeOut(1000); // 1000 adalah durasi fading dalam milidetik
             }, 3000); // 5000 adalah waktu sebelum memulai fading dalam milidetik
         });
     </script>
     <script>
         // Setelah halaman dimuat, atur untuk memudarkan alert setelah 5 detik
         $(document).ready(function() {
             setTimeout(function() {
                 $("#errorAlert").fadeOut(1000); // 1000 adalah durasi fading dalam milidetik
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
             document.getElementById('waktu').value = now;
             setTimeout(updateClock, 1000); // Perbarui setiap detik
         }

         // Panggil fungsi pertama kali
         updateClock();
     </script>
     <script>
         function refreshPage() {
             // Me-refresh halaman
             location.reload();
         }
     </script>

     <script>
         // Mendapatkan elemen input tanggal
         var inputTanggal = document.getElementById('tanggal');

         // Mendapatkan tanggal dan waktu saat ini
         var tanggalSekarang = new Date();

         // Format tanggal sebagai YYYY-MM-DD (sesuai dengan format input tanggal)
         var formattedDate = tanggalSekarang.toISOString().split('T')[0];

         // Set nilai input tanggal dengan tanggal saat ini
         inputTanggal.value = formattedDate;
     </script>



 </body>

 </html>