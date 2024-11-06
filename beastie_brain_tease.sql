-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2024 pada 11.23
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beastie_brain_tease`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

create database beastie_brain_tease;
use beastie_brain_tease;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul_materi` varchar(255) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `materi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `judul_materi`, `mata_pelajaran`, `materi`) VALUES
(1, 'Singa', 'Biologi', 'Singa (Panthera leo) adalah hewan karnivora yang hidup di padang savana Afrika dan beberapa bagian Asia. Hewan ini dikenal sebagai \"raja hutan\" meskipun tidak hidup di hutan, melainkan di area terbuka. Singa hidup dalam kelompok yang disebut \"pride,\" di mana anggota kelompok ini terdiri dari betina, anak-anak, dan beberapa pejantan. Pride memungkinkan singa berburu dalam kelompok, membuat mereka lebih efektif dalam menangkap mangsa besar seperti zebra dan antelop.\r\nFakta unik tentang singa adalah bahwa mereka merupakan satu-satunya jenis kucing besar yang hidup berkelompok. Hubungan dalam kelompok ini sangat kuat, dan singa betina sering kali saling membantu merawat anak-anak mereka. Keuntungan lain dari kelompok ini adalah singa jantan dapat melindungi pride dari ancaman predator lain atau singa jantan yang ingin merebut wilayah mereka.\r\nSinga memiliki adaptasi fisik yang kuat. Mereka memiliki otot yang besar, gigi taring yang tajam, dan cakar kuat untuk menangkap mangsa. Selain itu, suara auman singa bisa terdengar hingga jarak 8 kilometer, digunakan untuk berkomunikasi dan menandai wilayah. Singa juga memiliki stamina tinggi, meskipun mereka lebih sering beristirahat dan hanya aktif pada waktu tertentu, terutama saat senja dan fajar.\r\nHabitat singa kini semakin berkurang karena perburuan dan perubahan iklim. Meski mereka dilindungi di berbagai taman nasional, populasi singa terus menurun akibat perburuan ilegal dan konflik dengan manusia. Konservasi singa dilakukan melalui berbagai upaya, seperti membatasi perburuan liar dan melindungi habitat alami mereka.\r\nSinga memiliki peran penting dalam ekosistem savana sebagai predator puncak. Mereka membantu menjaga keseimbangan populasi herbivora, yang bila tidak terkendali bisa menghabiskan vegetasi dan mengganggu keseimbangan ekosistem. Kehadiran singa juga membantu mengontrol populasi mangsa sehingga spesies tanaman tidak mengalami kerusakan parah.\r\n'),
(2, 'Hiu', 'Biologi', 'Hiu adalah predator laut yang termasuk dalam kelas Chondrichthyes, dengan kerangka tubuh yang terbuat dari tulang rawan. Mereka hidup di berbagai perairan di seluruh dunia, dari perairan dangkal hingga lautan dalam. Hiu memiliki kemampuan mendeteksi listrik dalam air yang membuat mereka efektif dalam berburu bahkan di kondisi gelap atau berlumpur.\r\nFakta unik tentang hiu adalah bahwa mereka memiliki indera penciuman yang sangat tajam, sehingga mereka bisa mendeteksi setetes darah dalam satu juta tetes air. Hal ini membantu mereka menemukan mangsa dari jarak jauh. Hiu juga memiliki organ yang disebut \"ampula Lorenzini\" yang membantu mereka mendeteksi medan listrik dari mangsa yang bergerak.\r\nHiu memiliki berbagai jenis pola makan, tergantung pada spesiesnya. Ada hiu yang memakan ikan kecil, plankton, hingga hiu yang memangsa anjing laut dan ikan besar. Hiu juga berperan sebagai predator puncak di lautan, membantu menjaga keseimbangan populasi spesies laut lainnya, yang sangat penting bagi kelestarian ekosistem laut.\r\nMeskipun sering dianggap berbahaya, serangan hiu terhadap manusia sebenarnya jarang terjadi. Banyak hiu lebih takut pada manusia karena ancaman penangkapan dan perburuan sirip hiu yang mengancam keberlangsungan mereka. Banyak spesies hiu saat ini terancam punah, terutama akibat overfishing dan penangkapan yang berlebihan.\r\nUpaya konservasi hiu telah dilakukan melalui penetapan kawasan perlindungan laut dan pelarangan perdagangan sirip hiu di beberapa negara. Hiu berperan penting dalam kesehatan lautan, dan keberadaan mereka membantu menjaga keseimbangan rantai makanan di lingkungan laut.\r\n'),
(3, 'Panda', 'Biologi', 'Panda (Ailuropoda melanoleuca) adalah spesies beruang besar asal China yang dikenal dengan pola hitam dan putih khas pada bulunya. Mereka tinggal di hutan bambu di pegunungan tinggi, terutama di provinsi Sichuan dan sekitarnya di China. Panda dikenal sangat unik karena 99% makanannya terdiri dari bambu, meskipun mereka termasuk keluarga karnivora.\r\nFakta unik tentang panda adalah bahwa meskipun mereka karnivora, mereka telah beradaptasi menjadi herbivora dengan makan bambu. Panda memiliki struktur gigi dan sistem pencernaan karnivora, tetapi mereka mengonsumsi bambu dalam jumlah besar karena bambu kurang memiliki nilai nutrisi. Ini membuat panda menghabiskan banyak waktu setiap hari untuk makan, hingga 14 jam sehari.\r\nPanda memiliki adaptasi fisik khusus, termasuk jempol palsu yang memungkinkan mereka menggenggam bambu dengan kuat. Mereka juga memiliki lapisan lemak tebal yang melindungi tubuh mereka dari dinginnya habitat pegunungan. Panda adalah hewan soliter, kecuali saat musim kawin, dan anak-anaknya akan tinggal bersama induknya selama beberapa waktu sebelum mandiri.\r\nSaat ini, panda dianggap sebagai hewan dilindungi karena habitatnya yang terbatas dan angka kelahiran yang rendah. Konservasi panda telah dilakukan dengan ketat oleh pemerintah China, melalui perlindungan habitat, pusat penangkaran, dan program konservasi internasional. Perubahan iklim juga memengaruhi habitat bambu, yang menjadi sumber makanan utama mereka.\r\nPanda memiliki peran ekologis yang penting di habitatnya, terutama dalam mendukung keberlangsungan ekosistem hutan bambu. Dengan makan bambu, mereka membantu mengontrol pertumbuhan bambu sehingga tidak menguasai habitat, memungkinkan tanaman lain juga bisa tumbuh dan mendukung berbagai spesies.\r\n \r\n'),
(4, 'Gajah', 'Biologi', 'Gajah adalah mamalia darat terbesar di dunia, dengan spesies utama yang dikenal yaitu gajah Afrika dan gajah Asia. Gajah memiliki belalai panjang yang berfungsi untuk berbagai keperluan, seperti minum, mengambil makanan, hingga berkomunikasi. Gajah merupakan hewan herbivora yang mengonsumsi rumput, daun, buah, dan kulit pohon.\r\nFakta unik tentang gajah adalah bahwa mereka memiliki ingatan yang sangat tajam, yang membuat mereka mampu mengingat rute perjalanan atau anggota kelompok mereka dalam waktu lama. Gajah juga dikenal sangat sosial dan hidup dalam kelompok yang dipimpin oleh seekor betina yang lebih tua, yang disebut sebagai matriark.\r\nGajah memainkan peran penting dalam ekosistem mereka sebagai \"engineer\" alami. Dengan merobohkan pohon-pohon kecil, mereka membuka area hutan sehingga memungkinkan tanaman lain tumbuh dan menciptakan habitat bagi hewan kecil. Selain itu, kotoran gajah membantu menyebarkan benih yang memungkinkan regenerasi tanaman di habitat mereka.\r\nAncaman utama bagi gajah adalah perburuan gading yang ilegal dan perusakan habitat. Gajah sering terancam oleh perburuan gading yang bernilai tinggi di pasar gelap. Untuk melindungi mereka, banyak negara telah melarang perdagangan gading dan memberlakukan kawasan lindung.\r\nKonservasi gajah sangat penting karena gajah memiliki dampak positif yang besar pada ekosistem mereka. Mereka membantu menjaga keseimbangan antara populasi tumbuhan dan hewan, serta menyediakan habitat bagi berbagai spesies lainnya di hutan dan savana.\r\n'),
(5, 'Burung Elang', 'Biologi', 'Elang adalah burung pemangsa yang termasuk ke dalam keluarga Accipitridae. Mereka memiliki penglihatan tajam, cakar kuat, dan paruh melengkung yang tajam untuk berburu mangsa seperti ikan, mamalia kecil, dan burung lain. Elang tersebar luas di seluruh dunia dan dapat ditemukan di berbagai habitat, mulai dari pegunungan, hutan, hingga daerah pesisir.\r\nFakta unik tentang elang adalah bahwa mereka dapat melihat dengan sangat jelas bahkan pada jarak yang jauh. Mata elang memiliki ketajaman penglihatan sekitar 4 hingga 8 kali lebih baik daripada manusia. Ini memungkinkan mereka untuk mengamati mangsa dari ketinggian dan menukik dengan kecepatan tinggi untuk menangkapnya.\r\nElang memiliki peran penting dalam rantai makanan sebagai predator puncak. Dengan memangsa hewan kecil, mereka membantu mengendalikan populasi hama dan mempertahankan keseimbangan ekosistem. Elang juga dikenal dengan kemampuan mereka membangun sarang besar di tempat-tempat tinggi untuk melindungi telur dan anak-anak mereka.\r\nMeski sebagian besar populasi elang aman, beberapa spesies elang terancam punah karena perusakan habitat dan perubahan iklim. Konservasi elang dilakukan melalui pelestarian habitat, dan beberapa spesies dilindungi oleh undang-undang untuk mencegah perburuan liar.\r\nKeberadaan elang sangat penting bagi lingkungan. Mereka adalah indikator kesehatan ekosistem, dan kelangsungan hidup mereka menandakan bahwa ekosistem di mana mereka hidup sehat dan seimbang.\r\n'),
(6, 'Rafflesia Arnoldii\r\n', 'Biologi', 'Rafflesia arnoldii, dikenal sebagai bunga terbesar di dunia, tumbuh di hutan hujan tropis Sumatra dan Kalimantan di Indonesia. Bunga ini terkenal dengan bau menyengat seperti daging busuk, yang menarik serangga, terutama lalat, untuk membantu penyerbukan. Bau ini memberi Rafflesia julukan \"bunga bangkai.\"\r\nFakta unik tentang Rafflesia adalah bahwa ia merupakan parasit yang tidak memiliki daun, batang, atau akar. Bunga ini tumbuh langsung pada jaringan tanaman inangnya, biasanya dari genus Tetrastigma, dan mendapatkan semua nutrisi dari inang tersebut. Rafflesia hanya muncul dalam waktu singkat, antara 5 hingga 7 hari, sebelum layu dan mati.           	\r\nRafflesia memerlukan kondisi yang sangat spesifik untuk tumbuh, termasuk kelembaban tinggi dan kehadiran tanaman inang yang sesuai. Proses reproduksi Rafflesia pun sulit karena membutuhkan waktu lama bagi kuncup bunga untuk matang, yang dapat memakan waktu hingga satu tahun. Ini menjadi salah satu alasan mengapa bunga ini langka.\r\nHabitat Rafflesia semakin terancam oleh deforestasi dan perusakan hutan tropis. Perlindungan habitatnya menjadi fokus utama untuk melestarikan spesies ini, dan beberapa kawasan konservasi telah didirikan di Indonesia untuk melindungi keberadaannya.\r\nSelain keunikannya, Rafflesia juga menjadi simbol penting keanekaragaman hayati Indonesia. Upaya pelestariannya terus diupayakan agar bunga ini tetap bisa dinikmati oleh generasi mendatang dan menjadi kebanggaan flora nasional.\r\n'),
(7, 'Anggrek', 'Biologi', 'Anggrek (Orchidaceae) adalah salah satu keluarga tumbuhan berbunga terbesar, dengan ribuan spesies yang tersebar di seluruh dunia, dari daerah tropis hingga pegunungan dingin. Anggrek dikenal karena keindahan bunganya yang beragam dan memiliki struktur unik yang dirancang untuk menarik penyerbuk tertentu.\r\nFakta unik tentang anggrek adalah bahwa beberapa spesies memiliki strategi penyerbukan yang sangat khusus. Misalnya, ada anggrek yang meniru bentuk dan aroma betina dari spesies serangga tertentu untuk menarik jantan, yang kemudian membawa serbuk sari ke bunga lain. Ini disebut \"penipuan seksual\" dalam dunia botani.\r\nAnggrek memiliki adaptasi yang memungkinkan mereka hidup di berbagai kondisi lingkungan. Banyak anggrek tropis hidup sebagai epifit, menempel pada pohon untuk mendapatkan cahaya matahari tanpa mengganggu pohon tersebut. Sistem akar anggrek juga sangat efisien menyerap air dan nutrisi dari lingkungan sekitarnya.\r\nKebanyakan anggrek memerlukan jamur mikoriza untuk bertahan hidup pada tahap awal pertumbuhannya. Ini menciptakan hubungan simbiosis di mana jamur membantu biji anggrek berkecambah dengan menyediakan nutrisi yang diperlukan. Hubungan ini sangat penting bagi pertumbuhan dan keberlanjutan anggrek di alam liar.\r\nSelain keindahannya, anggrek juga memiliki nilai ekonomi tinggi dan banyak dibudidayakan sebagai tanaman hias. Namun, perburuan liar dan perusakan habitat alami mengancam beberapa spesies anggrek, sehingga konservasi dan budidaya berkelanjutan menjadi penting untuk melindungi keanekaragaman anggrek.\r\n'),
(8, ' Kaktus', 'Biologi', 'Kaktus adalah kelompok tanaman yang termasuk dalam keluarga Cactaceae, yang khas tumbuh di daerah kering seperti gurun. Mereka memiliki adaptasi khusus untuk bertahan dalam kondisi kekeringan yang ekstrem. Kaktus menyimpan air dalam batangnya yang tebal dan berduri, yang membantu mengurangi penguapan.\r\nFakta unik tentang kaktus adalah bahwa mereka memiliki kemampuan untuk melakukan fotosintesis pada malam hari, yang disebut Crassulacean Acid Metabolism (CAM). Proses ini memungkinkan mereka menyerap karbon dioksida saat malam, sehingga mereka tidak kehilangan banyak air selama proses fotosintesis di siang hari.\r\nKaktus memiliki duri sebagai pengganti daun, yang berfungsi melindungi mereka dari hewan pemangsa dan mengurangi penguapan air. Batang kaktus dapat membesar untuk menyimpan lebih banyak air selama musim hujan, yang kemudian akan digunakan saat musim kering. Adaptasi ini memungkinkan mereka bertahan hidup dalam kondisi yang sangat kering.\r\nSelain sebagai tanaman gurun, beberapa spesies kaktus juga memiliki nilai ekonomi, seperti kaktus jenis Prickly Pear yang buahnya bisa dimakan dan digunakan dalam industri pangan serta kosmetik. Kaktus lain, seperti peyote, memiliki sejarah penggunaan dalam praktik budaya dan spiritual oleh beberapa suku asli Amerika.\r\nMeskipun kaktus mampu bertahan dalam kondisi ekstrem, mereka tetap rentan terhadap perubahan iklim dan perusakan habitat. Beberapa spesies kaktus kini dilindungi untuk mencegah kepunahan akibat eksploitasi berlebihan.\r\n'),
(9, 'Teratai', 'Biologi', 'Teratai (Nymphaea) adalah tanaman air yang terkenal dengan bunga indahnya dan sering ditemukan di kolam, danau, atau sungai dengan air yang tenang. Teratai dikenal karena kemampuannya untuk hidup di permukaan air dengan akar yang tertanam di dasar perairan. Bunga teratai dapat ditemukan dalam berbagai warna, seperti putih, merah muda, kuning, dan biru.\r\nFakta unik tentang teratai adalah bahwa permukaan daunnya bersifat hidrofobik (tahan air), sehingga selalu bersih meskipun hidup di lingkungan berlumpur. Sifat ini dikenal sebagai efek \"daun teratai\" atau \"lotus effect,\" yang menginspirasi pengembangan bahan-bahan tahan air dalam dunia teknologi.\r\nTeratai memiliki struktur daun yang lebar dan terapung di permukaan air, yang memungkinkan mereka mendapatkan sinar matahari yang cukup untuk fotosintesis. Bunga teratai memiliki mekanisme khusus untuk menarik serangga penyerbuk, seperti kumbang, dengan aroma dan bentuk yang menarik, yang membantu proses penyerbukan.\r\nSelain keindahannya, teratai memiliki peran penting dalam ekosistem perairan. Akar teratai membantu menstabilkan dasar perairan dan mengurangi erosi. Daun yang terapung juga menyediakan tempat berlindung bagi ikan kecil dan invertebrata air, yang menjadikan teratai sebagai habitat penting di perairan.\r\n \r\nTeratai juga memiliki nilai budaya dan simbolisme dalam banyak tradisi, termasuk sebagai simbol kemurnian dalam budaya Asia, terutama dalam tradisi Hindu dan Buddha. Nilai estetika dan makna filosofis teratai membuatnya menjadi tanaman yang sangat dihargai.\r\n'),
(10, 'Pohon Jati', 'Biologi', 'Pohon jati (Tectona grandis) adalah pohon kayu keras yang berasal dari Asia Selatan dan Tenggara, terutama tumbuh di India, Myanmar, dan Indonesia. Pohon jati terkenal karena kayunya yang kuat dan tahan lama, sehingga sering digunakan dalam pembuatan perabot dan konstruksi bangunan.\r\nFakta unik tentang pohon jati adalah bahwa kayunya mengandung minyak alami yang membuatnya tahan terhadap rayap, jamur, dan cuaca ekstrem. Minyak ini juga memberikan warna alami pada kayu jati yang tidak mudah pudar, bahkan setelah digunakan dalam jangka waktu lama.\r\nPohon jati membutuhkan waktu lama untuk tumbuh hingga mencapai ukuran yang cukup untuk ditebang, sekitar 20-25 tahun atau lebih. Oleh karena itu, penanaman pohon jati dilakukan dengan perencanaan jangka panjang. Pohon jati juga memiliki daun lebar yang menggugur pada musim kemarau, yang membantu mengurangi penguapan air.\r\nDi Indonesia, pohon jati banyak ditemukan di daerah Jawa Tengah, dan pengelolaannya dilakukan secara ketat melalui perhutani untuk menjaga kelestariannya. Kayu jati yang dihasilkan oleh pohon ini memiliki nilai ekonomi tinggi karena kualitasnya yang tahan lama dan mudah diproses untuk berbagai kebutuhan.\r\nSelain nilai ekonominya, pohon jati memiliki peran ekologis dalam menjaga keseimbangan hutan. Akar pohon jati yang kuat membantu mencegah erosi dan menjaga kestabilan tanah. Keberadaannya di hutan jati juga menjadi habitat bagi berbagai spesies hewan dan tumbuhan lainnya.\r\n\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_materi`, `soal`, `jawaban`) VALUES
(1, 1, 'Mengapa singa merupakan satu-satunya jenis kucing besar yang hidup berkelompok?  ', 'a) Mereka memerlukan lebih banyak bantuan dalam berburu  \r\nb) Kelompok tersebut membantu melindungi mereka dari predator lain  \r\nc) Pride memungkinkan singa berburu mangsa besar dengan lebih efektif  \r\nd) Singa lebih suka hidup bersama dalam jumlah banyak  \r\n'),
(2, 2, 'Apa fungsi dari organ “ampula Lorenzini” pada hiu?  ', 'a) Membantu hiu mendeteksi medan listrik dari mangsa yang bergerak  \r\nb) Mengatur keseimbangan tubuh hiu di air  \r\nc) Membantu hiu bernafas di kedalaman laut  \r\nd) Menghasilkan darah untuk tubuh hiu  \r\n'),
(3, 3, 'Apa yang dimaksud dengan \"jempol palsu\" pada panda?  ', 'a) Jempol ekstra untuk memegang bambu  \r\nb) Jari tambahan pada kaki belakang  \r\nc) Cakar untuk berburu mangsa  \r\nd) Struktur yang hanya muncul saat musim kawin  \r\n'),
(4, 4, 'Apa peran gajah sebagai \"engineer alami\" dalam ekosistem?  ', 'a) Menciptakan habitat bagi spesies lain dengan merobohkan pohon-pohon kecil  \r\nb) Menjadi pemangsa utama di ekosistem hutan  \r\nc) Mengatur sistem aliran air di sungai  \r\nd) Mengontrol populasi hewan herbivora besar  \r\n'),
(5, 5, 'Mengapa elang dianggap memiliki ketajaman penglihatan yang luar biasa?  ', 'a) Karena dapat melihat di kegelapan total  \r\nb) Karena dapat mengidentifikasi warna lebih banyak  \r\nc) Karena memiliki ketajaman 4-8 kali lebih baik dari manusia  \r\nd) Karena memiliki sistem sonar  \r\n'),
(6, 5, 'Apa alasan utama mengapa Rafflesia dikenal sebagai \"bunga bangkai\"?  ', 'a) Karena memiliki warna merah seperti darah  \r\nb) Karena berbau menyengat seperti daging busuk  \r\nc) Karena hanya tumbuh di musim kemarau  \r\nd) Karena hidup di tanah berpasir  \r\n'),
(7, 7, 'Apa strategi penyerbukan yang digunakan beberapa spesies anggrek?  ', 'a) Meningkatkan kadar fotosintesis  \r\nb) Meniru bentuk dan aroma betina serangga tertentu  \r\nc) Menyerap sinar UV untuk menarik lebah  \r\nd) Menghasilkan buah dengan warna mencolok  \r\n'),
(8, 8, 'Apa yang memungkinkan kaktus melakukan fotosintesis tanpa kehilangan banyak air? ', 'a) Mereka menyimpan banyak air di batang  \r\nb) Mereka melakukan Crassulacean Acid Metabolism (CAM)  \r\nc) Mereka berfotosintesis hanya pada siang hari  \r\nd) Mereka tidak memerlukan fotosintesis  \r\n'),
(9, 9, 'Apa manfaat \"efek daun teratai\" pada permukaan daun teratai? ', 'a) Membantu proses penyerbukan  \r\nb) Membuat daun tetap bersih dan bebas dari kotoran  \r\nc) Menarik ikan kecil untuk berlindung  \r\nd) Meningkatkan kemampuan fotosintesis daun \r\n'),
(10, 10, 'Apa manfaat \"efek daun teratai\" pada permukaan daun teratai? ', 'a) Kandungan air yang rendah  \r\nb) Minyak alami pada kayunya  \r\nc) Tekstur kayu yang sangat keras  \r\nd) Bentuk daun yang lebar  \r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `level_kuis_hewan` varchar(255) NOT NULL DEFAULT '0',
  `level_kuis_tumbuhan` varchar(255) NOT NULL DEFAULT '0',
  `level_game` varchar(255) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `progress_kuis_hewan` varchar(255) NOT NULL DEFAULT '0%',
  `progress_kuis_tumbuhan` varchar(255) NOT NULL DEFAULT '0%',
  `progress_game` varchar(255) NOT NULL DEFAULT '0%'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `image`, `level_kuis_hewan`, `level_kuis_tumbuhan`, `level_game`, `created_at`, `progress_kuis_hewan`, `progress_kuis_tumbuhan`, `progress_game`) VALUES
(1, 'defri', '123', '', 'no-photo.png', '0', '0', '0', '2024-10-24 12:06:58', '0%', '0%', '0%');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_materi` (`id_materi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
