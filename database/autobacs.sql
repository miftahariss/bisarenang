-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Mei 2016 pada 06.37
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autobacs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` text NOT NULL,
  `body` text NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `id_account`, `title`, `short_desc`, `body`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(2, 1, 'Autobacs Indonesia – pada awal mulanya', 'Kehadiran Autobacs di Indonesia dimulai dengan terbentuknya PT Autobacs Indomobil Indonesia, yang merupakan joint venture antara Autobacs Seven Co., Ltd, Jepang dengan PT Central Sole Agency, yang merupakan subsidiary dari PT Indomobil Sukses Internasional Tbk. pada tanggal 22 Juli 2013. Autobacs Indonesia mempunyai misi memperkenalkan gaya hidup bermobil (automotive lifestyle) yang sudah maju dari Jepang, yaitu berupa produk unik dengan “kodawari” khas Jepang dan layanan berstandar Jepang, supaya kehidupan bermobil orang Indonesia menjadi lebih aman, nyaman dan menyenangkan.', '<p style="margin: 30px 0px 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 20px; font-family: Abel, sans-serif; vertical-align: baseline; text-indent: 24px; color: rgb(34, 34, 34);">Kehadiran Autobacs di Indonesia bukan hanya merupakan kepanjangan ekspansi dari Autobacs Jepang, tetapi merupakan momen khusus di mana di Indonesia kami memperkenalkan konsep baru, yaitu menghadirkan &ldquo;Automotive Lifestyle Center&rdquo; yang bernuansa butik.</p>\n\n<p><img src="http://localhost/autobacs_countdown/assets/images/about_image-1.jpg" style="border: 0px; vertical-align: baseline; max-width: 100%; margin: 30px auto 0px; padding: 0px; font-stretch: inherit; font-size: medium; line-height: 16px; font-family: ''Times New Roman''; display: block; color: rgb(34, 34, 34);" /></p>\n\n<p style="margin: 30px 0px 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 20px; font-family: Abel, sans-serif; vertical-align: baseline; text-indent: 24px; color: rgb(34, 34, 34);">Produk-produk kami, yang sebagian besar berasal dari Jepang, kami sajikan dalam beberapa tema yang diusung dari kehidupan sehari-hari orang Indonesia, untuk memudahkan pelanggan memilih barang, dan juga menambah wawasan akan adanya produk-produk baru, karena &ldquo;Yang tidak kita pikirin, ternyata dipikirin dengan detail oleh orang Jepang&rdquo;.</p>\n\n<p><img src="http://localhost/autobacs_countdown/assets/images/about_image-2.jpg" style="border: 0px; vertical-align: baseline; max-width: 100%; margin: 30px auto 0px; padding: 0px; font-stretch: inherit; font-size: medium; line-height: 16px; font-family: ''Times New Roman''; display: block; color: rgb(34, 34, 34);" /></p>\n\n<p style="margin: 30px 0px 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 20px; font-family: Abel, sans-serif; vertical-align: baseline; text-indent: 24px; color: rgb(34, 34, 34);">Kami menginginkan agar para pelanggan kami dapat mengalami shopping experience yang beda dari yang lain, yang belum pernah ada di dunia otomotif. Bagaikan tanaman yang baru tumbuh, tunas Autobacs Indonesia membutuhkan kunjungan, dukungan, dan masukan dari para pelanggan Indonesia, agar kami dapat tumbuh besar menjalankan misi kami, membuat pengalaman bermobil di Indonesia lebih aman, nyaman dan menyenangkan. Karena memang, merawat mobil belum pernah semenyenangkan ini.</p>\n\n<p style="margin: 30px 0px 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 20px; font-family: Abel, sans-serif; vertical-align: baseline; text-indent: 24px; color: rgb(34, 34, 34);">AUTOBACS. HAPPY CAR. HAPPY PEOPLE.</p>\n', 0, 1448617844, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `video_id` varchar(100) DEFAULT NULL,
  `body` text,
  `filename` varchar(125) NOT NULL,
  `home` int(11) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `id_account`, `id_kategori`, `title`, `short_desc`, `video_id`, `body`, `filename`, `home`, `permalink`, `meta_keywords`, `meta_description`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(7, 1, 2, 'AUTOBACS Surabaya : HAPPY CAR.  HAPPY PEOPLE.', 'Konnichiwa Indonesia! Now we’re open. Itulah kata sambutan dari one stop shopping Automotive lifestyle dari Jepang, Autobacs. Yes guys akhirnya toko one stop shoping otomotif dari Jepang yang biasanya hanya kita lihat logo dan namanya di majalah otomotif ', '', '<p>Konnichiwa Indonesia! Now we&rsquo;re open. Itulah kata sambutan dari one stop shopping Automotive lifestyle dari Jepang, Autobacs. Yes guys akhirnya toko one stop shoping otomotif dari Jepang yang biasanya hanya kita lihat logo dan namanya di majalah otomotif import, mobil balap ( Sponsor Utama Super GT Japan dan D1 GP Japan), dan internet kini hadir di Indonesia.</p>\n\n<p>Autobacs Seven adalah perusahaan ritel pelopor pelayanan satu atap dan toko serba ada di Jepang yang berdiri pada tahun 1974&nbsp; di kota Osaka, Jepang. Layanannya tersedia untuk barang-barang otomotif, layanan instalasi, penjualan dan pembelian mobil, perawatan mobil dan inspeksi, serta pengecatan.</p>\n\n<p>Bertempat di Jl. Arif Rahman Hakim No. 60 (MERR) Surabaya berdiri the 1st Autobacs Store in Indonesia. Di Asia Tenggara, Indonesia menjadi negara keempat tujuan ekspansi bisnis Autobacs, setelah Singapura, Thailand dan Malaysia. Autobacs memiliki tiga gerai di Singapura, empat di Thailand dan satu gerai di Malaysia. Sementara di seluruh dunia gerainya mencapai 500 gerai.</p>\n\n<p>Di Indonesia sendiri Autobacs masuk melalui PT Central Sole Agency yang merupakan anak usaha dari PT Indomobil Sukses Internasional Tbk (IMSI) . Yang&nbsp; kemudian Indomobil mendirikan PT Autobacs Indomobil Indonesia.</p>\n\n<p>Jika Anda membayangkan gerai Autobacs Indonesia seperti gerainya di Jepang yang berkonsep supermarket, maka di Indonesia konspenya berubah menjadi sebuah gallery atau toko layaknya di semua mall.</p>\n\n<p>Suasananya sendiri serasa seperti kita sedang shopping di sebuah toko di mall, lengkap dengan beberapa sofa dan free drink di titik yang membuat kita merasa nyaman selagi berbelanja</p>\n\n<p>&ldquo;Titik tolak Autobacs Jepang adalah pada barangnya, maka di Indonesia pada orangnya. Target Autobacs Indonesia sendiri adalalah pria dan wanita, terutama mereka memiliki mobil dan uang tapi belum masuk kedunia aftermarket (belum mengutak-ngatik mobilnya) mungkin karena tempatnya tidak nyaman.</p>\n\n<p>Karena itu konsep di Indonesia kami rubah menjadi konsep shopping experience yang sesuai dengan gaya hidup mereka yang nyaman, desain storenya sesuai dengan yang sekarang sedang trend, lalu pemetaan barangnya juga bukan lagi perkategori, tapi lebih tergantung kepada kebutuhan atau lifestyle orangnya&rdquo; terang Djoni Sutanto Direktur PT. Autobacs Indomobil Indonesia.</p>\n\n<p>Desain interior ataupun eksterior pada Autobacs Surabaya (Indonesia) selain tugasnya untuk mempercantik dan memperindah ruangan, ternyata memiliki makna tersembunyi. Untuk desain showroom di Indonesia diberikan nuansa budaya Jepang. Yaitu desain atau motif berupa pattern atau corak yang diambil dari tempurung kura-kura (dalam bahasa Jepang, Kame) yang mempunyai arti umur yang panjang. Dan di Indonesialah hal di perkenalkan pertama kali yang dimana dimaksudkan untuk peremajaan Autobacs yang sudah berumur sekitar 40 tahun. Dimana nantinya Kame ini akan digunakan untuk Autobacs seluruh dunia atau global</p>\n\n<p>Desain interironya pun dirancang langsung oleh desain interior asal Jepang yang sesuai dengan alur kerja dan juga jiwa atau soul Autobacs Jepang, namun tetap disesuaikan dengan konsep untuk Indonesia.</p>\n\n<p>Ketika Anda berkunjung ke Autobacs Indonesia Anda mungkin serasa sedang berada di Jepang dan berada di dalam sebuah toko nya karena semua barang yang dijual disini adalah made in Japan lengkap dengan bahasa Jepangnya.</p>\n\n<p>Ada sekitar 7 kategori, Convenient Care , Mom &amp; baby , look different, Her World , Cozy Long Drive, First Aid, dan Basic. Dengan total varian nya mencapai 1200 varian dengan 9000 barang.</p>\n\n<p>Bahasa yang simple nya Autobacs menyediakan berbagai macam kebutuhan mobil mulai dari interior, eksterior, hingga mesin beserta service dalam satu tempat</p>\n\n<p>Karena semua produk dari Jepang dan juga bertuliskan huruf Jepang, maka jangan kuatir kalo Anda akan kebingungan atau tidak bisa mengartikan barang ini untuk apa dan cara menggunakannya seperti apa? Seperti Loop yang merupakan produk untuk melapisi dinding ruang pembakaran menghindari keausan pada dinding piston dan juga ring pistonnya. Pemakainnya cukup dituangkan ke dalam mesin seperti oli.</p>\n\n<p>Karena di Autobacs Anda akan dilayani oleh para pegawai nya yang akan memberikan informasi dan edukasi mengenai produk yang ada di Autobacs Surabaya</p>\n\n<p>Dan bagi Anda para kaum wanita, jangan kuatir. Autobacs Surabaya menyediakan 2 tema produk untuk Anda, yaitu Her World</p>\n\n<p>Her World yang berisi segala sesuatu aksesoris mobil untuk kaum hawa mulai dari aksesoris berbau Hello Kity dan Mini Mouse</p>\n\n<p>Hingga alat untuk mengkaitkan lebih dari 1 hanger pakaian di dalam cabin mobil. Banyak juga aksesoris mobil yang dibuat supaya tetap menjaga mobil para wanita ini tidak seperti kapal pecah. Desain nya unik dan multifungsi</p>\n\n<p>Bahkan ada bantal yang sangat nyaman sekali untuk menemani perjalanan jauh Anda atau cozy long drive.</p>\n\n<p>Dan yang ke-2 ada Mom &amp; Baby yang berisi keperluan ibu yang sedang berkendara dengan sang bayi. Dimana semuanya akan membuat perjalan semakin aman dan nyaman bagi sang ibu juga bayinya.</p>\n\n<p>Sayapun menemukan beberapa produk yang unik di bagian ini, seperti pemegang payung yang berbentuk monyet. Fungsinya adalah sebagai tempat untuk menaruh payung di kaca, supaya sang ibu tidak kehujanan atau kepanasan ketika bersiap menggendong sang bayi keluar dari mobil</p>\n\n<p>Biasanya kita menggunakan bantalan racing seperti Sabelt atau Sparco untuk seat belt kita. Nah bagi bayi atau anak kecil, Autobacs juga menyediakan boneka yang berfungsi untuk menyangga leher atau kepala sang bayi ataupun melapisi seat belt atau sabuk supaya sang bayi terasa lebih nyaman</p>\n\n<p>Hingga deretan baby car seat. Dan uniknya Autobacs juga sangat memanjakan bagi kaum ibu dengan menyediakan nursery room untuk kegiatan menyusui ataupun mengganti popok</p>\n\n<p>Bagi kaum pria yang ingin merawat mobilnya juga bisa langsung menuju kebagian Convenient Care, dimana berbagai macam produk perwatan mobil ada disini. Mulai dari bagian interior, eksterior, hingga mesin.</p>\n\n<p>Disini juga Anda bisa menemukan produk perawatan mobil asli dari Jepang, yaitu Soft 99.</p>\n\n<p>Satu-satunya yang mungkin familiar untuk saya dan Anda akan bayangan kita ketika mendengar nama besar Autobacs yang cukup familiar di kancah balap mobil Jepang, yaitu Super GT atau D1 GP Japan. (sponsor utama), adalah pada bagian basic. Dimana pada bagian ini terdapat berbagai macam spare part dan kebutuhan mobil bagian mesin yang tergolong performance. Seperti High performance oil asal Jepang Idemitsu dan Eneos. Serta brand besar lainnya seperti Motul, Castrol, dan Shell. Berbagai macam produk Denso mulai dari wiper hingga Iridium Spark plugs juga melengkapi spare part fast moving lainnya, seperti brake pad, filter oli, air filter, aki, dll. Jadi setelah Anda membeli oli atau spare part, Anda bisa langsung ke pit service yang terletak di lantai bawah untuk bisa digunakan langsung.</p>\n\n<p>Bagi Anda yang doyan tampil nyleneh atau anti mainstream ada bagian atau tema yang bernama &ldquo;Look Different&rdquo; yang berisi beberapa aksesoris yang membuat mobil Anda terlihat lebih gaul. Saya pun menemukan beberapa benda seperti lampu yang sensitif dengan getaran, entah itu suara atau pun getaran maka dia akan menyala. Cocok untuk Anda yang hobby car audio untuk diletakkan di bagian subwoofer nya.</p>\n\n<p>Lalu ada lampu LED untuk bagian interior mobil yang berwarna-warni. Dan Anda bisa mengetesnya sebelum membeli dengan menaruhnya di alat yang tersedia di pinggir rak. Melihat lampu LED ini saya jadi teringat pada lampu rem di mobil D1 GP Japan atau pun geng Bozosoku Japan</p>\n\n<p>Ada juga charger di mobil yang menggunakan sistem on/off, jadi Anda tidak perlu susah susah untuk mencabut colokannya dari cigarette lighternya, cukup menekan tombol di chargernya</p>\n\n<p>Sementara di lantai 1 nya terdapat pit service standart Jepang yang akan melayani Anda untuk kebutuhan servis mobil secara berkala. Seperti, spooring dan balancing, ganti oli, penggantian ban baru, pemasangan peredam suara, cabin air + ac cleaner, dan juga tune up untuk berbagai jenis dan merek mobil.</p>\n\n<p>Bagi Anda yang ingin mengganti oli atau ban mobil Anda, jangan kuatir Autobacs Surabaya ada promo khusus di bulan September yaitu:</p>\n\n<p>&nbsp;&nbsp;&nbsp; Gratis&nbsp; Motul plas chamois (kanebo) dan gantungan kunci Motul setiap pembelian Motul oil 1 atau 4 liter (Selama persedian masih ada)<br />\n&nbsp;&nbsp;&nbsp; Free balancing dan tambah nitrogen setiap pembelian ban merek Michelin, Dunlop, Achilles, dan Bridgestone<br />\n&nbsp;&nbsp;&nbsp; Gratis sporing dan balancing, serta nitrogen seharga Rp. 400.000,00 untuk pembelian 4 ban merek Michelin, Dunlop, Achilles, dan Bridgestone<br />\n&nbsp;&nbsp;&nbsp; Gratis T-shirt Autobacs untuk setiap pembelanjaan senilai Rp. 500.000,00</p>\n\n<p>5. Gratis polo shirt Autobacs untuk setiap pembelanjaan senilai 1 juta Rupiah</p>\n\n<p>Untuk aksesoris yang Anda beli di lantai 2, Autobacs akan memberikan edukasi cara pemasangan yang benar kepada Anda (untuk pemasangan yang tidak berat , tidak ada biaya tambahan).</p>\n\n<p>Dan yang istimewanya lagi disini juga tersedia sebuah alat diagnostik mobil untuk semua merek mobil. Jadi semua merek mobil bisa dilayani oleh Autobacs, mulai dari mobil keluarga hingga sport atau exotic car. Kedepannya Autobacs Surabaya akan melengkapi fasilitas pit servicenya dengan fasilitas cuci mobil.</p>\n\n<p>Untuk kualitas pelayanan serta servisnya Anda tidak perlu kuatir, karena standard procedure atau S.O.P nya sesuai dengan standart yang di Jepang. Bahkan para pegawainya di training langsung oleh pegawai Autobacs dari Jepang.</p>\n\n<p>Dan bagi Anda customer setia Autobacs, Autobacs juga menerbitkan kartu member bernama ALC atau Autobacs Loyalty Card. Yang dimana ALC terdiri dari 4 jenis kartu atau keanggotaan, yaitu Orange, Silver, Gold, dan Platinum. Yang dimana para pemegang kartu ini akan diberikan berbagai macam privilege seperti akan mendapatkan info promosi melalui email atau sms (orang), undangan untuk menghadiri event exclusive (silver), diskon 5 % untuk service (gold), dan diskon sebesar 3% untuk barang dan 10% untuk service (platinum). Dan masih banyak lagi privilege atau keuntungan lainnya menjadi member di Autobacs.</p>\n\n<p>&ldquo;Planing ke depannya, yaitu tiap bulannya Autobacs Surabaya akan menyelenggarakan acara-acara special untuk para customer umum ataupun membership lewat pemberitahuan via sms ataupun email, seperti demo produk terbaru ataupun yang diunggulkan. Tujuannya agar semakin mendekatkan antara Autobacs dengan para customernya. Untuk masalah harga kita bersaing dengan produk lokal. Karena sebenarnya produk kita ini tidak banyak yang menjual alias susah dicari di pasaran. Harganya pun value for money dengan apa yang di dapatkan oleh para customer, yaitu kualitasnya. Dan ditambah lagi dengan fasilitas, customer service, dan kenyaman yang diberikan oleh Autobacs&rdquo; terang Kevin H. Tanojo, Sales &amp; Marketing Manager Autobacs Surabaya</p>\n\n<p>Dengan mengusung tagline Happy Car. Happy People. Autobacs Surabaya siap merawat dan memanjakan mobil Anda dengan membawa gaya hidup bermobil Anda ke level yang belum pernah Anda bayangkan.</p>\n\n<p>Jadi jangan lupa datang ke Autobacs untuk merasakan automotive shopping experience di one stop shopping cart mart ala Jepang di kota Surabaya</p>\n\n<p>Autobacs Surabaya</p>\n\n<p>Jl. Arief Rahman Hakim No. 60 Surabaya</p>\n\n<p>(031) 5926333</p>\n\n<p>Business hour:</p>\n\n<p>Senin &ndash; Jum&rsquo;at : 09:00 &ndash; 21:00 WIB</p>\n\n<p>Sabtu- Minggu : 09:00 &ndash; 22:00 WIB</p>\n\n<p><br />\nSumber : http://www.perfourm.com/20907/autobacs-surabaya-happy-car-happy-people.html</p>\n', '1447073637.jpg', 1, 'autobacs-surabaya-happy-car-happy-people', '0', '0', 1447059474, 1447081878, 1, 1, 1),
(8, 1, 1, 'AUTOBACS : Konnichiwa Surabaya, We''re Open', 'Konnichiwa Indonesia! Now we’re open. Itulah kata sambutan dari one stop shopping Automotive lifestyle dari Jepang, Autobacs.', '', '<p>Konnichiwa Indonesia! Now we&rsquo;re open. Itulah kata sambutan dari one stop shopping Automotive lifestyle dari Jepang, Autobacs.&nbsp; Yes guys akhirnya toko one stop shoping otomotif dari Jepang yang biasanya hanya kita lihat logo dan namanya di majalah otomotif import, mobil balap (Super GT Japan), dan internet, kini hadir di Indonesia dan menyapa kota Surabaya mulai tanggal 8 Juli 2015 yang lalu. Autobacs Seven adalah perusahaan ritel pelopor pelayanan satu atap dan toko serba ada di Jepang yang berdiri pada tahun 1974&nbsp; di kota Osaka, Jepang. Layanannya tersedia untuk barang-barang otomotif, layanan instalasi, penjualan dan pembelian mobil, perawatan mobil dan inspeksi, serta pengecatan.</p>\n\n<p>Bertempat di Jl. Arif Rahman Hakim No. 60 (MERR) Surabaya berdiri the 1st Autobacs Store in Indonesia. Di Asia Tenggara, Indonesia menjadi negara keempat tujuan ekspansi bisnis Autobacs, setelah Singapura, Thailand dan Malaysia. Autobacs memiliki tiga gerai di Singapura, empat di Thailand dan satu gerai di Malaysia. Sementara di seluruh dunia gerainya mencapai 500 gerai.&nbsp; Di Indonesia sendiri Autobacs masuk melalui PT Central Sole Agency yang merupakan anak usaha dari PT Indomobil Sukses Internasional Tbk (IMSI) . Yang&nbsp; kemudian Indomobil mendirikan PT Autobacs Indomobil Indonesia.</p>\n\n<p>Jika Anda membayangkan gerai Autobacs Indonesia seperti gerainya di Jepang yang berkonsep supermarket, maka di Indonesia konsepnya berubah menjadi sebuah galeri atau toko layaknya di semua mall. Suasananya sendiri terasa seperti kita sedang shopping di sebuah toko di mall, lengkap dengan beberapa sofa dan free drink di beberapa titik yang membuat kita merasa nyaman selagi berbelanja.</p>\n\n<p>&ldquo;Titik tolak Autobacs Jepang adalah pada barangnya, maka di Indonesia pada orangnya. Target Autobacs Indonesia sendiri adalalah pria dan wanita, terutama mereka yang memiliki mobil dan uang tapi belum masuk ke dunia aftermarket (belum mengutak-ngatik mobilnya) mungkin karena tempatnya tidak nyaman. Karena itu konsep di Indonesia kami rubah menjadi konsep shopping experience yang sesuai dengan gaya hidup mereka dan nyaman, desain storenya sesuai dengan yang sekarang sedang trend, lalu pemetaan barangnya juga bukan lagi perkategori, tapi lebih tergantung kepada kebutuhan atau lifestyle orangnya&rdquo; terang Djoni Sutanto Direktur PT. Autobacs Indomobil Indonesia</p>\n\n<p><br />\nKetika Anda berkunjung ke Autobacs Indonesia Anda mungkin serasa sedang berada di Jepang dan berada di dalam sebuah toko nya karena semua barang yang dijual disini adalah made in Japan lengkap dengan bahasa Jepangnya. Ada sekitar 7 tema, Convenient Care , Mom &amp; baby, Look Different, Her World , Cozy Long Drive, First Aid,&nbsp; dan Basic. Dengan total varian nya mencapai 1200 varian dengan 9000 barang. Bahasa yang simple nya Autobacs menyediakan berbagai macam kebutuhan mobil mulai dari interior, eksterior, hingga mesin beserta service dalam satu tempat.</p>\n\n<p>Karena semua produk dari Jepang dan juga bertuliskan huruf Jepang, maka Anda jangan kuatir kebingungan atau tidak bisa mengartikan barang ini untuk apa dan cara menggunakannya seperti apa? Karena di Autobacs Anda akan dilayani oleh para pegawainya yang akan memberikan informasi dan edukasi mengenai produk yang ada di Autobacs Surabaya.</p>\n\n<p>Dan bagi Anda para kaum wanita, jangan kuatir. Autobacs Surabaya menyediakan 2 tema produk untuk Anda, yaitu Her World yang berisi segala sesuatu aksesoris mobil untuk kaum Wanita mulai dari aksesoris berbau Hello Kity hingga alat untuk menggantungkan lebih dari 1 hanger pakaian di dalam cabin mobil. Dan yang ke-2 ada Mom &amp; Baby yang berisi keperluan ibu yang sedang berkendara dengan bayi atau anaknya, dimana semuanya akan membuat perjalanan Anda semakin aman dan nyaman.</p>\n\n<p>Sementara di lantai 1 nya terdapat pit service standar Jepang&nbsp; yang akan melayani Anda untuk kebutuhan servis mobil secara berkala seperti spooring dan balancing, ganti oli, penggantian ban baru, pemasangan peredam suara, cabin air + ac cleaner, dan juga tune up. Untuk aksesoris yang Anda beli di lantai 2, Autobacs akan memberikan edukasi cara pemasangan yang benar kepada Anda (untuk pemasanga yang tidak berat , tidak ada biaya tambahan). Dan yang istimewanya lagi disini juga tersedia sebuah alat diagnostik mobil untuk semua merek mobil. Jadi semua merek mobil bisa dilayani oleh Autobacs, mulai dari mobil keluarga hingga sport atau exotic car. Kedepannya Autobacs Surabaya akan melengkapi fasilitas pit servicenya dengan fasilitas cuci mobil.</p>\n\n<p>Dengan mengusung tema &ldquo;Happy Car. Happy People&rdquo;, Autobacs Surabaya siap merawat dan memasangkan aksesoris mobil Anda dengan harga yang sesuai dengan layanan dan produk yang ditawarkan. Autobacs membawa gaya hidup bermobil Anda ke level yang belum pernah Anda bayangkan. Selain di kota Surabaya, Autobacs akan hadir di kota Jakarta dan kota-kota besar lainnya di ndonesia Jangan lupa datang ke Autobacs untuk merasakan automotive shopping experience di one stop shopping car mart ala Jepang di kota Surabaya.</p>\n\n<p>&nbsp;</p>\n\n<p>Autobacs Surabaya</p>\n\n<p>Jl. Arief Rahman Hakim No. 60 Surabaya</p>\n\n<p>(031) 5926333<br />\nIG : @autobacssurabaya</p>\n\n<p>Sumber : http://www.perfourm.com/19432/autobacs-konnichiwa-surabaya-were-open.html</p>\n', '1447068778.jpg', 0, 'autobacs-konnichiwa-surabaya-were-open', '0', '0', 1447068778, 1447081828, 1, 1, 1),
(9, 1, 1, 'About AUTOBACS', 'Kehadiran Autobacs di Indonesia dimulai dengan terbentuknya PT Autobacs Indomobil Indonesia, yang merupakan joint venture antara Autobacs Seven Co., Ltd, Jepang dengan PT Central Sole Agency, yang merupakan subsidiary dari PT Indomobil Sukses Internasiona', '', '<p>Kehadiran Autobacs di Indonesia dimulai dengan terbentuknya PT Autobacs Indomobil Indonesia, yang merupakan joint venture antara Autobacs Seven Co., Ltd, Jepang dengan PT Central Sole Agency, yang merupakan subsidiary dari PT Indomobil Sukses Internasional Tbk. pada tanggal 22 Juli 2013. Autobacs Indonesia mempunyai misi memperkenalkan gaya hidup bermobil (automotive lifestyle) yang sudah maju dari Jepang, yaitu berupa produk unik dengan &ldquo;kodawari&rdquo; khas Jepang dan layanan berstandar Jepang, supaya kehidupan bermobil orang Indonesia menjadi lebih aman, nyaman dan menyenangkan.</p>\n\n<p>Kehadiran Autobacs di Indonesia bukan hanya merupakan kepanjangan ekspansi dari Autobacs Jepang, tetapi merupakan momen khusus di mana di Indonesia kami memperkenalkan konsep baru, yaitu menghadirkan &ldquo;Automotive Lifestyle Center&rdquo; yang bernuansa butik.</p>\n\n<p>Produk-produk kami, yang sebagian besar berasal dari Jepang, kami sajikan dalam beberapa tema yang diusung dari kehidupan sehari-hari orang Indonesia, untuk memudahkan pelanggan memilih barang, dan juga menambah wawasan akan adanya produk-produk baru, karena &ldquo;Yang tidak kita pikirin, ternyata dipikirin dengan detail oleh orang Jepang&rdquo;.</p>\n\n<p>&nbsp;Kami menginginkan agar para pelanggan kami dapat mengalami shopping experience yang beda dari yang lain, yang belum pernah ada di dunia otomotif. Bagaikan tanaman yang baru tumbuh, tunas Autobacs Indonesia membutuhkan kunjungan, dukungan, dan masukan dari para pelanggan Indonesia, agar kami dapat tumbuh besar menjalankan misi kami, membuat pengalaman bermobil di Indonesia lebih aman, nyaman dan menyenangkan. Karena memang, merawat mobil belum pernah semenyenangkan ini.</p>\n\n<p>AUTOBACS. HAPPY CAR. HAPPY PEOPLE.</p>\n', '1447074158.jpg', 0, 'about-autobacs', '0', '0', 1447074158, 1447081703, 1, 1, 1),
(10, 1, 1, 'Gallery Store & Bengkel AUTOBACS', 'Autobacs Surabaya siap merawat dan memasangkan aksesoris mobil Anda dengan harga yang sesuai dengan layanan dan produk yang ditawarkan.', '', '<p>Autobacs Surabaya siap merawat dan memasangkan aksesoris mobil Anda dengan harga yang sesuai dengan layanan dan produk yang ditawarkan.</p>\n', '1447125121.jpg', 0, 'gallery-store-bengkel-autobacs', '0', '0', 1447080979, 1447229294, 1, 1, 1),
(11, 1, 1, 'judul baru', 'Autobacs Surabaya siap merawat dan memasangkan aksesoris mobil Anda dengan harga yang sesuai dengan layanan dan produk yang ditawarkan.', '', '<p>Autobacs Surabaya siap merawat dan memasangkan aksesoris mobil Anda dengan harga yang sesuai dengan layanan dan produk yang ditawarkan.</p>\n', '1447130990.jpg', 0, 'judul-baru', '0', '0', 1447080979, 1447668198, 1, 1, 0),
(12, 1, 1, 'Autobacs Indonesia meraih penghargaan dari sebuah perhelatan bergengsi dunia otomotif Indonesia', 'Autobacs Indonesia meraih penghargaan dari sebuah perhelatan bergengsi dunia otomotif Indonesia', NULL, '<div id="article-detail-head" style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 16px; font-family: Abel, sans-serif; vertical-align: baseline; clear: both; float: left; width: 980px; color: rgb(34, 34, 34);">\n<p style="margin: 20px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 20px; line-height: 28px; font-family: inherit; vertical-align: baseline; text-indent: 36px;">Autobacs Indonesia meraih sebuah penghargaan dari sebuah perhelatan bergengsi dunia otomotif Indonesia</p>\n</div>\n\n<div id="article-detail-content" style="margin: 0px; padding: 0px 19.5938px 0px 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 16px; font-family: Abel, sans-serif; vertical-align: baseline; clear: both; float: left; width: 470.391px; color: rgb(34, 34, 34);">\n<p style="margin: 15px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 20px; font-family: inherit; vertical-align: baseline; text-indent: 36px;">Autobacs Indonesia meraih sebuah penghargaan dari sebuah perhelatan bergengsi dunia otomotif Indonesia, yang diselenggarakan oleh tabloid OTOMOTIF. &nbsp;Dalam acara OTOMOTIF Choice Award 2015 yang berlangsung di Jakarta Convention Center ini, Autobacs Indonesia didaulat untuk menerima Penghargaan Produk Aftermarket Terbaik &nbsp;dalam kategori Promising Services.</p>\n\n<p style="margin: 15px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 20px; font-family: inherit; vertical-align: baseline; text-indent: 36px;">Autobacs, No 1 Automotive Lifestyle dari Jepang telah hadir di Indonesia sejak Juli 2015. &nbsp;Perusahaan yang berasal dan telah lama berdiri di negeri sakura ini, mengusung slogan &ldquo;Happy Car. &nbsp;Happy People.&rdquo; &nbsp;&nbsp;Meskipun masih baru terjun di dunia otomotif Indonesia, &nbsp;Autobacs Indonesia mampu membuktikan bahwa Autobacs adalah pendatang baru yang memang patut diperhitungkan. &nbsp;</p>\n\n<p style="margin: 15px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 20px; font-family: inherit; vertical-align: baseline; text-indent: 36px;">OTOMOTIF Choice Award adalah hasil survey dari tabloid OTOMOTIF, yang bekerja sama dengan tim riset dari tim GRAMEDIA Majalah. Dengan tagline &ldquo;PILIHAN PRIORITAS&rdquo;, penghargaan kali ini diberikan kepada perusahaan otomotif terbaik di Indonesia, yang memenuhi syarat menjadi pilihan prioritas.</p>\n</div>\n', '1457585062.png', 0, 'autobacs-indonesia-meraih-penghargaan-dari-sebuah-perhelatan-bergengsi-dunia-otomotif-indonesia', '', '', 1457585064, NULL, 1, NULL, 1),
(13, 1, 2, 'Bringing Aftermarket Closer to Consumer LIfestyle', 'Bringing Aftermarket Closer to Consumer LIfestyle', NULL, '<div id="article-detail-head" style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 16px; font-family: Abel, sans-serif; vertical-align: baseline; clear: both; float: left; width: 980px; color: rgb(34, 34, 34);">\n<p style="margin: 20px 0px 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 20px; line-height: 28px; font-family: inherit; vertical-align: baseline; text-indent: 36px;">Meski pendatang baru di ranah otomotif di Indonesia, namun animo tinggi sangat dirasakan Autobacs selaku gerai penyedia aksesoris.</p>\n</div>\n\n<div id="article-detail-content" style="margin: 0px; padding: 0px 19.5938px 0px 0px; border: 0px; font-stretch: inherit; font-size: medium; line-height: 16px; font-family: Abel, sans-serif; vertical-align: baseline; clear: both; float: left; width: 470.391px; color: rgb(34, 34, 34);">\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">Pada akhir tahun 2015 lalu, sebuah one stop shopping automotive lifestyle, Autobacs yang biasanya hadir di Jepang kini resmi masuk ke Indonesia.Autobacs sendiri merupakan pelopor perusahaan ritel aksesoris otomotif satu atap paling lengkap yang berdiri tahun 1974 di Osaka, Jepang. Di negeri sakura gerainya sudah mencapai 600 lokasi.</p>\n\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">Sementara di luar Jepang sudah menjamah 6 negara dengan 27 toko. Indonesia sendiri merupakan negara ke delapan untuk menjadi wholesaler dan retail komponen otomotif melalui brand Autobacs.</p>\n\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">Autobacs masuk ke Indonesia melalui Indomobil Group. Mereka berpatungan mendirikan perusahaan joint venture bernama PT Autobacs Indomobil Indonesia, yang sahamnya dimiliki PT Central Sole Agency (51%) dan Autobacs Seven Co. Ltd (49%) yang bermarkas di kawasan Jatake, Tangerang.</p>\n\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">Djoni Sutanto, Director PT Autobacs Indomobil Indonesia, mengungkapkan &quot;Autobacs hadir di Indonesia untuk menjawab kebutuhan bagi para pemilik mobil untuk bisa mendapatkan keperluan parts dan aksesoris di satu tempat yang nyaman,&quot; ungkapnya saat ditemui di ajang 2nd Southeast Asia Automotive Technology Summit 2016, Rabu (2/3/16).</p>\n\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">&quot;Produk-produk yang ditawarkan di gerai Autobacs merupakan produk yang memiliki kualitas asli Jepang yang mungkin tidak ada di tempat lain,&quot; imbuhnya.</p>\n\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">Meski terbilang pemain baru di industri otomotif Indonesia, namun animo tinggi sangat dirasakan Autobacs di Indonesia dalam waktu singkat.</p>\n\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">&quot;Di luar ekspektasi, ternyata animo tinggi dirasakan Autobacs salah satunya melalui gerai Autobacs Kota Kasablanka. Beberapa produk kami telah ludes terjual. Yang diawal diprediksi untuk 3 bulan ternyata produk kami habis dalam 3 minggu di akhir tahun 2015 lalu,&quot; imbuhnya.</p>\n\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 20px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; vertical-align: baseline; text-indent: 36px; box-sizing: border-box; text-align: justify;">Untuk diketahui, saat ini Autobacs telah telah memiliki tiga gerai di Indonesia dan empat gerai bersama dengan showroom Nissan dibawah Indomobil. Di tahun 2016 ini Autobacs berencana untuk terus menambah jaringan gerainya di Indonesia.</p>\n</div>\n', '1457585478.png', 0, 'bringing-aftermarket-closer-to-consumer-lifestyle', '', '', 1457585478, NULL, 1, NULL, 1),
(14, 1, 1, 'sdsd', 'sdsd', NULL, '<p>sdsdsd</p>\n', '1457937476', 1, 'sdsd', 'sdsd', 'sdsd', 1457937476, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_counter`
--

CREATE TABLE `article_counter` (
  `counter_article_id` int(20) NOT NULL,
  `counter_count` int(11) NOT NULL,
  `counter_count_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `article_counter`
--

INSERT INTO `article_counter` (`counter_article_id`, `counter_count`, `counter_count_date`) VALUES
(10, 8, '2015-12-14'),
(9, 1, '2015-11-12'),
(8, 12, '2016-03-10'),
(12, 1, '2016-01-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `article_gallery_foto`
--

CREATE TABLE `article_gallery_foto` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `filename` varchar(120) NOT NULL,
  `id_article` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `article_gallery_foto`
--

INSERT INTO `article_gallery_foto` (`id`, `title`, `body`, `filename`, `id_article`, `created_date`, `status`) VALUES
(1, 'xcxc', 'xcxcx', '14472285790.jpg', 10, 1447228580, 1),
(2, 'qwqw', 'qwqw', '14472285791.jpg', 10, 1447228580, 1),
(3, 'asas', 'asasa', '14472285792.jpg', 10, 1447228580, 1),
(4, 'rtrtrt', 'rtrtrt', '14472285803.jpg', 10, 1447228580, 1),
(5, 'xcxcx', 'cxcxcxc', '14472292950.jpg', 10, 1447229295, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `video_id` varchar(100) DEFAULT NULL,
  `body` text,
  `filename` varchar(125) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `id_account`, `id_sub`, `id_kategori`, `title`, `short_desc`, `video_id`, `body`, `filename`, `permalink`, `meta_keywords`, `meta_description`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 1, 12, 2, 'BONFORM STEERING COVER PREMIUM WOOD MEDIUM BLACK', 'BONFORM STEERING COVER PREMIUM WOOD MEDIUM BLACK', '', '<p>BONFORM STEERING COVER PREMIUM WOOD MEDIUM BLACK</p>\n', '1446717972.jpg', 'bonform-steering-cover-premium-wood-medium-black', '0', '0', 1446717973, 1446719991, 1, 1, 1),
(4, 1, 8, 4, 'MOGU BUTTERFLY CUSHION RED', 'Temukan kenyamanan selama di perjalanan Anda dengan MOGU BUTTERFLY CUSHION RED, bantal serbaguna berbahan lembut dengan keempukan luar biasa yang didesain untuk kenyamanan sempurna.', NULL, '<p>Temukan kenyamanan selama di perjalanan Anda<br />\ndengan MOGU BUTTERFLY CUSHION RED, bantal<br />\nserbaguna berbahan lembut dengan keempukan luar<br />\nbiasa yang didesain untuk kenyamanan sempurna.</p>\n', '1446781218.jpg', 'mogu-butterfly-cushion-red', '0', '0', 1446781219, 1447053978, 1, 1, 1),
(5, 1, 14, 4, 'BONFORM CUSHION HOLD MESH BLACK', 'Tetap nyaman meski harus duduk berlama-lama saat berkendara dengan BONFORM CUSHION HOLD MESH BLACK, bantalan berbahan mesh yang nyaman dan mampu menjaga sirkulasi udara saat duduk.', NULL, '<p>Tetap nyaman meski harus duduk berlama-lama saat<br />\nberkendara dengan BONFORM CUSHION HOLD MESH<br />\nBLACK, bantalan berbahan mesh yang nyaman dan<br />\nmampu menjaga sirkulasi udara saat duduk.</p>\n', '1446781656.jpg', 'bonform-cushion-hold-mesh-black', '0', '0', 1446781656, 1447053988, 1, 1, 1),
(6, 1, 13, 2, 'AQ CAFÉ TRAY PH07 BROWN', 'Mobilitas tinggi menjadi bagian dari gaya hidup masa kini. Itulah sebabnya Anda membutuhkan AQ CAFÉ TRAY PH07 BROWN, tempat makanan dan minuman portable yang menunjang mobilitas tinggi Anda sehari-hari.', NULL, '<p>Mobilitas tinggi menjadi bagian dari gaya hidup masa kini. Itulah sebabnya Anda<br />\nmembutuhkan AQ CAF&Eacute; TRAY PH07 BROWN, tempat makanan dan minuman<br />\nportable yang menunjang mobilitas tinggi Anda sehari-hari.</p>\n', '1446781757.jpg', 'aq-caf-tray-ph07-brown', '0', '0', 1446781758, 1447053998, 1, 1, 1),
(7, 1, 7, 2, 'NAPOLEX SMARTPHONE HOLDER MICKEY WD-275', 'Perjalanan selalu terasa mudah dan menyenangkan dengan NAPOLEX SMARTPHONE HOLDER MICKEY WD-275, dudukan penyangga smartphone pada dashboard dengan desain Mickey Mouse yang unik.', NULL, '<p>Perjalanan selalu terasa mudah dan menyenangkan dengan<br />\nNAPOLEX SMARTPHONE HOLDER MICKEY WD-275, dudukan<br />\npenyangga smartphone pada dashboard dengan desain Mickey<br />\nMouse yang unik.</p>\n', '1446781817.jpg', 'napolex-smartphone-holder-mickey-wd-275', '0', '0', 1446781818, 1447054011, 1, 1, 1),
(8, 1, 9, 4, 'LEAMAN PIPIDEBUT FORTE CF403 RED', 'Saatnya berkendara bersama si buah hati tanpa rasa khawatir dengan LEAMAN PIPIDEBUT FORTE CF403 RED, kursi anak untuk keselamatan dan kenyamanan maksimal dengan pengaturan kemiringan sesuai umur si buah hati.', NULL, '<p>Saatnya berkendara bersama si buah hati tanpa rasa khawatir dengan LEAMAN<br />\nPIPIDEBUT FORTE CF403 RED, kursi anak untuk keselamatan dan kenyamanan<br />\nmaksimal dengan pengaturan kemiringan sesuai umur si buah hati.</p>\n', '1446781850.jpg', 'leaman-pipidebut-forte-cf403-red', '0', '0', 1446781850, 1447054021, 1, 1, 1),
(9, 1, 10, 3, 'LOOP ENGINE RECOVERY LP43', 'Rasakan kembali performa mobil Anda yang menakjubkan seperti baru dengan LOOP ENGINE RECOVERY LP43. Saatnya kondisi mobil Anda yang telah menempuh jarak 50.000 km kembali prima.', NULL, '<p>Rasakan kembali performa mobil Anda yang menakjubkan<br />\nseperti baru dengan LOOP ENGINE RECOVERY LP43.<br />\nSaatnya kondisi mobil Anda yang telah menempuh jarak<br />\n50.000 km kembali prima.</p>\n', '1446781911.jpg', 'loop-engine-recovery-lp43', '0', '0', 1446781911, 1447054029, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_gallery_foto`
--

CREATE TABLE `product_gallery_foto` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `filename` varchar(120) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_kategori`
--

CREATE TABLE `product_kategori` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_kategori`
--

INSERT INTO `product_kategori` (`id`, `id_account`, `title`, `short_desc`, `permalink`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 1, 'Pintu', 'Pintu', 'pintu', 0, NULL, 1, NULL, 1),
(2, 1, 'Dashboard', 'Dashboard', 'dashboard', 0, NULL, 1, NULL, 1),
(3, 1, 'Doortrim', 'Doortrim', 'doortrim', 0, NULL, 1, NULL, 1),
(4, 1, 'Jok', 'Jok', 'jok', 0, NULL, 1, NULL, 1),
(5, 1, 'Lampu', 'Lampu', 'lampu', 0, NULL, 1, NULL, 1),
(6, 1, 'Bumper', 'Bumper', 'bumper', 0, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_sub`
--

CREATE TABLE `product_sub` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_sub`
--

INSERT INTO `product_sub` (`id`, `id_account`, `title`, `short_desc`, `permalink`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(7, 1, 'Her World', 'Her World', 'her-world', 0, NULL, 1, NULL, 1),
(8, 1, 'Cazy Long Drive', 'Cazy Long Drive', 'cazy-long-drive', 0, NULL, 1, NULL, 1),
(9, 1, 'Mom & Baby', 'Mom & Baby', 'mom-baby', 0, NULL, 1, NULL, 1),
(10, 1, 'Convenient Care', 'Convenient Care', 'convenient-care', 0, NULL, 1, NULL, 1),
(11, 1, 'First Aid', 'First Aid', 'first-aid', 0, NULL, 1, NULL, 1),
(12, 1, 'Look Different', 'Look Different', 'look-different', 0, NULL, 1, NULL, 1),
(13, 1, 'Moving Dining', 'Moving Dining', 'moving-dining', 0, NULL, 1, NULL, 1),
(14, 1, 'UV & Heat Protection', 'UV & Heat Protection', 'uv-heat-protection', 0, NULL, 1, NULL, 1),
(15, 1, 'Stay Clear in Rain', 'Stay Clear in Rain', 'stay-clear-in-rain', 0, NULL, 1, NULL, 1),
(16, 1, 'PIT Services', 'PIT Services', 'pit-services', 0, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `filename` varchar(125) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `id_account`, `title`, `link`, `filename`, `permalink`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 1, 'Slider 6', 'http://autobacs.co.id/product/sub/16/pit-services', '1447322042.jpg', 'slider-6', 1447322042, 1447323161, 1, 1, 1),
(2, 1, 'Slider 5', 'http://autobacs.co.id/product', '1447323152.jpg', 'slider-5', 1447323152, NULL, 1, NULL, 1),
(3, 1, 'Slider 4', 'http://autobacs.co.id/store', '1447323197.jpg', 'slider-4', 1447323197, NULL, 1, NULL, 1),
(4, 1, 'Slider 3', 'http://autobacs.co.id/aboutus/shopandlearn', '1447323233.jpg', 'slider-3', 1447323221, 1447323233, 1, 1, 1),
(5, 1, 'Slider 2', 'http://autobacs.co.id/aboutus', '1447323264.jpg', 'slider-2', 1447323264, NULL, 1, NULL, 1),
(6, 1, 'Slider 1', '#', '1447323316.jpg', 'slider-1', 1447323317, NULL, 1, NULL, 1),
(8, 1, 'Slider 7', '#', '1448870004.jpg', 'slider-7', 1448870004, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `id_account`, `body`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 1, '<p style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 20px; line-height: 24px; font-family: Abel, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: center; background-color: rgb(245, 245, 245);">SURABAYA</p>\n\n<p style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 20px; line-height: 24px; font-family: Abel, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: center; background-color: rgb(245, 245, 245);">Jl. Arif rachman Hakim No. 60</p>\n\n<p style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 20px; line-height: 24px; font-family: Abel, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: center; background-color: rgb(245, 245, 245);">Corner of Jl Arif Rachman Hakim and Merr</p>\n\n<p style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 20px; line-height: 24px; font-family: Abel, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: center; background-color: rgb(245, 245, 245);">Business Hour :</p>\n\n<p style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 20px; line-height: 24px; font-family: Abel, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: center; background-color: rgb(245, 245, 245);">Mon - Thu : 09.00 AM-09.00PM</p>\n\n<p style="margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 20px; line-height: 24px; font-family: Abel, sans-serif; vertical-align: baseline; color: rgb(34, 34, 34); text-align: center; background-color: rgb(245, 245, 245);">Fri - Sun : 09.00 AM-10.00PM</p>\n', 1447059474, 1447325670, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `role` tinyint(1) DEFAULT NULL COMMENT '1: administrator; 2: editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_date`, `modified_date`, `status`, `role`) VALUES
(1, 'autobacs', 'admin@autobacs.co.id', 'cfe31d9429703a311e592789acec8b0da1e4ab90', 0, 1447055705, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_counter`
--
ALTER TABLE `article_counter`
  ADD PRIMARY KEY (`counter_article_id`);

--
-- Indexes for table `article_gallery_foto`
--
ALTER TABLE `article_gallery_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_gallery_foto`
--
ALTER TABLE `product_gallery_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_kategori`
--
ALTER TABLE `product_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub`
--
ALTER TABLE `product_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `article_gallery_foto`
--
ALTER TABLE `article_gallery_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_gallery_foto`
--
ALTER TABLE `product_gallery_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_kategori`
--
ALTER TABLE `product_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_sub`
--
ALTER TABLE `product_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
