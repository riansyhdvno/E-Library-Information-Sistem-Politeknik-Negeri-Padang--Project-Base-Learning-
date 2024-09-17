-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 03:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(128) NOT NULL,
  `gambar` longtext NOT NULL,
  `judul` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tahun_terbit` int(200) NOT NULL,
  `lokasi` varchar(11) NOT NULL,
  `jumlah_halaman` int(255) NOT NULL,
  `available_books` int(11) NOT NULL,
  `tottal_books` int(11) NOT NULL,
  `detail` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `kode_buku`, `gambar`, `judul`, `category_id`, `pengarang`, `penerbit`, `tahun_terbit`, `lokasi`, `jumlah_halaman`, `available_books`, `tottal_books`, `detail`) VALUES
(2, '444', 'images/c+.jpg', 'Hujan', 1, 'Tere Liye', 'Gramedia', 2015, 'X.5', 123, 0, 3, ''),
(10, '7777', 'images/english-grammer-cover.png', 'jhjg', 1, 'njhh', 'Deepublish', 8906, '6', 23, 2, 4, ''),
(14, '456', 'images/english-grammer-cover.png', 'Bujang', 1, 'Tere Liye', 'Gramedia', 987, '0', 60, 1, 3, ''),
(17, '33335', 'images/english-grammer-cover.png', 'sasASs', 1, 'Abdul', 'Deepublish', 0, '0', 60, 1, 3, ''),
(18, 'L001', 'images/OL1.png', 'Buku Industri Olahraga: Optimalisasi Potensi Olahraga Daerah dalam Mengembangkan Perekonomian Masyarakat', 18, '	Bayu Iswana dkk', 'Deepublish', 2023, 'X', 108, 32, 34, 'Buku yang berada di tangan pembaca merupakan sebuah telaah mendalam tentang hubungan yang kompleks antara potensi olahraga daerah sebagai sarana mengembangkan perekonomian masyarakat. Penulisnya merupakan beberapa dosen pendidikan jasmani ataupun keolahragaan, menggali dari berbagai sisi dengan pendekatan utama pada industri olahraga.\r\n\r\nBuku ini memuat sembilan bab yang merefleksikan beragam problematika, tantangan, ataupun peluang pengembangan industri olahraga di Indonesia. Para penulis berangkat dari fakta, fenomena atas pengamatan sekitar mereka. Hadirnya buku ini sekaligus mengisi literasi tentang manajemen dan bisnis keolahragaan.'),
(22, 'B004', 'images/psikologi1.png', 'Revitalisasi Kesejahteraan Psikologis di Wilayah Pedesaan: Strategi Sosial Dan Klinis Berbasis Komunitas', 4, '', 'Deepublish', 2023, 'X.1', 88, 1, 3, 'Buku ini merupakan sebuah panduan yang memandu pembaca dalam perjalanan untuk memahami, mengatasi, dan meningkatkan kesejahteraan psikologis di wilayah pedesaan. Kesejahteraan psikologis menjadi perhatian utama, mengingat bahwa masyarakat pedesaan seringkali dihadapkan pada berbagai tekanan dan tantangan yang unik. Terdiri dari tujuh bagian, buku ini membahas secara rinci terkait kondisi kesehatan mental di pedesaan dan upaya pengembangan pelayanan kesehatan mental secara digital di desa. Benar'),
(30, 'A012', 'images/komputer5.jpg', 'Sistem Komputer', 5, 'Iwan Sofana', 'Informatika', 2017, 'X.3', 90, 1, 5, 'Daftar singkat Isi Buku Mengenal Mikrotik : \r\n\r\nJaringan Komputer dan OSI Layer\r\nMemulai RouterOS\r\nEksplorasi RouterOS dan RouterBOARD\r\nKonfigurasi RouterOS\r\nRouting Dan Internet\r\nPraktik Routing - 1 Praktik Routing - 2 Konfigurasi Bridge Wireless\r\nKonsep Firewall Dan Security\r\nPraktik Firewall Filter\r\nPraktik Firewall NAT dan MANGLE\r\nQuality Of Sevice ( QoS)\r\nTunell\r\nContoh Soal MTCNA'),
(32, 'A010', 'images/komputer6.jpg', 'PENGANTAR ILMU KOMPUTER', 5, 'Herlianan Rosika, M.Kom', '', 2021, 'X.3', 203, 1, 3, 'Latar Belakang Teknologi Informasi dan Komunikasi (TIK) sebagai bagian dari ilmu pengetahuan dan teknologi secara umum adalah semua teknologi yang berhubungan dengan pengambilan, pengumpulan, pengolahan, penyimpanan dan penyebaran informasi. Perkembangan teknologi yang demikian pesat memudahkan untuk mendapatkan informasi yang kita dapatkan dari mana saja, kapan saja dan siapa saja. Teknologi membawa dampak positif pada berbagai bidang seperti pada bidang pendidikan dimana kendala dalam mendapatkan ilmu dapat dikurangi dengan adanya internet. Perkembangan bidang telekomunikasi saat ini memungkinkan semua bidang kehidupan manusia dapat semakin ringan dikerjakan dengan bantuan komputer. Demikian halnya dengan pengelolaan informasi di sebuah sekolah yang dapat diakses darimana saja hanya dengan menggunakan internet.'),
(33, 'A009', 'images/sains1.jpg', 'Sains Material: Struktur, Sifat, Sintesis dan Aplikasinya', 6, 'Prof. Dr.rer.nat. Karna Wijaya, M.Eng. Dr. Latifah Hauli Dr. Amalia Kurnia Amin Dr. Maisari Utami Asma Nadia, M.Sc. Tyas Sekarningrum', 'Gramedia', 2022, 'X.4', 90, 1, 3, 'Buku ini membahas antara lain: Perkembangan Sains Material, Ikatan Kimia dan Struktur Kristal, Ikatan dalam Material pada Polimer, Komposit, Material Katalis dan Fotokatalis, Nano dan Biomaterial, Korelasi Struktur, Sifat, Sintesis, Pengenalan Material Polimer dan Komposit, Pengantar Material Polimer, Pengantar Material Komposit, Pengenalan Material Katalis dan Fotokatalis, Pengenalan Nano dan Biomaterial dan Aplikasi Sains Material khususnya dalam bidang katalisis. Sebagai penyempurnaan buku Pengantar Kimia Material, maka buku ini ditulis lebih komprehensif, khususnya dalam hal aplikasi sains material, dari buku pertama, kontennya sudah mencakup semua pokok bahasan kimia material sehingga dapat memenuhi kebutuhan dasar mahasiswa baik tingkat sarjana maupun pascasarjana serta peneliti yang mendalami kimia material.'),
(37, '435345', 'image/program2.jpg', 'Code', 1, 'Tere Liye', 'Gramedia', 2013, 'X.3', 60, 2, 3, 'ini detaul buku code'),
(40, 'A001', 'images/sains6.jpg', 'Pemeliharaan Sistem Pneumatik Dan Hidrolik', 5, '', 'Deepublish', 2013, 'X.4', 191, 2, 3, 'Buku ini merupakan buku ajar ke-2 yang sudah saya kerjakan. Buku ini terdiri atas 8 bab, di mana masing-masing bab dimulai dengan capaian pembelajaran yang akan dicapai setiap bab tersebut. Buku ini membahas dasar-dasar teori mengenai pentingnya sistem pneumatik, elektro pneumatik, dan hidrolik di dunia industri saat ini.\r\n\r\nBuku ini juga membahas cara pemeliharaan, kendala, dan cara memperbaiki sistem pneumatik, elektro pneumatik, dan hidrolik. Buku ini berbeda dengan buku teknik dengan judul serupa. Hal tersebut dikarenakan buku ini saya lengkapi dengan cara penulisan teoretis yang dilengkapi dengan hasil observasi dan kerja lapangan di dunia industri. Buku ini juga dilengkapi dengan latihan soal dan jobsheet praktik agar mahasiswa atau pengajar dapat menyerap teori dan praktikum secara berkesinambungan.'),
(41, 'A005', 'images/sains5.jpg', 'Membuat Larutan Kimia di Laboratorium', 6, 'Nita Anggreani, M.T. Ahmad', 'Gramedia', 2021, 'X.4', 72, 1, 3, 'Sering dalam kehidupan kita melihat, menyentuh, dan merasakan berbagai benda. Benda-benda yang kita tahu tersebut umumnya dapat kita lihat fisiknya. Nampak warna dan bentuknya. Ada juga yang tidak terlihat namun bisa kita rasakan, misalnya udara. Benda-benda ini ada yang tampak kecil dan besar. Jika kita pecahkan hingga menjadi sangat kecil dan tidak jelas dengan mata telanjang, maka jika lihat dengan mikroskop masih nampak terlihat bentuknya.\r\n\r\nZat berbeda dengan energi. Jika energi adalah sesuatu yang dapat kita rasakan namun bukan berbentuk benda atau materi. Contoh energi misalnya adalah panas, cahaya, listrik dan lain-lain. Perbedaan antara zat dan energi adalah bahwa zat memiliki massa dan volume sedangkan energi tidak.\r\n\r\nZat kimia merupakan zat murni (bukan campuran), yaitu suatu bentuk materi yang memiliki komposisi kimia dan sifat karakteristik konstan. Zat kimia tidak dapat dipisahkan menjadi komponen dengan metode pemisahan fisika, tapi harus memutuskan ikatan kimia. Zat kimia bisa berupa unsur, senyawa, ion atau paduan.'),
(42, 'A004', 'images/sains4.jpg', 'Parasitologi I Teori dan Praktikum untuk Mahasiswa Teknologi Laboratorium Medik', 6, 'Reni Yunus, S.Si., M.Sc.', 'Deepublish', 2021, 'X.4', 117, 1, 6, 'Secara etimologi, Parasitologi berasal dari kata â€œparasitosâ€ yang berarti organisme yang mengambil makanan dari organisme lain, dan logos yang berarti ilmu. Secara lengkap Parasitologi adalah ilmu yang mempelajari makhluk hidup (organisme) yang hidupnya menumpang (bergantung) pada makhluk hidup yang lain. Parasitologi juga diartikan sebagai bidang ilmu tentang parasit dan parasitisme.\r\n\r\nParasit adalah suatu jenis (spesies) organisme yang hidup berhimpun dengan jenis organisme lain yang lebih besar dan relatif kuat secara fisik yang disebut inang atau biasa disebut juga host/hospes (tuan rumah). Dalam perhimpunan/asosiasi tersebut jenis organisme yang kecil berada di dalam tubuh atau diluar (permukaan) tubuh organisme inangnya, dan di situlah organisme yang kecil itu menumpang atau memperoleh makanan untuk kelangsungan hidupnya sendiri dan generasinya, selama atau sebagian dari perjalanan daur hidupnya secara lengkap.'),
(43, 'A003', 'images/sains3.jpg', ' Defragmenting Struktur Berpikir Pseudo dalam Memecahkan Masalah Matematika', 6, 'Kadek Adi Wibawa, S.Pd., M.Pd.', 'Gramedia', 2013, 'X.4', 179, 2, 3, 'ada bab 1, penulis memaparkan tentang teori berpikir pseudo. Apa itu berpikir pseudo?. Bagaimana contohnya dalam pembelajaran dikelas dan kehidupan sehari-hari?. Mengapa berpikir pseudo penting untuk diteliti?.\r\n\r\nBab 2, berisi semangat defragmenting sebagai upaya tindak lanjut yang dilakukan penulis setelah menemukan sumber masalah siswa ketika kesulitan dan salah dalam memberikan jawaban.\r\n\r\nDefragmenting yang merupakan istilah serapan dari dunia komputer coba dipadukan dengan istilah yang sudah mempuni di bidang pendidikan yaitu re-strukturisasi. Dan Mengapa defragmenting pada komputer masuk akal (make sense) untuk dibawa ke dunia pendidikan?.'),
(47, 'A002', 'images/sains2.jpg', 'Biologi Sel dan Molekuler', 6, 'Hebert Adrianto', '', 2017, 'X.4', 160, 2, 9, 'Penyakit semakin menarik untuk diteliti dan diungkapkan di level seluler dan molekuler, apalagi didukung dengan teknologi untuk analisis molekuler seperti elektroforesis, PCR, dan sekuencing.\r\n\r\nKonsep dasar di bidang biologi sel dan molekuler perlu diketahui dan dikuasai oleh mahasiswa kedokteran sebab banyak Fakultas Kedokteran di Indonesia ini menggiatkan mahasiswa semester atas melakukan penelitian di level seluler dan molekuler.'),
(53, 'B001', 'image/filosofi.png', ' Filosofi di Pagi Hari', 7, 'Silas, S.Pd.Gr., M.T.', 'Deepublish', 2023, 'X.1', 167, 2, 6, 'Buku ini merupakan buku referensi untuk guru dalam menjadi pembina upacara atau dalam memotivasi peserta didik yang berisi tentang motivasi belajar peserta didik mulai dari semangat, disiplin, kerajinan, nasihat-nasihat yang membangun, berisi cerita yang unik.\r\n\r\nBuku ini didedikasikan oleh penulis untuk dunia pendidikan sebagai referensi yang berisi cerita-cerita unik agar peserta didik dapat lebih memahami makna dari nasihat yang terkandung dalam cerita. Setiap cerita berisi makna tersendiri dan berisi pesan moral sebagai pengantar dalam memotivasi peserta didik.'),
(55, 'C002', 'images/religi2.jpg', 'Religion Society dan Social Media', 8, 'Hebert Adrianto', 'Deepublish', 2018, 'Padang', 180, 20, 20, 'Di dunia pendidikan, media sosial dapat menjadi media pembelajaran yang efektif, tetapi juga sebaliknya dapat dimanfaatkan oleh lembaga-lembaga pendidikan untuk mempromosikan keunggulan lembaga pendidikannya yang sebenarnya tidak ada. Ironisnya lagi, orang tidak melakukan cek dan ricek tentang â€œjualanâ€ lembaga pendidikan tersebut. Masalah yang juga menonjol di dunia pendidikan adalah munculnya cyberbullying. Anak-anak dan remaja bukan hanya menjadi korban, bahkan juga sebagai pelaku.\r\n\r\nSuasana online di media sosial mempunyai ciri khas yang tidak sama dengan dunia sehari-hari. Pengguna bisa sangat mudah keluar masuk dalam sebuah perbincangan, identitas bisa tidak dikenal, respon dapat ditunda, informasi bisa masuk ke akun seseorang tanpa diminta, dan lain-lain. Oleh karena itu, isu tertentu di media sosial akan bisa segera viral dan memunculkan tanggapan berbeda. Pro dan kontra tidak dapat dihindari..'),
(56, 'D002', 'image/sosial1.png', 'Social Geography', 9, 'Hj. Masâ€™ad, S.Pd., M.Si., Arif, S.Pd., M.Pd.', 'Deepublish', 2023, 'X.6', 69, 2, 8, 'Setiap orang yang mempelajari geografi perlu memahami seluk beluk ilmu geografi, khususnya yang berkenaan dengan adanya pembagian geografi secara umum menjadi dua bagian. Pembagian geografi secara umum tersebut adalah geografi alam/fisik (physical geography) dan geografi manusia (human geography). Namun tidak boleh diartikan bahwa antara geografi manusia dan geografi fisik terdapat garis pemisah dan tegas. Antara geografi manusia dan geografi fisik sebenarnya saling bertalian karena bersama-sama mewujudkan geografi yang utuh.\r\n\r\nDi Indonesia pembagian geografi menjadi dua bagian tersebut lebih dikenal dengan geografi alam dan geografi sosial. Dalam hal in, geografi sosial memiliki dua pengertian yaitu; geografi sosial dalam artian luas dan geografi sosial dalam artian sempit. Pertama geografi sosial dalam artian luas yaitu studi bagian dari geografi yang membahas mengkaji masyarakat. Pengertian ini sama dengan pengertian geografi manusia. Menurut Firtzgereal dalam â€œGeography of 20th Centuryâ€ ditegaskan bahwa istilah geografi sosial sama dengan geografi manusia. Pengertian geografi sosial di Amerika, orang pada umumnya menyebut â€Human Geographyâ€ sedangkan di Belanda disebut â€œSocial Geografieâ€ nama inilah kemudian diwariskan kepada kita di Indonesia, kedua, pengertian geografi sosial dalam artian sempit dalam hal ini geografi sosial kedudukannya setara dengan geografi ekonomi, geografi penduduk, geografi sejarah dan geografi politik.'),
(57, 'D001', 'image/social2.jpg', 'Corporate Social Responsibility in the Digital Era', 9, 'Ayub Ilfandy Imran', 'Deepublish', 2017, 'X.5', 150, 2, 4, 'Buku ini merupakan buku ajar dengan 12 bab. Bab pertama berisikan dasar CSR mulai dari definisi teori dan konsep, kemudian model, standar, manfaat, dan tahapan pelaksanaan CSR. Bab dua tentang pengertian komunikasi, bentuk, dan fungsinya. Bab tiga tentang hubungan CSR dengan public relation, bab empat tentang cara menciptakan pesan melalui CSR, bab lima tentang media enggagement saat CSR, bab enam tentang mengkomunikasikan CSR lewat pers, bab tujuh tentang corporate social initiatives sebagai bentuk CSR, bab delapan tentang cyber public relation, bab sembilan tentang CSR dan karyawan millenials sebagai target audience, bab sepuluh tentang membuat strategi people, planet, dan profit, bab sebelas dan duabelas tentang studi kasus.'),
(59, '3424', 'image/english-grammer-cover.png', 'sjdbjsd', 11, 'Tere Liye', 'Gramedia', 2013, 'X.3', 60, 2, 3, 'saddefd'),
(60, '12345678', 'image/english-grammer-cover.png', 'Si Anak Spesial', 11, 'Tere Liye', 'Gramedia', 2013, 'X.3', 60, 2, 3, 'sads'),
(63, '23234235', 'image/english-grammer-cover.png', 'Si Anak Spesial', 11, 'Supriono, S.Sos., M.A.B.', 'Gramedia', 2013, 'X.3', 60, 2, 3, 'swsas'),
(64, '1234466', 'image/english-grammer-cover.png', 'sasASs', 11, 'Tere Liye', 'Gramedia', 2013, 'X.3', 60, 2, 3, 'asaSAsa'),
(65, '324234', 'image/english-grammer-cover.png', 'Si Anak Spesial', 11, 'Tere Liye', 'Gramedia', 2013, 'X.3', 60, 2, 3, 'qwew'),
(66, '123446', 'image/english-grammer-cover.png', 'English Grammar from Zero', 11, '	Dhini Aulia, M.Pd.', 'Deepublish', 2024, 'X.6', 124, 2, 3, 'Mampu berbahasa Inggris adalah salah satu kemampuan yang wajib kita miliki saat ini untuk dapat bersaing dalam bidang apa pun dan dengan siapa pun. Untuk dapat menguasai bahasa Inggris dengan baik, dibutuhkan pula kemampuan dalam mempelajari dan memahami grammar. Grammar membantu kita untuk menghasilkan perkataan dan tulisan yang baik dan mudah dimengerti. Dengan menggunakan grammar yang baik, kamu akan terdengar baik dalam pembicaraan dan tulisanmu. \r\n\r\nBuku English Grammar from Zero ini hadir dengan materi-materi grammar yang sangat mendasar, di antaranya tentang jenis-jenis kata dan bagaimana aturan menggabungkannya menjadi frasa, klausa, dan kalimat. Materi dalam buku ini disusun berdasarkan ilmu dan pengalaman penulis selama 23 tahun berkecimpung di bidang bahasa Inggris. Buku ini diharapkan dapat membantu generasi muda mempelajari hingga memahami grammar bahasa Inggris.'),
(67, '675345', 'image/english-grammer-cover.png', 'Siapa Yang Belum Tau?', 11, 'Tere Liye', 'Gramedia', 2013, 'X.3', 60, 2, 3, 'XZXz'),
(68, '67456', 'image/english-grammer-cover.png', 'Apakah benar terjadi?', 11, 'Tere Liye', 'Gramedia', 2013, 'X.3', 60, 2, 4, 'sdasdASDA'),
(69, 'C001', 'image/agama1.jpg', 'NALAR TASAWUF', 8, 'Hebert Adrianto', 'Deepublish', 2019, 'Jakarta', 85, 20, 20, 'Dapat dikatakan bahwa tasawuf mengendalikan ruh manusia agar tidak terkontaminasi dengan keduniawiaan yang terus maju dan berkembang. Di sana kamu pun akan mempelajari praktik tasawuf itu apa saja, karena di sana ada banyak sekali aliran tasawuf yang bisa kamu pelajari.\r\n\r\n'),
(70, 'I002', 'image/bumi.jpg', 'Bumi', 15, 'Tere Liye', 'Gramedia', 2014, 'Jakarta', 440, 15, 15, 'Raib adalah seorang gadis berumur 15 tahun. Secara umum, tidak ada yang berbeda dari Raib dengan remaja pada umumnya. Namun, Raib memiliki rahasia yang ia simpan sendiri sejak kecil, yakni kemampuan untuk menghilangkan diri. Hanya dengan mengatupkan kedua tangannya di depan wajahnya, Raib dapat melenyapkan seluruh tubuhnya dengan seketika. Raib suka menggunakan kemampuan tersebut untuk bermain petak umpat bersama orang tuanya. Saat ulang tahunnya yang kesembilan, Raib mendapat hadiah anonim berupa dua ekor kucing kembar. Kedua kucing itu pun dia beri nama si \"Hitam\" dan si \"Putih\".'),
(71, 'I001', 'image/hujan.jpg', 'Hujan', 15, 'Tere Liye', 'Gramedia', 2018, 'Jakarta', 413, 10, 10, 'Novel ini menceritakan tentang Esok dan Lail sebagai salah satu tokoh utama, keduanya dipertemukan setelah gunung meletus pada tahun 2042. Efek letusan gunung yang dahsyat membuat seisi bumi menyisihkan manusia dan tersisa sekitar 10% manusia.\r\n\r\nEsok yang memiliki nama panjang Soke Bahtera merupakan sosok anak muda yang pintar dan jenius, saat 16 tahun ia berpindah ke ibu kota untuk meneruskan sekolahnya dan ia berhasil membuat mobil terbang untuk pertama kalinya'),
(72, 'F001', 'image/pure1.jpg', 'Kamus Biologi', 12, 'Cahya Budi Kartiawan', 'GagasMedia', 2013, 'Bandung', 116, 12, 12, 'Biologi adalah ilmu yang mempelajari aspek fisik kehidupan. Istilah \"biologi\" dipinjam dari bahasa Belanda, biologie, yang juga diturunkan dari gabungan kata bahasa Yunani, \"hidup\" dan \"logos\" (lambang, ilmu). Obyek kajian biologi pada masa kini sangat luas dan mencakup semua makhluk hidup dalam berbagai aspek kehidupannya.\r\n\r\nJadi, Biologi adalah ilmu yang mempelajari segala yang hidup. Hal ini memungkinkan kita untuk memecahkan permasalahan yang masih menjadi \"rahasia alam\". Biologi merupakan kelompok ilmu murni (pure science), kedudukannya sama dengan ilmu fisika, kimia, dan matematika.'),
(73, 'F002', 'image/pure2.png', 'Jurnal Mantik', 12, 'Hengki Tamando Sihotang', 'Sumatera UT', 2019, 'Sumatera Ut', 167, 15, 15, 'urnal Mantik is a scientific journal in information systems/information technology, Computer Science and management science containing the scientific literature on studies of pure and applied research in information systems/information technology, Computer Science and management science and public review of the development of theory, method and applied sciences related to the subject. Jurnal Mantik is published by the Institute of Computer Science (IOCS). Editors invite researchers, practitioners, and students to write scientific developments in fields related to information systems/information technology, Computer Science and management science). Jurnal Mantik is issued 4 (Four) times a year. This journal contains research articles and scientific studies.'),
(74, 'H001', 'image/art1.jpg', 'The Doodles ART', 14, 'W.B. Atmoko', 'Gudang Penerbit', 2016, 'Surabaya', 142, 23, 23, 'Ucapan spontan ( Sebagai Motivasi) yang terlotar begitu saja saat melihat kondisi atau situasi teman, yang sedang jenuh dengan berbagai aktivitas dan rutinitas, buku ini cocok untuk dijadikan teman atau menemani Anda pada situasi jenuh dalam berbagai aktivitas harian yang kita jalani, Buku yang anda pegang ini saya sebut Drawing and Coloring for Adult, The Doodle Art, adalah gabungan dari buku mewarnai dan buku gambar, buku ini akan membantu anda mengusir kejenuhan dengan mewarnai Doodles pada tiap lembaran-lembaran awal buku ini dan we give you a space to create your own doodles pada lembaran-lembaran halaman kosong pada akhir bagian buku ini. So...lets have fun! ekspresikan perasaan, suasana hatimu dengan mewarnai dan menggambar doodlemu sendiri...\r\n\r\nDoodling sering kita lakukan tanpa sadar pada selembar kertas bisa menjadi pengusir kejenuhan. hal ini sering kali dilakukan tanpa sadar saat sedang bosan mengikuti pelajaran, mengerjakan tugas, meeting atau menjawab tlp dalam jangka waktu lama, dengan hanya bermodalkan sebuah pencil atau pulpen dan secarik kertas kosong maka kegiatan Doodling pun sudah bisa dilakukan dengan spontan dan mengalir begitu saja, bentuknya bisa bermancam-macam, mulai dari gambar huruf, hewan, awan, wajah, monster dan masih banyak bentuk lainnya atau bisa juga hanya sekedar coretan abstrak saja.'),
(75, 'I003', 'image/fiksi3.jpg', 'Laskar Pelangi', 15, 'Andrea Hirata', 'Bentang Pustaka', 2020, 'Padang', 340, 15, 15, 'Laskar Pelangi telah menjadi international bestseller, diterjemahkan ke-40 bahasa asing, telah terbit dalam 22 bahasa, dan diedarkan di lebih dari 130 negara. Melalui program beasiswa, Hirata meraih Master of Science (Msc) bidang teori ekonomi dari Sheffield Hallam University, UK. Hirata juga mendapat beasiswa pendidikan sastra di IWP (International Writing Program), University of Iowa, USA. Karya Hirata berbahasa Indonesia: Laskar Pelangi, Sang Pemimpi, Edensor, Maryamah Karpov, Padang Bulan, Cinta di dalam Gelas, Sebelas Patriot, Laskar Pelangi Song Book, Ayah, Sirkus Pohon, dan Guru Aini. Karya dalam bahasa asing The Rainbow Troops, Der Träumer, Dry Season. Sejak Tahun 2010, secara mandiri Hirata mempromosikan minat baca, minat menulis, dan mendirikan museum sastra pertama dan satu-satunya di Indonesia, yaitu Museum Kata Andrea Hirata di Belitung.'),
(76, 'F003', 'image/sainsM.jpg', 'Sais & Kehidupan', 12, 'Suraso', 'Erlangga', 2003, 'xxxx', 189, 23, 23, ''),
(77, 'H002', 'image/art2.png', 'Buku Kesenian Barzanji', 14, 'Oland Abd Wahab', 'Deepublish', 2020, 'x', 215, 25, 25, 'Kesenian di Sumatera Barat dahulunya berfungsi sebagai ritual melihat kepercayaan masyarakat Minangkabau yang menganut kepercayaan Animisme dan Dinamisme. Setelah masuknya Islam di Indonesia seni dijadikan sebagai media penyebaran Islam, sehingga banyak kesenian di Sumatera Barat yang bertemakan Islam menjadi tradisi kebudayaan di Sumatera Barat, kesenian bertemakan islam ini sejalan dengan adat dan norma masyarakat Minangkabau sebagai sistem yang mengatur tata cara kehidupan yang di kenal dengan istilah adaik basandi syara’ syara’ basandi kitabullah, ada beberapa kesenian Minangkabau yang bertemakan islam di antaranya, Salawek Dulang, Dikia Rabano, Indang, dan salah satunya adalah Barzanji.'),
(78, 'H003', 'image/art3.png', 'Nora Anggraini, S.Sn., M.Sn., Dr. Nursyirwan, S.Sn., M.Sn., Yade Surayya, S.Sn., M.Sn.', 14, 'Nora Anggraini, S.Sn., M.Sn., Dr. Nursyirwan, S.Sn., M.Sn., Yade Surayya, S.Sn., M.Sn.', 'Deepublish', 2023, 'X', 117, 22, 22, 'Kesenian Ronggeang, yang awalnya bernama Ronggeng, telah menyebar di sebagian besar wilayah Jawa, sebagian Indonesia, dan di seluruh dunia. Ronggeng adalah sebutan untuk kelompok penari wanita dalam pertunjukan rakyat yang diiringi oleh gamelan. Karena Ronggeng tersebar di seluruh Nusantara, kesenian Ronggeng masih ada sampai hari ini dengan ciri khas yang unik untuk setiap daerah.\r\n\r\nRonggeng masuk dan berkembang di hampir seluruh pulau Jawa, termasuk Betawi, pantai utara Jawa, Jawa barat, Blora, Jawa Tengah, dan Jawa Timur. Selain di Jawa, seni Ronggeng berkembang di Sumatera, Sulawesi, Kalimantan, dan Malaysia. Di Sumatera Utara, Ronggeng hidup dan berkembang di Aceh, Sumatera Barat, dan Karo.\r\n\r\nDi Sumatera Barat, kesenian Ronggeng awalnya berkembang di wilayah Pasaman Timur dan Pasaman Barat. Wilayah Pasaman Barat, khususnya Kinali, berbatasan langsung dengan Nagari Salareh Aia, membuatnya berkembang ke Nagari Salareh Aia. Ronggeang Nagari Salareh Aia berbeda dari Ronggeang Pasaman dan Pasaman Barat karena lebih inovatif dan mudah dimakan.'),
(79, 'J001', 'image/LITE1.jpg', 'Buku Teknik Membuat Literature Review Bidang Kajian Ekonomi', 16, 'Dr. H. Asyari, S.Ag., M.Si., CSS., CRP.', 'Deepublish', 2005, 'X', 105, 30, 30, 'Banyak buku metode penelitian dan panduan penulisan karya ilmiah dalam berbagai ranah kajian sebagai guideline bagi akademisi dan peneliti yang telah ditulis dan diterbitkan. Setiap bidang ilmu memiliki kekhasan bidang dan menuntut kekhasan dalam gaya selingkung dalam membuat karya akademik.\r\n\r\nSebuah ilmu hadir bukan dalam ruang hampa dan terisolasi dari lingkungan yang bergerak dan berkembang dinamis. Untuk itu, metode penelitian pun harus menyahuti kedinamisan yang terjadi. Ilmu ekonomi sebagai salah satu cabang ilmu telah berkembang dengan pesat. Diawali dari periode Zaman Pra-Klasik, Klasik Neo-Klasik, Keynes dan Neo-Keynes, dan berlanjut ke berbagai mazhab atau aliran, seperti Monetaris dan Ekspektasi Rasional serta terus berkembang mengikuti berkembangnya persoalan-persoalan ekonomi yang muncul.\r\n\r\nTujuan penyusunan buku ini adalah untuk membantu para mahasiswa baik strata S-1, S-2 dan S-3 dalam menyelesaikan tugas-tugas akademik dalam bentuk karya ilmiah seperti skripsi, tesis dan disertasi serta jurnal dan juga membantu para peneliti dalam menyusun laporan penelitian atau dalam mempublikasikan dan menyebarluaskan hasil-hasil penelitian khususnya dalam bidang ekonomi.'),
(80, 'J002', 'image/LITE2.jpg', 'Buku Menulis Kajian Literatur Naratif', 16, '	Dr. Yeni Mahwati, S.K.M., M.Kes.', 'Deepublish', 2023, 'X', 158, 10, 10, 'Buku ini memberikan pendekatan langkah-demi-langkah sederhana untuk melakukan kajian literatur. Buku ini diharapkan dapat membantu untuk menemukan topik, dan menulis kajian literatur khususnya kajian naratif. Sehingga pada gilirannya diharapkan dapat menghasilkan produk kajian literatur yang diterbitkan pada sebuah jurnal baik di tingkat nasional maupun internasional. Meskipun konteks buku ini pada bidang kesehatan, namun model, strategi, dan perangkat yang disajikan berlaku untuk bidang ilmu yang lain\r\n\r\nBuku ini terdiri dari beberapa pembahasan, diantaranya:\r\n\r\nPendahuluan\r\nKajian literature\r\nMemilih topik dan merumuskan masalah\r\nPencarian literature\r\nSkrining literature\r\nTelaah kritis literature\r\nSintesis dan analisis literature\r\nMenulis diskusi dan menyelesaikan kajian literature\r\nMenulis manuskrip kajian literatur naratif\r\nBuku Menulis Kajian Literatur Naratif ini diterbitkan oleh Penerbit Buku Pendidikan Deepublish.'),
(81, 'J003', 'image/LITE3.png', 'Mozaik Publikasi Ilmiah Buku Ajar Matakuliah Scientific Publication', 16, 'Yudhi Arifani', 'Deepublish', 2023, 'X', 152, 18, 18, 'Buku ini membahas bagaimana cara menuliskan state of the arts dan perspektif kritis penulis dalam artikel publikasi ilmiah. Model penulisan yang disajikan sebagian besar didasarkan pada pengalaman pribadi penulis sebagai editor sekaligus reviewer salah satu jurnal internasional terkemuka dan bereputasi baik yang terindeks SCOPUS maupun SSCI serta dilandaskan pada beberapa teori yang relevan. Kebaharuan buku ini terletak pada bagaimana cara menemukan dan menuliskan author critical perspectives dari berbagai sudut seperti kritik terhadap teori yang diterapkan dalam penelitian, instrumen, konteks, cara pengumpulan dan analisis data serta cara penulisannya mulai bagian introduction hingga conclusion\r\n\r\nBuku ini terdiri dari beberapa pembahasan, diantaranya:\r\n\r\nProlog\r\nKebiasaan Membaca Artikel Secara Kritis\r\nCara Menentukan Topik Penelitian\r\nCara Penulisan Bagian Introduction\r\nPenulisan Literature Review\r\nPenulisan Bagian Method\r\nPenulisan Findings dan Discussion\r\nPenulisan Bagian Kesimpulan'),
(82, 'K001', 'image/sj.png', 'Kamus Arkeologi dan Presejarah', 17, 'Truman Simanjuntak', '', 2023, 'X', 524, 26, 26, 'Buku Kamus Arkeologi dan Prasejarah ini hadir di tengah-tengah kita untuk memudahkan pencarian informasi kearkeologian dan keprasejarahan dengan cara yang mudah, cepat, dan tepat; termasuk memberikan rujukan sumber-sumber bagi yang ingin mengetahui lebih jauh tentang informasi dimaksud.\r\n\r\nArkeologi dan prasejarah, dua sisi mata uang yang tak terpisahkan satu dengan lainnya. Arkeologi menyangkut teori dan metodologi untuk merekonstruksi kehidupan manusia, lingkungan, dan budaya yang sudah berlalu dan membawa nilai-nilai kandungannya ke masa kini. Prasejarah mengait dengan penggalan waktu tertua dari perjalanan kehidupan yang diteliti arkeologi. Dalam konteks ruang, fokus utama buku ini ialah prasejarah Kepulauan Nusantara dengan tetap melihat keterkaitannya dengan lingkup regional dan global.\r\nMemuat ribuan entitas, kamus ini perlu dibaca dan dimiliki paral mahasiswa, akademisi, dan masyarakat yang ingin memperoleh informasi dalam memperkaya, memperluas, dan mengembangkan pengetahuan baik di bidang arkeologi maupun prasejarah dengan aspek-aspek yang terkait dengannya.'),
(83, 'K002', 'image/sj2.png', 'Buku Grobogan Mempesona: Berbicara Sejarah dan Potensi', 17, '	Yunus Suryawan, S.STP, M.Si., Badiatul Muchlisin Asti., Ust. R. Nursyahid, AH., Saiful Anwar, S.S., Teguh Arseno.', 'Deepublish', 2023, 'x', 241, 22, 22, 'Buku Grobogan Mempesona: Berbicara Sejarah dan Potensi ini memaparkan bagaimana sejarah Grobogan dari masa ke masa dari awal cerita tutur Medang Kamulan dan Aji Saka hingga ke masa kerajaan lalu memasuki masa imperialisme dan sampai masa setelah kemerdekaan. Harapan paparan perjalanan Grobogan ini dapat memetik hikmah dari sebuah peristiwa yang akan membawa jati diri Grobogan yang tangguh menghadapi dan bertahan di setiap zaman bahkan bisa menjadi pemenang dengan memanfaatkan potensi dan pesonanya.\r\n\r\nDi bab selanjutnya 6 bab disajikan pesona Kab. Grobogan mulai dari potensi sumber daya alam dan manusianya, potensi ekonomi dan pariwisatanya juga kebudayaan dan kesenian asli Grobogan yang harus dipelihara dan dilestarikan. Di sinilah Grobogan harus tampil menjadi pemenang dan harus bisa bertahan dan beradaptasi serta berkembang menyesuaikan perkembangan dan tantangan zaman. Pada akhirnya, sengkalan “kambuling cipto hangroso jati” akan terbukti, Grobogan the Secret of Java akan terkuak menjadikan Grobogan berjuang bersemi dan mukti.\r\n\r\nBuku ini terdiri dari beberapa Pembahasan, diantaranya:\r\n\r\nSejarah Grobogan di Awal Cerita\r\nGrobogan di Masa Kerajaan\r\nGrobogan di Masa Imperialisme dan Kolonialisme\r\nGrobogan di Masa Mempertahankan Kemerdekaan\r\nGrobogan di Masa Mengisi Kemerdekaan\r\nBudaya Asli Grobogan dalam Bentuk Keterampilan dan Kemahiran'),
(84, 'K003', 'image/sj3.png', 'Buku Sandiwara Amal di Dusun Pulau Belimbing II: Sejarah dan Perkembangannya', 17, 'Saaduddin., Husin., Mardiah.', 'Deepublish', 2023, 'x', 114, 15, 15, 'Saaduddin, Husin dan Mardiah menggambarkan pelacakan historis Sandiwara Amal yang telah dimulai dari tahun 2005 hingga tahun 2022.Terdapat perubahan secara dramaturgis pada teater rakyat ini. keunikannya adalah caranya untuk tetap dapat bertahan dengan sistem penjualan tiket. Melalui gambaran ini memungkinkan pembaca untuk memahami kearifan lokal yang tersembunyi selama ini dari riuhnya geliat teater modern dan kontemporer hari ini di Indonesia.\r\n\r\nBuku ini mencoba menggambarkan dengan rinci bagaimana Sandiwara Amal telah menjadi bagian tak terpisahkan dari kehidupan masyarakat setempat. Pertunjukan ini, seiring dengan perubahan dalam masyarakat, terus mengalami evolusi yang menarik. Penulis tidak hanya mencermati perubahan tersebut, tetapi juga berusaha untuk memahami peran Sandiwara Amal dalam perubahan tersebut dan bagaimana pertunjukan ini beradaptasi dengan perubahan sosial, ekonomi, dan budaya.'),
(86, 'L002', 'image/OL1.png', 'Buku Industri Olahraga: Optimalisasi Potensi Olahraga Daerah dalam Mengembangkan Perekonomian Masyarakat', 2, '	Bayu Iswana dkk', 'Deepublish', 2023, 'X', 108, 34, 34, 'Buku yang berada di tangan pembaca merupakan sebuah telaah mendalam tentang hubungan yang kompleks antara potensi olahraga daerah sebagai sarana mengembangkan perekonomian masyarakat. Penulisnya merupakan beberapa dosen pendidikan jasmani ataupun keolahragaan, menggali dari berbagai sisi dengan pendekatan utama pada industri olahraga.\r\n\r\nBuku ini memuat sembilan bab yang merefleksikan beragam problematika, tantangan, ataupun peluang pengembangan industri olahraga di Indonesia. Para penulis berangkat dari fakta, fenomena atas pengamatan sekitar mereka. Hadirnya buku ini sekaligus mengisi literasi tentang manajemen dan bisnis keolahragaan.'),
(87, 'L003', 'image/OL2.png', 'Buku Filsafat Tubuh dan Olahraga', 2, 'Made Pramono., Toho Cholik Mutohir', 'Deepublish', 2023, 'X', 159, 23, 23, 'Buku Ilmu Keolahragaan sebenarnya dituliskan dalam bidang filsafat. Untuk memudahkan identifikasi jenis keilmuan, judul ini dibuat dengan penekanan pada kepakaran kedua penulis sebagai dosen S1, S2, maupun S3 di bidang filsafat (olahraga). Beberapa isu substansial terkait karakter ontologi, epistemologi, dan aksiologi sebagai cabang bidang filsafat yang paling banyak dikenal di Indonesia diuraikan secara mendalam dengan mempertimbangkan isu-isu baru yang relevan yang terkait.'),
(88, 'L004', 'image/OL3.png', 'Buku Epidemiologi Olahraga Penerapan Epidemiologi dalam Penelitian Olahraga', 2, 'Prof. Dr. dr. Mahalul Azam, M.Kes., dr. Arulita Ika Fibriana, M.Kes (Epid)., Muhammad Zakki Saefurrohim, S.K.M, M.Kes., Rina Sulistiana, S.K.M', 'Deepublish', 2023, 'X', 80, 33, 33, 'Buku ini mengupas secara komprehensif penerapan epidemiologi dalam konteks penelitian olahraga. Bidang olahraga, dengan segala dinamikanya, menjadi salah satu aspek penting dalam kehidupan kita. Seiring dengan perubahan pola hidup masyarakat yang semakin modern, pemahaman yang mendalam mengenai epidemiologi dalam olahraga menjadi semakin relevan. Buku ini akan membantu Anda memahami dasar-dasar epidemiologi dalam konteks olahraga, serta bagaimana konsep-konsep epidemiologi ini dapat diterapkan dalam berbagai jenis penelitian olahraga.\r\n\r\nBuku ini dimulai dengan sebuah Tinjauan Umum Epidemiologi di Bidang Olahraga yang akan membantu pembaca memahami dasar-dasar epidemiologi, seperti konsep dasar, surveilans, faktor risiko, dan prevalensi penyakit dalam konteks olahraga. Selanjutnya, buku ini menguraikan berbagai jenis studi yang dapat digunakan dalam penelitian olahraga, mulai dari Studi Eksperimental yang dirancang untuk menguji efek intervensi hingga Studi Cohort yang mengikuti kelompok individu dari waktu ke waktu untuk mengidentifikasi asosiasi antara eksposur dan hasil kesehatan.\r\n\r\nBuku ini juga membahas Studi Kasus Kontrol yang bermanfaat untuk mengeksplorasi penyebab penyakit langka dalam populasi atlet, Studi Cross-Sectional yang memberikan gambaran prevalensi kondisi kesehatan pada suatu titik waktu tertentu, serta Studi Case Report/Case Series yang dapat memberikan wawasan mendalam tentang kondisi kesehatan unik dalam dunia olahraga.\r\n\r\nSelain itu, buku ini membahas metode modifikasi seperti Nested Case-Control dan Case-Cohort studies, yang memberikan pendekatan khusus dalam penelitian olahraga untuk menggali lebih dalam hubungan antara eksposur dan penyakit. Anda juga akan mempelajari tentang Studi Treatment Komunitas yang fokus pada intervensi dalam komunitas olahraga, serta bagaimana menerapkan metode Systematic Review untuk mengintegrasikan bukti-bukti dari berbagai penelitian dalam satu analisis yang komprehensif.'),
(89, 'C003', 'image/AGAMA2.png', 'Buku Pendidikan Agama Islam', 8, 'Alif Lukmanul Hakim, S.Fil., M.Phil.', 'Deepublish', 2023, 'X', 95, 34, 34, 'Islam memiliki visi misi untuk memberikan rahmat ke semesta alam, itu artinya bahwa agama Islam tidak hanya diprioritaskan kepada umat manusia saja, namun kepada seluruh makhluk yang ada dalam alam semesta meliputi tumbuhan, hewan, udara, planet, angkasa, asteroid dan lainnya. Oleh sebab itu, Islam merupakan agama yang tidak mendikotomi kepada semua makhluk, namun agama Islam memprioritaskan bagi seorang mukmin yang takwa kepada Allah akan diberikan sebuah ganjaran yang luar biasa di akhirat kelak.\r\n\r\nBuku Pendidikan Agama Islam ini terdiri atas 12 (dua belas) bab dan membahas mulai dari akidah Islam dan fitrah manusia; Islam, agama para nabi dan keistimewaannya; rukun iman dan pembatalnya; ibadah salat dalam Islam; ibadah zakat dalam Islam; ibadah puasa dalam Islam; ibadah haji dalam Islam; akhlak dalam Islam; akhlak muslim terhadap orang tua, keluarga, dan masyarakat; akhlak menuntut ilmu; akhlak terhadap muslim dan nonmuslim; hingga tasawuf Islam.\r\n\r\nSemoga buku ini bermanfaat bagi segenap pembaca sebagai sumber referensi yang dapat memperkaya khazanah kepustakaan dan ilmu pengetahuan. Selamat membaca!'),
(90, 'D003', 'image/sosial2.png', 'Buku Metode Penelitian Pembangunan Sosial', 9, 'Susetiawan, dkk', 'Deepublish', 2023, 'X', 254, 27, 27, 'Metode penelitian merupakan jembatan yang lurus bagi peneliti untuk menemukan kebenaran ilmiah. Kepatuhan pada arahan metode penelitian memudahkan kebenaran itu terungkap secarajelas dan utuh. Oleh karena itu, narasi eksplanatif tentang bagaimana menerapkan metode penelitian harus mudah dipahami oleh peneliti. Kumpulan narasi tersebut disusun dalam suatu dokumen tertulis secara terstruktur, sistematis, dan lengkap dalam bentuk buku teks. Agar ia mudah dipahami, narasi dalam buku tetap berpedoman pada bahasa-bahasa teknis yang sederhana dan disertai dengan contoh-contoh pengalaman praktis.\r\n\r\nBuku ini sengaja disiapkan untuk peneliti muda dan mahasiswa yang berminat mengkaji isu sosial kemasyarakatan pada umumnya dan secara khusus mengenai isu pembangunan sosial.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(1, 'Buku Novel', '2003'),
(2, 'Buku Fiksi', '2004'),
(3, 'Buku Sejarah', '2005'),
(4, 'Buku Psikologi', '2006'),
(5, 'Buku Komputer', '2008');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `nama`, `email`, `keperluan`, `tanggal`, `waktu`) VALUES
(7, 'Rahma Vika Safitri', 'rvikasafitri@gmail.com', 'Cari Buku', '2024-01-08', '15:07:27'),
(8, 'aew', 'riansyahdivano14@gmail.com', 'wew', '2024-01-10', '21:13:23'),
(13, 'Riansyah Divano', 'riansyahdivano14@gmail.com', 'Belajar di perpustakaan', '2024-01-10', '21:34:26'),
(14, 'Riansyah Divano', 'riansyahdivano14@gmail.com', 'Belajar di perpustakaan', '2024-01-10', '21:34:26'),
(15, 'wqdwqd', 'sdfesf@email.com', 'qeq3wed', '2024-01-11', '06:41:32'),
(16, 'Thoriq Slebew', 'kawakawa69@gmail.com', 'Main Valoranat', '2024-01-12', '08:38:32'),
(17, 'vm', 'vm@mail.com', 'sleepcal', '2024-01-12', '00:08:46'),
(18, 'aejabfba', 'aejfejb@mail.com', 'dnedn', '2024-01-12', '00:09:29'),
(19, 'aejabfba', 'aejfejb@mail.com', 'dnedn', '2024-01-12', '00:09:29'),
(20, 'admin', 'admin@mail.com', 'nefefefel', '2024-01-12', '00:10:53'),
(21, 'admin', 'admin@mail.com', 'nefefefel', '2024-01-12', '00:10:53'),
(22, 'esklsc', 'sejfn@mail.com', 'eslifj', '2024-01-12', '00:12:23'),
(23, 'sdefiojesjf', 'afjbJAn@mail.com', 'hesbgffk', '2024-01-12', '00:16:42'),
(24, 'eljdm', 'ksefjo@mail.com', 'jsebfes', '2024-01-12', '00:18:42'),
(25, 'eljdm', 'ksefjo@mail.com', 'jsebfes', '2024-01-12', '00:18:42'),
(26, 'Riansyah Divano', 'sdfesf@email.com', 'mabar', '2024-01-13', '09:12:00'),
(27, 'hafi', 'ayam@mail.com', 'gaada', '2024-01-13', '09:30:08'),
(28, 'hafi', 'ayam@mail.com', 'gaada', '2024-01-13', '09:30:08'),
(29, 'hafi', 'ayam@mail.com', 'gaada', '2024-01-13', '09:32:59'),
(30, 'hafi', 'ayam@mail.com', 'gaada', '2024-01-13', '09:34:14'),
(31, 'admin', 'sedf@sfm', 'gaada', '2024-01-13', '09:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `nim` varchar(26) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jurusan` enum('Teknik Mesin','Teknik Sipil','Teknik Elektro','Teknologi Informasi','Bahasa Inggris','Administrasi Niaga','Akuntansi') NOT NULL,
  `status` varchar(26) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `no_tlpn` varchar(56) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`nim`, `nama`, `jurusan`, `status`, `gender`, `no_tlpn`, `alamat`) VALUES
('2201092019', 'pustakawan', '', 'Dosen', 'L', '08xxxxxxxxx', 'Padang'),
('2201092031', 'Riansyah Divano', 'Teknologi Informasi', 'Mahasiswa', 'L', '08xxxxxxxxxx', 'Jl. Padang'),
('2384732', 'ejndf', 'Teknologi Informasi', 'Mahasiswa', 'L', '43289472', 'sekjfnsf'),
('ey3889e', 'babii', 'Teknik Mesin', 'Mahasiswa', 'L', '3892982', 'adskj');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nim` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nim`, `nama`, `kode_buku`, `judul_buku`, `tgl_pinjam`, `tgl_pengembalian`, `status`) VALUES
(20, '2201091011', 'Rahma Oktavia', '444', 'Hujan', '2024-01-01', '2024-01-07', 'Kembali'),
(21, '2201091012', 'Rahma Vika Safitri', '390', 'Self Healing', '2024-01-08', '2024-03-25', 'Kembali'),
(22, '2201091012', 'Rahma Vika Safitri', '34', 'Si Anak Spesial', '2024-01-08', '2024-01-15', 'Kembali'),
(23, '2201091012', 'Rahma Vika Safitri', '33333', 'Pergii', '2024-01-08', '2024-01-15', 'Kembali'),
(24, '2201092031', 'Riansyah Divano', 'A001', 'Pemeliharaan Sistem Pneumatik Dan Hidrolik', '2024-01-13', '2024-01-27', 'Kembali'),
(25, '2201092031', 'Riansyah Divano', 'A005', 'Membuat Larutan Kimia di Laboratorium', '2024-01-13', '2024-01-20', 'pinjam'),
(26, '2201092019', 'pustakawan', 'A004', 'Parasitologi I Teori dan Praktikum untuk Mahasiswa Teknologi Laboratorium Medik', '2024-01-13', '2024-01-20', 'pinjam'),
(27, '2201092031', 'Riansyah Divano', 'L001', 'Buku Industri Olahraga: Optimalisasi Potensi Olahraga Daerah dalam Mengembangkan Perekonomian Masyarakat', '2024-01-07', '2024-01-14', 'pinjam'),
(28, '2384732', 'ejndf', 'A012', 'Sistem Komputer', '2024-01-07', '2024-01-15', 'pinjam'),
(29, '2201092019', 'pustakawan', '444', 'Hujan', '2024-01-01', '2024-01-13', 'pinjam'),
(30, 'ey3889e', 'babii', 'L001', 'Buku Industri Olahraga: Optimalisasi Potensi Olahraga Daerah dalam Mengembangkan Perekonomian Masyarakat', '2023-12-31', '2024-01-13', 'pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'GagasMedia'),
(2, 'Republika'),
(3, 'Gramedia'),
(4, 'Erlangga'),
(5, 'Deepublish');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` int(11) NOT NULL,
  `nama_pengarang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`) VALUES
(1, 'Tere Liye'),
(2, 'Hebert Adrianto');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(26) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('admin','pustakawan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama`, `password`, `level`) VALUES
(4, 'vika@gmail.com', 'admin', 'vik', 'admin'),
(5, 'admin@gmail.com', 'admin', 'admin', 'admin'),
(6, 'pustakawan@gmail.com', 'pustakawan', 'pustakawan', 'pustakawan'),
(8, 'riansyahdivano29@gmail.com', 'vano', '1234', 'admin'),
(10, 'test@gmail.com', 'admin', 'test', 'pustakawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id_pengarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(26) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
