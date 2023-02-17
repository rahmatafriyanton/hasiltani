-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2023 at 02:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasiltani`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` varchar(50) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `thumbnail_artikel` varchar(100) NOT NULL,
  `jumlah_dibaca` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_publish` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikel_id`, `nama_kategori`, `user_id`, `judul`, `deskripsi`, `tags`, `thumbnail_artikel`, `jumlah_dibaca`, `created_at`, `is_publish`) VALUES
('20210801093201', 'Buah-Buahan', 0, 'Petani Sukses! Rela Resign Dari Bank Demi Wujudkan Pertanian Organik', '<p id=\"b3f5\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Kisah\r\n sukses menginspirasi, dari karyawan bank banting setir menjadi petani, \r\nbeliau rela meninggalkan kemapanan sebagai pegawai swasta yang selama \r\nini dianggap menjadi zona nyaman. Namun, hal tersebut mampu didobrak \r\noleh seorang pria bernama Theodorus Dedy Tri Kuncoro.</p><p id=\"33f4\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Dedy merupakan mantan karyawan sebuah bank swasta di Yogyakarta yang memilih <em class=\"hx\">resign </em>dari\r\n pekerjaannya pada Tahun 2016, merupakan lulusan Fakultas Teknobiologi, \r\nUniversitas Atma Jaya Yogyakarta. Hebatnya, ia memilih profesi baru \r\nsebagai petani sayuran organik setelah tak lagi bekerja di bank. Dari \r\nsana, pria asal Lampung Tengah yang lama bermukim di Yogyakarta itu \r\nmerasakan banyak hal.</p><p id=\"bec5\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Menjadi <span id=\"rmm\"><span id=\"rmm\">p</span></span>etani\r\n sayuran organik, membuat Dedy memperoleh banyak hal yang selama ini tak\r\n diketahui oleh dirinya. Sebelum menggeluti profesi tersebut, Dedy \r\nberanggapan bahwa petani identik dengan segala hal yang lekat dengan \r\nkesan kuno, ketinggalan zaman, dan lain sebagainya.</p><p id=\"4694\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Hal\r\n tersebut sirna tatkala Dedy benar-benar terjun langsung menjadi seorang\r\n petani. Selain memberikan kesejahteraan dalam hidupnya, ia merasa bahwa\r\n profesi barunya itu sangat keren.</p><p id=\"debf\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Sebelumnya,\r\n keputusan Dedy untuk menjadi petani sayuran organik sempat tidak \r\ndisetujui oleh keluarganya. Saat itu, mereka beranggapan jika nanti \r\nmenjadi petani seperti apa prospek kedepannya. Dedy yang mulai menekuni \r\nprofesinya sejak keluar dari bank pada 2016 silam, mengaku sudah tak \r\nmungkin lagi kembali ke pekerjaan lamanya. Alasannya, ia telah menemukan\r\n kenyamanan pada profesinya sebagai petani.</p><p id=\"a504\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Sobat\r\n perlu ketahui, untuk meraih kesusksesannya, Dedy mengalami berbagai \r\nmacam tantangan terlebih dalam mempraktekkan dan merubah <em class=\"hx\">mindset </em>petani terhadap pertanian organik antara lain:</p><p id=\"0407\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">· <strong class=\"hh cz\">Ketersediaan lahan yang semakin menipis</strong>\r\n mengakibatkan semakin susahnya dapat lahan pertanian. Perumahan sudah \r\nmulai menyasar ketanah subur, bahkan yang awalnya hijau bisa jadi \r\nkuning. Hal ini akan berdampak pula semakin mahalnya lahan.</p><p id=\"ed7a\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">· <strong class=\"hh cz\">Banyaknya lahan yang tercemar</strong>,\r\n menjadikan Dedy harus menguras tenaga dan waktu dalam waktu yang cukup \r\nlama untuk menyuburkannya. Selama 1–2 tahun ia tekuni hanya demi \r\nmenyuburkan tanah. Dalam waktu itu, Dedy sama sekali belum memanen \r\nmaupun menanam tanaman yang lain.</p><p id=\"bba7\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">· <strong class=\"hh cz\">Adanya<em class=\"hx\"> Mental block </em></strong>yang\r\n mengunci cara berpikir sebagian orang, yaitu masalah permodalan dan \r\ntakut gagal sehingga takut memulainya. Hanya sedikit orang yang berani \r\nmengambil resiko. Menurut Dedy, masalah modal bisa diatasi dengan \r\nmengembangkan relasi, meliputi berusaha dengan dana investor, bisa \r\ndimulai dengan orang yang dikenal. Lalu bagaimana memulai sebuah usaha? \r\nTentunya harus memiliki model bisnis yang mencakup tentang apa yang akan\r\n dikerjakan, segmen pasarnya, bagaimana suplainya, dan berapa \r\nkeuntungannya. Semua itu bisa dituangkan dalam sebuah bisnis model \r\ncanvas (BMC) sebagai pijakan usaha.</p><p id=\"5ab2\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Berawal\r\n dengan menyewa tanah seluas 1200 meter2, Dedy memulai usaha Tabulampot \r\n(Tanam Buah dalam Pot), dengan segmen pasar grosir (bakul / reseller) \r\nmeski tidak menutup untuk eceran, dengan nama ‘Kuncup’. Pasang surut \r\nusaha sudah dirasakannya, namun tetap terus berusaha. Di awal usahanya, \r\ncukup berani membayar tenaga dengan upah yang cukup tinggi karena \r\npengalaman yang dimiliki tenaga tersebut merupakan salah satu modal yang\r\n sangat jarang dimiliki orang kebanyakan. Selain itu, juga sebagai \r\nsumber belajar bagaimana melakukan budidaya yang baik dan teknik \r\npengembangbiakan yang baik.</p><p id=\"02a7\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Hingga\r\n akhirnya, ia berhasil mendirikan perusahaan produk organik PT Pangan \r\nSehat Nusantara dengan merek Say Fresh di Yogyakarta yang mampu meraup \r\nuntung besar dan <em class=\"hx\">Go International</em>. Selain memiliki \r\nlahan sewaan di Sleman dan Magelang, ia juga mengambil produk hasil bumi\r\n dari petani lainnya di sejumlah wilayah Yogyakarta dan Jawa Tengah \r\nuntuk dipasarkan.</p><p id=\"8e61\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Sebagai seorang petani, Dedy ingin mengubah <em class=\"hx\">mindset </em>bagi\r\n mereka yang tengah menggeluti dunia pertanian supaya mereka tak hanya \r\nmenyuburkan lahannya, tapi juga mengubah nasib menjadi lebih sejahtera. \r\nBahkan pada Tahun 2019 setiap bulan, Dedy bisa rugi sampai 10 jutaan \r\nuntuk edukasi konsumen dan pendampingan petani, namun semakin ke sini \r\nsemakin bagus hasilnya.</p><p id=\"b796\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Bagaimana\r\n Sobat Cerdas? Sangat keren kan menjadi petani organik. Nah ini ada \r\npesan untuk petani millennials seperti kita di era sekarang. Menurut \r\nDedy, Jangan pernah malu menjadi petani, karena menjadi petani itu \r\nmembanggakan, selain bisa hidup sejahtera, kita juga bisa ikut \r\nberpartisipasi dalam melestarikan lingkungan alam dengan menjalankan \r\npertanian organik.</p><p id=\"7b43\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Bagaimana Sobat, sudah termotivasi dan siap untuk mejadi petani organik sukses nan keren?</p><p id=\"4fdc\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">“Delighting Organic Buffs”</strong></p><p id=\"c120\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Sumber:</p><p id=\"a267\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">· <a href=\"https://www.blogger.com/u/2/blog/post/edit/809377971447992605/8208970840630528390?hl=en-GB#\" class=\"ds sj\" rel=\"noopener\">http://zoyaqqlounge.com/kisah-pegawai-bank-yang-berhijrah-pekerjaan-menjadi-petani-sayuran/</a></p>', 'pengalaman', '6eccbbf7b4e1b5ff111578ec52c1e9ff.jpg', 0, '2021-08-26 23:00:07', 1),
('20210826060447', 'Sayuran', 0, 'Mengganti Menu Dan Kebiasaan Makan Demi Perlindungan Kesehatan Dan Lingkungan', '<p id=\"f9aa\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Halo\r\n sobat cerdas! Tren mengonsumsi makanan organik di dunia saat ini terus \r\nmeningkat loh dari tahun ke tahun. Pasar organik Uni Eropa meningkat \r\ncukup tinggi yaitu sebesar 7,4% pada tahun 2014. Dengan semakin \r\nmeningkatnya permintaan konsumen, lahan pertanian organik juga semakin \r\nmeningkat. Beberapa negara telah menjadi pasar terdepan dalam produk \r\norganik. Pada tahun 2017, Denmark memiliki pasar terbesar di Eropa untuk\r\n produk organik yaitu sebesar 9,7% dari penjualan secara global dan \r\ndiikuti oleh Swedia dengan 7,9%. Di Indonesia sendiri, Survei Pertanian \r\nOrganik Indonesia (SPOI) 2015 mencatat jumlah produsen pangan organik di\r\n Indonesia meningkat sekitar 56 persen dibanding tahun sebelumnya.</p><p id=\"c203\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">N<span id=\"rmm\"><span id=\"rmm\"><span id=\"rmm\">a</span></span></span>h, apakah sobat cerdas mengetahui dampak pertanian organik terhadap lingkungan?</p><p id=\"f669\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Dari\r\n aspek lingkungan, sistem pertanian organik dapat dikatakan memiliki \r\npenilaian yang lebih baik daripada pertanian dengan sistem konvensional.\r\n Berdasarkan studi yang dilakukan, tanah yang digunakan dalam pertanian \r\norganik memiliki kadar karbon lebih besar, kualitas yang lebih baik dan \r\ntingkat erosi yang rendah dibandingkan dengan pertanian konvensional. \r\nResiko polusi akibat penggunaan pestisida sintetis pada air tanah dan \r\npermukaan tentunya menjadi sangat rendah. Penggunaan pupuk organik \r\n(misal dari kotoran hewan) dapat memberikan dampak yang lebih baik \r\nterhadap lingkungan karena proses dekomposisinya di tanah lebih lambat \r\ndaripada pupuk kimia. Sehingga, limpasan nitrogen berlebih yang \r\nmenyebabkan polusi air tanah dan permukaan dapat berkurang.</p><p id=\"dce5\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Setelah sobat cerdas<strong class=\"hh cz\"> </strong>mengetahui dampak pertanian organik terhadap lingkungan, kami juga ingin menjelaskan nutrisi pada makanan organic.</p><p id=\"db05\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Beberapa\r\n studi yang telah dilakukan menyatakan bahwa kandungan nutrisi seperti \r\nsenyawa fenolik, vitamin dan mineral dalam produk makanan organik lebih \r\ntinggi daripada produk konvensional. Studi yang dilakukan oleh Huber \r\n(2011) menyimpulkan bahwa kandungan vitamin C pada makanan organik lebih\r\n tinggi. Selain vitamin C, kandungan karotenoid nya juga lebih tinggi \r\nseperti pada tomat dan wortel. Dalam beberapa studi juga diinformasikan \r\nbahwa kandungan protein dan asam amino pada gandum dengan teknik \r\nkonvensional menghasilkan kadar yang lebih tinggi. Namun, dalam studi \r\nlainnya disebutkan bahwa lebih banyak asam amino esensial yang \r\nterkandung dalam produk organik.</p><p id=\"b587\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Dalam\r\n studi lainnya terhadap buah markisa produk organik, dihasilkan bahwa \r\nberat dan ukuran buah tersebut lebih kecil namun kandungan padatan \r\nterlarut atau Soluble Solids Content lebih tinggi dan tingkat keasaman \r\nlebih rendah. Kadar fenolik totalnya lebih rendah namun aktivitas enzim \r\nantioksidannya meningkat dibanding dengan produk konvensional [8]. \r\nMeskipun demikian, ulasan dari 240 studi yang dilakukan pada tahun 2012 \r\nmenunjukkan bahwa tidak ditemukan perbedaan yang signifikan untuk kadar \r\nvitamin atau mineral baik pada produk organik maupun konvensional.</p><p id=\"3b05\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Selain itu, inilah alasannya lebih baik mengkonsumsi produk organik:</p><p id=\"07fa\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">1.</strong> <strong class=\"hh cz\">Terhindar dari bahan kimia</strong></p><p id=\"a924\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Makan-makanan\r\n organik merupakan hasil dari bercocok tanam dan beternak yang tidak \r\nmenggunakan sama sekali pupuk kimia, pestisida, dan ternak diberikan \r\npangan berupa sayuran dan biji-bijian, bukan pelet ternak atau tidak \r\nmemberikan obat-obatan khusus terhadap ternak agar tumbuh lebih besar. \r\nJika Anda mengosumsi makanan organik, maka akan jauh lebih baik bagi \r\nkesehatan tubuh karena terhindar dari bahan-bahan kimia yang berbahaya.</p><p id=\"e8a5\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">2.</strong> <strong class=\"hh cz\">Lebih banyak mengandung nutrisi</strong></p><p id=\"ad4f\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Makanan\r\n organik lebih banyak mengandung nutrisi, vitamin, mineral, dan juga \r\nenzim yang sangat baik untuk tubuh Anda karena tanaman dan ternak \r\ndikelola dengan lebih diperhatikan dengan baik. Hal ini dibuktikan \r\ndengan penelitian dari The Journal of Alternative and Complementary \r\nMedicine yang melakukan tinjauan terhadap 41 penelitian yang \r\nmembandingkan nilai gizi buah, sayuran, dan biji-bijian yang tumbuh \r\nsecara organik dan konvensional. Penelitian tersebut menunjukkan hasil \r\nbahwa ada lebih banyak nutrisi dalam tanaman organik.</p><p id=\"a325\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">3.</strong> <strong class=\"hh cz\">Rasanya lebih enak</strong></p><p id=\"eefd\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Makanan\r\n yang tumbuh dengan perawatan tepat akan tumbuh secara seimbang dan itu \r\nyang membuat rasanya lebih enak. Lihat saja bentuk dan warna dari \r\ntanaman organik yang jauh lebih bagus dibanding dengan tanaman biasa.</p><p id=\"83b9\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">4.</strong> <strong class=\"hh cz\">Menghindari penggunaan hormon, antibiotik, dan hobat-obatan pada binatang</strong></p><p id=\"9cb1\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Daging\r\n tidak organik memiliki risiko lebih tinggi terkontaminasi zat bahaya. \r\nDi Amerika ditemukan bahwa sebanyak 90% pestisida ditemukan pada makanan\r\n yang dikonsumsi orang Amerika bersumber dari daging dan produk susu \r\nyang bukan organik. Hal ini berhubungan dengan banyaknya peternakan yang\r\n menambahkan obat-obatan atau menyuntikkan hormon pada hewan ternak \r\nmereka agar tumbuh lebih cepat dan gemuk.</p><p id=\"f1c8\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">5.</strong> <strong class=\"hh cz\">Mengurangi polusi dan pemanasan global</strong></p><p id=\"fe09\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Tahukah\r\n Anda sektor pertanian dan peternakan berkotribusi besar pada polusi dan\r\n pemanasan global? Hal itu karena banyak hewan ternak yang diberi pakan \r\nyang mengandung bahan kimia, sehingga gas yang dihasilkan dari kotoran \r\natau dahak ternak pun berdampak pada meningkatnya pemanasan global.</p><p id=\"4e61\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">6.</strong> <strong class=\"hh cz\">Mendukung Petani Indonesia</strong></p><p id=\"db0f\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Apabila\r\n kita mengkonsumsi makanan dari dalam negeri, khusus nya beras. Pilihlah\r\n beras yang dari petani kita sendiri bukan yang dari Impor. Kita tidak \r\ntahu kualitas beras impor seaman apa. Selain itu kita juga bisa membantu\r\n mensejahterakan para petani Indonesia.</p><p id=\"e8e8\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Sudah\r\n jelas, kan, kenapa kita lebih baik mengkonsumsi makanan dari bahan \r\norganik? Yuk sama-sama menjaga Kesehatan dan lingkungan. Kalau bukan \r\nkita? Siapa lagi????</p><p id=\"1e2a\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><strong class=\"hh cz\">“DELIGHTING ORGANIC BUFFS”</strong></p><p id=\"b855\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\">Sumber:</p><p id=\"c2ca\" class=\"hf hg gm hh b hi se go hj hk sf gr hl hm sg hn ho hp sh hq hr hs si ht hu hv dm hd\" data-selectable-paragraph=\"\"><a href=\"https://www.blogger.com/u/2/blog/post/edit/809377971447992605/5057457016135927944?hl=en-GB#\" class=\"ds sj\" rel=\"noopener\">https://warstek.com/2020/06/01/beberapa-hal-yang-perlu-diketahui-tentang-makanan-organik/</a><br> <a href=\"https://youtu.be/8PmM6SUn7Es\" target=\"_blank\">https://youtu.be/8PmM6SUn7Es</a><br><a href=\"https://www.blogger.com/u/2/blog/post/edit/809377971447992605/5057457016135927944?hl=en-GB#\" class=\"ds sj\" rel=\"noopener\">https://www.ekafarm.com/mengapa-anda-harus-memilih-makanan-organik-inilah-alasannya/</a></p>', 'tips', 'bdbf78d32c0d1800ee01a5634296e93b.jpg', 0, '2021-08-26 23:04:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `chart_id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `toko_id` varchar(30) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `produk_id` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `detail_transaksi_id` int(11) NOT NULL,
  `transaksi_id` varchar(30) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `produk_id` varchar(30) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`detail_transaksi_id`, `transaksi_id`, `kode_transaksi`, `produk_id`, `nama_produk`, `jumlah`, `total`) VALUES
(51, '6127bc61dd4e7', '20210826060751', '20210826093953', 'Brokoli Hijau Segar', 2, 19000),
(52, '6127bc61dd4e7', '20210826060751', '20210826094032', 'Jeruk Manis Besar', 1, 20000),
(53, '6127bc61df55d', '20210826060751', '20210826094140', 'Timun Muda Murah', 3, 18000),
(54, '6127bc61df55d', '20210826060751', '20210826094217', 'Wortel ', 2, 16000),
(55, '61284e5d38b74', '20210827043043', '20210826093953', 'Brokoli Hijau Segar', 3, 28500),
(56, '61284e5d39e1f', '20210827043043', '20210826094217', 'Wortel ', 3, 24000);

-- --------------------------------------------------------

--
-- Table structure for table `foto_produk`
--

CREATE TABLE `foto_produk` (
  `foto_produk_id` int(11) NOT NULL,
  `produk_id` varchar(40) NOT NULL,
  `foto_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_produk`
--

INSERT INTO `foto_produk` (`foto_produk_id`, `produk_id`, `foto_produk`) VALUES
(53, '20210826093953', '20210826093953_1.jpg'),
(54, '20210826093953', '20210826093953_2.jpg'),
(55, '20210826093953', '20210826093953_3.jpg'),
(56, '20210826094032', '20210826094032_1.jpg'),
(57, '20210826094032', '20210826094032_2.jpg'),
(58, '20210826094032', '20210826094032_3.jpg'),
(59, '20210826094140', '20210826094140_1.jpg'),
(60, '20210826094140', '20210826094140_2.jpg'),
(61, '20210826094217', '20210826094217_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
(1, 'Sayuran'),
(2, 'Buah-Buahan');

-- --------------------------------------------------------

--
-- Table structure for table `otp_email`
--

CREATE TABLE `otp_email` (
  `email_otp_id` int(11) NOT NULL,
  `otp_email` varchar(100) NOT NULL,
  `otp_kode` varchar(10) NOT NULL,
  `otp_exp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `user_id`, `nama_lengkap`, `nama_kategori`, `nama_produk`, `deskripsi`, `harga`, `diskon`, `stok`, `satuan`, `jumlah_terjual`, `tags`, `is_active`) VALUES
('20210826093953', 43, 'Annisa Nurul Kazhimah', 'Sayuran', 'Brokoli Hijau Segar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, et totam necessitatibus, praesentium sit commodi porro. Vero, quia deleniti. Voluptatibus quae assumenda illo harum voluptatum modi veritatis aut voluptatem quas. Eveniet, quidem, placeat! Delectus magnam aspernatur autem assumenda voluptates ab quisquam molestiae quae, vel, soluta tenetur deleniti eum, cupiditate, obcaecati. Culpa nihil deleniti sed nemo velit, error porro laboriosam praesentium incidunt, et ullam. Quae dolor ex ut voluptatibus id facilis. Debitis voluptas veritatis omnis deleniti facere perspiciatis dolorum sapiente maiores.\r\nHic labore delectus, dolorem. Accusamus, aut ducimus quibusdam dolorum tempora veniam, deleniti consequuntur optio dolor a unde soluta illum. Voluptatibus natus iure enim voluptate, suscipit labore aliquam iusto rerum voluptates sit voluptatum voluptatem dolorum quae tempore similique facere nisi laboriosam architecto vero aperiam officia doloremque eaque distinctio! Labore deserunt quod excepturi, asperiores alias aliquid odio adipisci ratione? Ducimus cupiditate recusandae repudiandae voluptatum, in. Odio reiciendis exercitationem commodi voluptatibus itaque, quia tenetur, quidem hic eaque sapiente, blanditiis sunt, corrupti? Recusandae, et!\r\nRepellat facere, ex fuga quasi eveniet voluptates nostrum placeat debitis dolorem, accusamus id, enim sapiente quis consequatur. Dignissimos rem cumque corrupti quis quasi officia, repellat sequi aliquam id explicabo ut quae perferendis laudantium, nisi, omnis molestiae? Dolore, numquam, autem repudiandae deserunt rem quas? Velit sed blanditiis vitae maiores illo laudantium reiciendis, molestias similique maxime, culpa iste temporibus quidem adipisci commodi, praesentium doloremque, sit ipsam. Numquam voluptatem obcaecati cumque animi cupiditate maiores laboriosam hic blanditiis illum reprehenderit. Dignissimos magni, alias! Mollitia!\r\nDignissimos ex, veritatis quaerat ratione eius quisquam molestias at sint optio itaque, sapiente a ut culpa amet, recusandae eaque maiores fugit, facilis aliquam delectus quae numquam repudiandae. Adipisci voluptatum, porro quaerat deleniti iusto, libero facilis quasi doloribus non aspernatur dolores commodi ipsum ducimus ad aliquid unde obcaecati nihil? Perferendis dolore est rem debitis, cumque saepe ab ullam, in nesciunt, sit earum! Velit eius ad aut, molestiae corrupti nemo repudiandae quisquam harum magnam. Id labore dolorum tempore ipsam sit porro deserunt?\r\nNobis iste ullam tenetur dignissimos dolor, quae cupiditate at possimus molestias error impedit ea aperiam libero vel alias expedita eius sed! Sit blanditiis nam impedit nobis iste laborum, facilis enim, esse, aliquid velit alias, nisi nemo. Ex sequi eaque asperiores error culpa nisi dolor in reiciendis, tempore et soluta aperiam eius laboriosam quas corporis esse assumenda quod. Blanditiis nam quod eligendi rem hic necessitatibus, quam quis quisquam nulla veniam sequi consectetur in, temporibus porro expedita officia, adipisci dolorum totam sed.\r\nVelit culpa dicta doloribus fugit cumque. Dolores vel natus enim distinctio aliquam est, quae earum laborum eum officia? Quam ullam necessitatibus, quia unde aspernatur modi pariatur quisquam incidunt. Vitae, distinctio provident. Maiores, beatae consequuntur consequatur inventore dolores. Nesciunt commodi esse reprehenderit, quibusdam molestiae magni voluptatum id eum necessitatibus magnam, non maxime quod ipsa labore velit, facilis consectetur ullam, quos iste. Laudantium recusandae voluptas at doloribus consequatur eius eaque, nemo numquam similique, vero culpa quas velit labore iusto, exercitationem debitis! Consequatur!\r\nVoluptatibus provident dolores fugit et? Mollitia at ut corrupti dolorem veritatis quaerat dicta autem modi cumque dignissimos sequi, praesentium facilis ea iste dolorum, fugiat cupiditate eum. Molestiae ex facilis magni cum, sint labore mollitia quaerat dolores rem dignissimos esse, perferendis ipsa aliquid consequatur recusandae non eligendi ab omnis, dolor repellat veritatis qui nesciunt ullam, fugiat sit. Quis voluptate magni quos veniam excepturi vitae hic unde commodi doloremque quod ab officia ullam optio, pariatur dicta assumenda. Unde blanditiis adipisci a tempore?', 9500, 0, 15, 'ikat', 0, 'sayur', 1),
('20210826094032', 43, 'Annisa Nurul Kazhimah', 'Buah-Buahan', 'Jeruk Manis Besar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, et totam necessitatibus, praesentium sit commodi porro. Vero, quia deleniti. Voluptatibus quae assumenda illo harum voluptatum modi veritatis aut voluptatem quas. Eveniet, quidem, placeat! Delectus magnam aspernatur autem assumenda voluptates ab quisquam molestiae quae, vel, soluta tenetur deleniti eum, cupiditate, obcaecati. Culpa nihil deleniti sed nemo velit, error porro laboriosam praesentium incidunt, et ullam. Quae dolor ex ut voluptatibus id facilis. Debitis voluptas veritatis omnis deleniti facere perspiciatis dolorum sapiente maiores.\r\nHic labore delectus, dolorem. Accusamus, aut ducimus quibusdam dolorum tempora veniam, deleniti consequuntur optio dolor a unde soluta illum. Voluptatibus natus iure enim voluptate, suscipit labore aliquam iusto rerum voluptates sit voluptatum voluptatem dolorum quae tempore similique facere nisi laboriosam architecto vero aperiam officia doloremque eaque distinctio! Labore deserunt quod excepturi, asperiores alias aliquid odio adipisci ratione? Ducimus cupiditate recusandae repudiandae voluptatum, in. Odio reiciendis exercitationem commodi voluptatibus itaque, quia tenetur, quidem hic eaque sapiente, blanditiis sunt, corrupti? Recusandae, et!\r\nRepellat facere, ex fuga quasi eveniet voluptates nostrum placeat debitis dolorem, accusamus id, enim sapiente quis consequatur. Dignissimos rem cumque corrupti quis quasi officia, repellat sequi aliquam id explicabo ut quae perferendis laudantium, nisi, omnis molestiae? Dolore, numquam, autem repudiandae deserunt rem quas? Velit sed blanditiis vitae maiores illo laudantium reiciendis, molestias similique maxime, culpa iste temporibus quidem adipisci commodi, praesentium doloremque, sit ipsam. Numquam voluptatem obcaecati cumque animi cupiditate maiores laboriosam hic blanditiis illum reprehenderit. Dignissimos magni, alias! Mollitia!\r\nDignissimos ex, veritatis quaerat ratione eius quisquam molestias at sint optio itaque, sapiente a ut culpa amet, recusandae eaque maiores fugit, facilis aliquam delectus quae numquam repudiandae. Adipisci voluptatum, porro quaerat deleniti iusto, libero facilis quasi doloribus non aspernatur dolores commodi ipsum ducimus ad aliquid unde obcaecati nihil? Perferendis dolore est rem debitis, cumque saepe ab ullam, in nesciunt, sit earum! Velit eius ad aut, molestiae corrupti nemo repudiandae quisquam harum magnam. Id labore dolorum tempore ipsam sit porro deserunt?\r\nNobis iste ullam tenetur dignissimos dolor, quae cupiditate at possimus molestias error impedit ea aperiam libero vel alias expedita eius sed! Sit blanditiis nam impedit nobis iste laborum, facilis enim, esse, aliquid velit alias, nisi nemo. Ex sequi eaque asperiores error culpa nisi dolor in reiciendis, tempore et soluta aperiam eius laboriosam quas corporis esse assumenda quod. Blanditiis nam quod eligendi rem hic necessitatibus, quam quis quisquam nulla veniam sequi consectetur in, temporibus porro expedita officia, adipisci dolorum totam sed.\r\nVelit culpa dicta doloribus fugit cumque. Dolores vel natus enim distinctio aliquam est, quae earum laborum eum officia? Quam ullam necessitatibus, quia unde aspernatur modi pariatur quisquam incidunt. Vitae, distinctio provident. Maiores, beatae consequuntur consequatur inventore dolores. Nesciunt commodi esse reprehenderit, quibusdam molestiae magni voluptatum id eum necessitatibus magnam, non maxime quod ipsa labore velit, facilis consectetur ullam, quos iste. Laudantium recusandae voluptas at doloribus consequatur eius eaque, nemo numquam similique, vero culpa quas velit labore iusto, exercitationem debitis! Consequatur!\r\nVoluptatibus provident dolores fugit et? Mollitia at ut corrupti dolorem veritatis quaerat dicta autem modi cumque dignissimos sequi, praesentium facilis ea iste dolorum, fugiat cupiditate eum. Molestiae ex facilis magni cum, sint labore mollitia quaerat dolores rem dignissimos esse, perferendis ipsa aliquid consequatur recusandae non eligendi ab omnis, dolor repellat veritatis qui nesciunt ullam, fugiat sit. Quis voluptate magni quos veniam excepturi vitae hic unde commodi doloremque quod ab officia ullam optio, pariatur dicta assumenda. Unde blanditiis adipisci a tempore?', 20000, 0, 84, 'kg', 0, 'buah', 1),
('20210826094140', 44, 'Budi', 'Sayuran', 'Timun Muda Murah', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, et totam necessitatibus, praesentium sit commodi porro. Vero, quia deleniti. Voluptatibus quae assumenda illo harum voluptatum modi veritatis aut voluptatem quas. Eveniet, quidem, placeat! Delectus magnam aspernatur autem assumenda voluptates ab quisquam molestiae quae, vel, soluta tenetur deleniti eum, cupiditate, obcaecati. Culpa nihil deleniti sed nemo velit, error porro laboriosam praesentium incidunt, et ullam. Quae dolor ex ut voluptatibus id facilis. Debitis voluptas veritatis omnis deleniti facere perspiciatis dolorum sapiente maiores.\r\nHic labore delectus, dolorem. Accusamus, aut ducimus quibusdam dolorum tempora veniam, deleniti consequuntur optio dolor a unde soluta illum. Voluptatibus natus iure enim voluptate, suscipit labore aliquam iusto rerum voluptates sit voluptatum voluptatem dolorum quae tempore similique facere nisi laboriosam architecto vero aperiam officia doloremque eaque distinctio! Labore deserunt quod excepturi, asperiores alias aliquid odio adipisci ratione? Ducimus cupiditate recusandae repudiandae voluptatum, in. Odio reiciendis exercitationem commodi voluptatibus itaque, quia tenetur, quidem hic eaque sapiente, blanditiis sunt, corrupti? Recusandae, et!\r\nRepellat facere, ex fuga quasi eveniet voluptates nostrum placeat debitis dolorem, accusamus id, enim sapiente quis consequatur. Dignissimos rem cumque corrupti quis quasi officia, repellat sequi aliquam id explicabo ut quae perferendis laudantium, nisi, omnis molestiae? Dolore, numquam, autem repudiandae deserunt rem quas? Velit sed blanditiis vitae maiores illo laudantium reiciendis, molestias similique maxime, culpa iste temporibus quidem adipisci commodi, praesentium doloremque, sit ipsam. Numquam voluptatem obcaecati cumque animi cupiditate maiores laboriosam hic blanditiis illum reprehenderit. Dignissimos magni, alias! Mollitia!\r\nDignissimos ex, veritatis quaerat ratione eius quisquam molestias at sint optio itaque, sapiente a ut culpa amet, recusandae eaque maiores fugit, facilis aliquam delectus quae numquam repudiandae. Adipisci voluptatum, porro quaerat deleniti iusto, libero facilis quasi doloribus non aspernatur dolores commodi ipsum ducimus ad aliquid unde obcaecati nihil? Perferendis dolore est rem debitis, cumque saepe ab ullam, in nesciunt, sit earum! Velit eius ad aut, molestiae corrupti nemo repudiandae quisquam harum magnam. Id labore dolorum tempore ipsam sit porro deserunt?\r\nNobis iste ullam tenetur dignissimos dolor, quae cupiditate at possimus molestias error impedit ea aperiam libero vel alias expedita eius sed! Sit blanditiis nam impedit nobis iste laborum, facilis enim, esse, aliquid velit alias, nisi nemo. Ex sequi eaque asperiores error culpa nisi dolor in reiciendis, tempore et soluta aperiam eius laboriosam quas corporis esse assumenda quod. Blanditiis nam quod eligendi rem hic necessitatibus, quam quis quisquam nulla veniam sequi consectetur in, temporibus porro expedita officia, adipisci dolorum totam sed.\r\nVelit culpa dicta doloribus fugit cumque. Dolores vel natus enim distinctio aliquam est, quae earum laborum eum officia? Quam ullam necessitatibus, quia unde aspernatur modi pariatur quisquam incidunt. Vitae, distinctio provident. Maiores, beatae consequuntur consequatur inventore dolores. Nesciunt commodi esse reprehenderit, quibusdam molestiae magni voluptatum id eum necessitatibus magnam, non maxime quod ipsa labore velit, facilis consectetur ullam, quos iste. Laudantium recusandae voluptas at doloribus consequatur eius eaque, nemo numquam similique, vero culpa quas velit labore iusto, exercitationem debitis! Consequatur!\r\nVoluptatibus provident dolores fugit et? Mollitia at ut corrupti dolorem veritatis quaerat dicta autem modi cumque dignissimos sequi, praesentium facilis ea iste dolorum, fugiat cupiditate eum. Molestiae ex facilis magni cum, sint labore mollitia quaerat dolores rem dignissimos esse, perferendis ipsa aliquid consequatur recusandae non eligendi ab omnis, dolor repellat veritatis qui nesciunt ullam, fugiat sit. Quis voluptate magni quos veniam excepturi vitae hic unde commodi doloremque quod ab officia ullam optio, pariatur dicta assumenda. Unde blanditiis adipisci a tempore?', 6000, 0, 15, 'kg', 0, 'sayur', 1),
('20210826094217', 44, 'Budi', 'Sayuran', 'Wortel ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, et totam necessitatibus, praesentium sit commodi porro. Vero, quia deleniti. Voluptatibus quae assumenda illo harum voluptatum modi veritatis aut voluptatem quas. Eveniet, quidem, placeat! Delectus magnam aspernatur autem assumenda voluptates ab quisquam molestiae quae, vel, soluta tenetur deleniti eum, cupiditate, obcaecati. Culpa nihil deleniti sed nemo velit, error porro laboriosam praesentium incidunt, et ullam. Quae dolor ex ut voluptatibus id facilis. Debitis voluptas veritatis omnis deleniti facere perspiciatis dolorum sapiente maiores.\r\nHic labore delectus, dolorem. Accusamus, aut ducimus quibusdam dolorum tempora veniam, deleniti consequuntur optio dolor a unde soluta illum. Voluptatibus natus iure enim voluptate, suscipit labore aliquam iusto rerum voluptates sit voluptatum voluptatem dolorum quae tempore similique facere nisi laboriosam architecto vero aperiam officia doloremque eaque distinctio! Labore deserunt quod excepturi, asperiores alias aliquid odio adipisci ratione? Ducimus cupiditate recusandae repudiandae voluptatum, in. Odio reiciendis exercitationem commodi voluptatibus itaque, quia tenetur, quidem hic eaque sapiente, blanditiis sunt, corrupti? Recusandae, et!\r\nRepellat facere, ex fuga quasi eveniet voluptates nostrum placeat debitis dolorem, accusamus id, enim sapiente quis consequatur. Dignissimos rem cumque corrupti quis quasi officia, repellat sequi aliquam id explicabo ut quae perferendis laudantium, nisi, omnis molestiae? Dolore, numquam, autem repudiandae deserunt rem quas? Velit sed blanditiis vitae maiores illo laudantium reiciendis, molestias similique maxime, culpa iste temporibus quidem adipisci commodi, praesentium doloremque, sit ipsam. Numquam voluptatem obcaecati cumque animi cupiditate maiores laboriosam hic blanditiis illum reprehenderit. Dignissimos magni, alias! Mollitia!\r\nDignissimos ex, veritatis quaerat ratione eius quisquam molestias at sint optio itaque, sapiente a ut culpa amet, recusandae eaque maiores fugit, facilis aliquam delectus quae numquam repudiandae. Adipisci voluptatum, porro quaerat deleniti iusto, libero facilis quasi doloribus non aspernatur dolores commodi ipsum ducimus ad aliquid unde obcaecati nihil? Perferendis dolore est rem debitis, cumque saepe ab ullam, in nesciunt, sit earum! Velit eius ad aut, molestiae corrupti nemo repudiandae quisquam harum magnam. Id labore dolorum tempore ipsam sit porro deserunt?\r\nNobis iste ullam tenetur dignissimos dolor, quae cupiditate at possimus molestias error impedit ea aperiam libero vel alias expedita eius sed! Sit blanditiis nam impedit nobis iste laborum, facilis enim, esse, aliquid velit alias, nisi nemo. Ex sequi eaque asperiores error culpa nisi dolor in reiciendis, tempore et soluta aperiam eius laboriosam quas corporis esse assumenda quod. Blanditiis nam quod eligendi rem hic necessitatibus, quam quis quisquam nulla veniam sequi consectetur in, temporibus porro expedita officia, adipisci dolorum totam sed.\r\nVelit culpa dicta doloribus fugit cumque. Dolores vel natus enim distinctio aliquam est, quae earum laborum eum officia? Quam ullam necessitatibus, quia unde aspernatur modi pariatur quisquam incidunt. Vitae, distinctio provident. Maiores, beatae consequuntur consequatur inventore dolores. Nesciunt commodi esse reprehenderit, quibusdam molestiae magni voluptatum id eum necessitatibus magnam, non maxime quod ipsa labore velit, facilis consectetur ullam, quos iste. Laudantium recusandae voluptas at doloribus consequatur eius eaque, nemo numquam similique, vero culpa quas velit labore iusto, exercitationem debitis! Consequatur!\r\nVoluptatibus provident dolores fugit et? Mollitia at ut corrupti dolorem veritatis quaerat dicta autem modi cumque dignissimos sequi, praesentium facilis ea iste dolorum, fugiat cupiditate eum. Molestiae ex facilis magni cum, sint labore mollitia quaerat dolores rem dignissimos esse, perferendis ipsa aliquid consequatur recusandae non eligendi ab omnis, dolor repellat veritatis qui nesciunt ullam, fugiat sit. Quis voluptate magni quos veniam excepturi vitae hic unde commodi doloremque quod ab officia ullam optio, pariatur dicta assumenda. Unde blanditiis adipisci a tempore?', 8000, 0, 50, 'kg', 0, 'sayur', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` varchar(30) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `toko_id` varchar(30) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `nomor_akun` varchar(40) NOT NULL,
  `total` int(11) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jasa_kirim` varchar(30) NOT NULL,
  `no_resi` varchar(30) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `status_pengiriman` varchar(30) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_updated` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `kode_transaksi`, `user_id`, `penerima`, `toko_id`, `nama_toko`, `bank`, `nomor_akun`, `total`, `telepon`, `alamat`, `jasa_kirim`, `no_resi`, `status`, `status_pengiriman`, `created_date`, `last_updated`) VALUES
('6127bc61dd4e7', '20210826060751', '42', 'Rahmat Afriyanton', '43', 'Annisa Nurul Kazhimah', 'bca', '49539777670', 39000, 'rahmatafriyanton', 'Perumahan ABC blok 10 no 11, Jakarta', 'JNE', '653736542246242', 'settlement', 'Diterima', '2021-08-26 23:08:01', '2021-08-26 18:10:28'),
('6127bc61df55d', '20210826060751', '42', 'Rahmat Afriyanton', '44', 'Budi', 'bca', '49539777670', 34000, 'rahmatafriyanton', 'Perumahan ABC blok 10 no 11, Jakarta', '', NULL, 'settlement', NULL, '2021-08-26 23:08:01', '2021-08-26 23:08:01'),
('61284e5d38b74', '20210827043043', '42', 'Rahmat Afriyanton', '43', 'Annisa Nurul Kazhimah', 'bca', '49539203470', 28500, 'rahmatafriyanton', 'Perumahan ABC blok 10 no 11, Jakarta', '', NULL, 'pending', NULL, '2021-08-27 09:30:53', '2021-08-27 09:30:53'),
('61284e5d39e1f', '20210827043043', '42', 'Rahmat Afriyanton', '44', 'Budi', 'bca', '49539203470', 24000, 'rahmatafriyanton', 'Perumahan ABC blok 10 no 11, Jakarta', '', NULL, 'pending', NULL, '2021-08-27 09:30:53', '2021-08-27 09:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_telepon` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `saldo_seller` int(11) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `level_user` enum('1','0') NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `user_email_status` enum('1','0') NOT NULL DEFAULT '0',
  `user_avatar` varchar(100) NOT NULL,
  `user_status_akun` enum('1','0') NOT NULL DEFAULT '1',
  `user_tanggal_registrasi` datetime NOT NULL DEFAULT current_timestamp(),
  `user_cookie` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_email`, `password`, `user_telepon`, `nama_lengkap`, `saldo_seller`, `tanggal_lahir`, `jenis_kelamin`, `level_user`, `alamat`, `user_email_status`, `user_avatar`, `user_status_akun`, `user_tanggal_registrasi`, `user_cookie`, `last_login`) VALUES
(42, 'rahmatafriyanton', 'rahmatafriyanton@gmail.com', 'd93a5def7511da3d0f2d171d9c344e91', 'rahmatafriyanton', 'Rahmat Afriyanton', 0, '2000-09-28', 'Laki-Laki', '0', 'Perumahan ABC blok 10 no 11, Jakarta', '0', '', '1', '2021-08-20 17:25:08', 'd12fabdf471239ea908859e7f1f8a1c9d5ff5911', '2021-09-03 18:56:41'),
(43, 'annkazh', 'annkazh@mail.com', 'd93a5def7511da3d0f2d171d9c344e91', '', 'Annisa Nurul Kazhimah', 39000, NULL, NULL, '0', '', '0', '', '1', '2021-08-20 17:32:27', 'e770f66902caac039a7af0689b9868e5f83994f8', '2021-09-02 10:50:26'),
(44, 'budiaja', 'budi@mail.com', 'd93a5def7511da3d0f2d171d9c344e91', '', 'Budi', 0, NULL, NULL, '0', '', '0', '', '1', '2021-08-26 13:36:35', 'e3e5a47eb915f92f327b2fa0c65ed009b1613955', '2021-08-26 09:40:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`chart_id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`detail_transaksi_id`);

--
-- Indexes for table `foto_produk`
--
ALTER TABLE `foto_produk`
  ADD PRIMARY KEY (`foto_produk_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `otp_email`
--
ALTER TABLE `otp_email`
  ADD PRIMARY KEY (`email_otp_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `chart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `detail_transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `foto_produk`
--
ALTER TABLE `foto_produk`
  MODIFY `foto_produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `otp_email`
--
ALTER TABLE `otp_email`
  MODIFY `email_otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
