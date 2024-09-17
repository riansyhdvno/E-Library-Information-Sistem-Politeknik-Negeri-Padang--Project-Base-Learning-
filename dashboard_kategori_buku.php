<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library PNP</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap/style.css">  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="assets1/css/style.css">

</head>

<body>

    <?php include 'navdash.php'; ?>

    <section>
        <div id="kategoribuku">
            <div class="container">
                <div class="row">

                    <h1 class="text-white" style="margin-top: 90px;">Kategori Buku</h1>
                    <div class="cards-container">
                        <!-- Card 1 -->
                        <a class="cards" href="komputerdash.php">
                            <form action="komputerdash.php" method="GET">
                                <img src="image/computer.png" alt="">
                                <div>Computer & Science</div>
                            </form>
                        </a>

                        <!-- Card 2 -->
                        <a class="cards" href="psikologidash.php">
                            <form action="psikologidash.php" method="GET">
                                <img src="image/otakk.png" alt="">
                                <div>Philosophy & Psychology</div>
                            </form>
                        </a>

                        <!-- Card 3 -->
                        <a class="cards" href="religiondash.php">
                            <form action="religiondash.php" method="GET">
                                <img src="image/mesjidd.png" alt="">
                                <div>Religion</div>
                            </form>
                        </a>

                        <!-- Card 4 -->
                        <a class="cards" href="socialdash.php">
                            <form action="socialdash.php" method="GET">
                                <img src="image/social.png" alt="">
                                <div>Social & Science</div>
                            </form>
                        </a>

                        <!-- Card 5 -->
                        <a class="cards" href="languagedash.php">
                            <form action="languagedash.php" method="GET">
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
        <?php include 'footerusers.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.bundle.min..js"></script>
    <script src="bootstrap/jquery-3.6.4.min.js"></script>
    <script src="home.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable(); // Inisialisasi DataTable pada elemen tabel dengan class 'table'
        });
    </script>


</body>

</html>