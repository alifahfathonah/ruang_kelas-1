-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2020 pada 17.00
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_kelas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail`
--

CREATE TABLE `t_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_foto` text NOT NULL,
  `detail_id_user` int(11) DEFAULT NULL,
  `detail_username` text,
  `detail_email` text,
  `detail_first_name` text,
  `detail_last_name` text,
  `detail_address` text,
  `detail_city` text,
  `detail_country` text,
  `detail_pos` char(50) DEFAULT NULL,
  `detail_about` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail`
--

INSERT INTO `t_detail` (`detail_id`, `detail_foto`, `detail_id_user`, `detail_username`, `detail_email`, `detail_first_name`, `detail_last_name`, `detail_address`, `detail_city`, `detail_country`, `detail_pos`, `detail_about`) VALUES
(1, '', 1, 'Nila', 'karindanila@gmail.com', 'Nila ', 'Karinda', 'Ds. Banjarsari RT/RW 03/01 Kec Selorejo', 'Blitar', 'Indonesia', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_diskusi`
--

CREATE TABLE `t_diskusi` (
  `diskusi_id` int(11) NOT NULL,
  `diskusi_iduser` int(11) DEFAULT NULL,
  `diskusi_text` text,
  `diskusi_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_diskusi`
--

INSERT INTO `t_diskusi` (`diskusi_id`, `diskusi_iduser`, `diskusi_text`, `diskusi_tanggal`) VALUES
(1, 1, 'test', '2020-02-09'),
(2, 9, 'siap', '2020-02-09'),
(3, 11, 'ohh', '2020-02-09'),
(4, 1, 'siap', '2020-02-09'),
(5, 1, 'testetse', '2020-02-09'),
(6, 9, 'okokok', '2020-04-24'),
(7, 1, 'ok\r\n', '2020-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_evaluasi`
--

CREATE TABLE `t_evaluasi` (
  `evaluasi_id` text NOT NULL,
  `evaluasi_judul` text,
  `evaluasi_jumlah` int(11) DEFAULT NULL,
  `evaluasi_pertanyaan` text,
  `evaluasi_uraian` text,
  `evaluasi_mapel` text,
  `evaluasi_hapus` int(11) DEFAULT '0',
  `evaluasi_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_evaluasi`
--

INSERT INTO `t_evaluasi` (`evaluasi_id`, `evaluasi_judul`, `evaluasi_jumlah`, `evaluasi_pertanyaan`, `evaluasi_uraian`, `evaluasi_mapel`, `evaluasi_hapus`, `evaluasi_tanggal`) VALUES
('SOAL1', 'Evaluasi', 2, '{"evaluasi_judul":"Evaluasi","evaluasi_uraian":"5","evaluasi_id":"SOAL1","evaluasi_bobot":"50","evaluasi_timer":"","evaluasi_jumlah":"2","soal_pertanyaan1":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\n              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\n              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\n              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\n              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\n              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.","gambar1":"SOAL1_1","a1":"a","b1":"b","c1":"c","d1":"d","e1":"e","soal_kunci_jawaban1":"A","soal_pertanyaan2":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\n              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\n              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\n              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\n              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\n              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.","gambar2":"SOAL1_2","a2":"a","b2":"b","c2":"c","d2":"d","e2":"e","soal_kunci_jawaban2":"B"}', '5', '2', 0, '2020-11-01'),
('SOAL2', 'Mengenal Coding', 2, '{"evaluasi_judul":"Mengenal Coding","evaluasi_uraian":"3","evaluasi_id":"SOAL2","evaluasi_bobot":"50","evaluasi_timer":"70","evaluasi_jumlah":"2","soal_pertanyaan1":"satu","gambar1":"SOAL2_1","a1":"a","b1":"b","c1":"c","d1":"d","e1":"e","soal_kunci_jawaban1":"B","soal_pertanyaan2":"dua","gambar2":"SOAL2_2","a2":"a","b2":"b","c2":"c","d2":"d","e2":"e","soal_kunci_jawaban2":"B"}', '3', '1', 0, '2020-11-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_film`
--

CREATE TABLE `t_film` (
  `film_id` int(11) NOT NULL,
  `film_judul` text,
  `film_link` text,
  `film_mapel` text,
  `film_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_film`
--

INSERT INTO `t_film` (`film_id`, `film_judul`, `film_link`, `film_mapel`, `film_tanggal`) VALUES
(2, 'Sistem Indera Pada Manusia', '9P9hSyj0o5I', '3', '2020-01-24'),
(3, 'Ngoding untuk pemula', 'sKrri__gMIQ', '1', '2020-11-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hasil`
--

CREATE TABLE `t_hasil` (
  `hasil_id` int(11) NOT NULL,
  `hasil_siswa` text,
  `hasil_mapel` text,
  `hasil_soal` text,
  `hasil_pertanyaan` text,
  `hasil_nilai` text,
  `hasil_status` text,
  `hasil_uraian` text,
  `hasil_uraian_nilai` text,
  `hasil_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hasil`
--

INSERT INTO `t_hasil` (`hasil_id`, `hasil_siswa`, `hasil_mapel`, `hasil_soal`, `hasil_pertanyaan`, `hasil_nilai`, `hasil_status`, `hasil_uraian`, `hasil_uraian_nilai`, `hasil_tanggal`) VALUES
(12, '11', '2', 'SOAL1', '{"evaluasi_judul":"Evaluasi","evaluasi_mapel":"MTK","mapel":"2","evaluasi_id":"SOAL1","evaluasi_bobot":"50","evaluasi_timer":"70","evaluasi_jumlah":"2","a1":"a","b1":"b","c1":"c","d1":"d","e1":"e","soal_kunci_jawaban1":"7fc56270e7a70fa81a5935b72eacbe29","soal_jawaban1":"D","a2":"a","b2":"b","c2":"c","d2":"d","e2":"e","soal_kunci_jawaban2":"9d5ed678fe57bcca610140957afab571","soal_jawaban2":"C"}', '20', '1', '5', '100', '2020-11-15'),
(13, '11', '1', 'SOAL2', '{"evaluasi_judul":"Mengenal Coding","evaluasi_mapel":" TKJ ","mapel":"1","evaluasi_id":"SOAL2","evaluasi_bobot":"50","evaluasi_timer":"70","evaluasi_jumlah":"2","a1":"a","b1":"b","c1":"c","d1":"d","e1":"e","soal_kunci_jawaban1":"9d5ed678fe57bcca610140957afab571","soal_jawaban1":"D","a2":"a","b2":"b","c2":"c","d2":"d","e2":"e","soal_kunci_jawaban2":"9d5ed678fe57bcca610140957afab571","soal_jawaban2":"E"}', '0', '0', '3', NULL, '2020-11-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kurikulum`
--

CREATE TABLE `t_kurikulum` (
  `kurikulum_id` int(11) NOT NULL,
  `kurikulum_isi` text,
  `kurikulum_tgl_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kurikulum`
--

INSERT INTO `t_kurikulum` (`kurikulum_id`, `kurikulum_isi`, `kurikulum_tgl_edit`) VALUES
(1, '<div class="ql-editor" data-gramm="false" contenteditable="true"><p>Kompetensi Inti</p><p>KI-1 : Menghayati dan mengamalkan ajaran </p><p>          agama yang dianutnya.</p><p>KI-2 : Menghayati dan mengamalkan </p><p>          perilaku jujur, disiplin, santun, peduli            </p><p>          (gotong royong, kerjasama, toleran, </p><p>          damai), bertanggung </p><p>		  jawab, responsif, dan pro-aktif dalam </p><p>          berinteraksi secara efektif sesuai </p><p>          dengan perkembangan anak di </p><p>          lingkungan keluarga, </p><p>		  sekolah, masyarakat dan lingkungan </p><p>          alam sekitar, bangsa, negara, kawasan </p><p>          regional, dan kawasan internasional”.</p><p>KI 3  : Memahami, menerapkan, dan </p><p>          menganalisis pengetahuan faktual, </p><p>          konseptual, prosedural, dan </p><p>          metakognitif berdasarkan rasa ingin </p><p>          tahunya tentang ilmu pengetahuan, </p><p>          teknologi, seni, budaya, dan </p><p>          humaniora dengan wawasan </p><p>          kemanusiaan, kebangsaan, </p><p>          kenegaraan, dan peradaban terkait </p><p>          penyebab fenomena dan kejadian, </p><p>          serta menerapkan pengetahuan </p><p>          prosedural pada bidang kajian yang </p><p>          spesifik sesuai dengan bakat dan </p><p>          minatnya untuk memecahkan </p><p>          masalah.</p><p>KI4&nbsp;: Mengolah, menalar, dan menyaji dalam  </p><p>         ranah konkret dan ranah abstrak </p><p>         terkait dengan pengembangan dari </p><p>         yang dipelajarinya di sekolah secara </p><p>         mandiri, bertindak secara efektif dan </p><p>         kreatif, serta mampu menggunakan </p><p>         metode sesuai kaidah&nbsp;keilmuan</p><p><br></p><p>Kompetensi Dasar</p><p>3.10 Menganalisis hubungan antara struktur </p><p>         jaringan penyusun organ pada sistem </p><p>         koordinasi (saraf, hormone dan alat </p><p>         indera) dalam kaitannya dengan </p><p>         mekanisme koordinasi dan regulasi </p><p>         serta gangguan fungsi yang dapat </p><p>         terjadi pada sistem koordinasi </p><p>         manusia</p><p>4.10 Menyajikan hasil analisis pengaruh pola </p><p>         hidup terhadap kelainan pada struktur </p><p>         dan fungsi organ sistem koordinasi </p><p>         yang menyebabkan gangguan sistem </p><p>         saraf dan hormon pada manusia </p><p>         berdasarkan studi literatur.</p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden" style="margin-top: -979.412px;"><a class="ql-preview" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div>', '2020-05-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mapel`
--

CREATE TABLE `t_mapel` (
  `mapel_id` int(11) NOT NULL,
  `mapel_nama` text NOT NULL,
  `mapel_kepanjangan` text NOT NULL,
  `mapel_hapus` int(11) NOT NULL DEFAULT '0',
  `mapel_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_mapel`
--

INSERT INTO `t_mapel` (`mapel_id`, `mapel_nama`, `mapel_kepanjangan`, `mapel_hapus`, `mapel_tanggal`) VALUES
(1, ' TKJ ', 'Teknik Komputer Jaringan', 0, '2020-11-13'),
(2, 'MTK', 'Matematika', 0, '2020-11-13'),
(3, 'IPA', 'Ilmu Pengetahuan Alam', 0, '2020-11-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_materi`
--

CREATE TABLE `t_materi` (
  `materi_id` int(11) NOT NULL,
  `materi_isi` text,
  `materi_judul` text,
  `materi_mapel` text,
  `materi_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_materi`
--

INSERT INTO `t_materi` (`materi_id`, `materi_isi`, `materi_judul`, `materi_mapel`, `materi_tanggal`) VALUES
(5, '<p>Sistem indera adalah salah satu bagian dari sistem koordinasi yang merupakan penerima rangsang atau reseptor. Alat indera adalah reseptor yang peka terhadap rangsangan dan perubahan di sekitarnya.</p>\r\n\r\n<p>A. MATAMata berfungsi sebagai indra penglihatan (fotoreseptor). Reseptor mata adalah fovea centralis pada retina, yang merupakan lapisan mata terdalam yang peka terhadap cahaya. Bola mata terdiri dari tiga lapisan:1) Sklera (tunika fibrosa), lapisan terluar yang berwarna putih dan tidak bening. 2) Koroid (tunika vaskulosa), lapisan tengah yang mengandung pembuluh darah dan pigmen. Pembuluh darah mensuplai nutrisi bagi mata dan pigmen berfungsi menyerap refleksi cahaya pada mata. 3) Retina (tunika nervosa), lapisan terdalam mata yang banyak mengandung sel-sel fotoreseptor, antara lain: a. Sel kerucut (konus), peka terhadap intensitas cahaya tinggi dan warna. Sel konus terdiri dari sel yang peka terhadap warna merah, biru dan hijau. Sel konus menghasilkan iodopsin berupa retinin untuk melihat saat terang.</p>\r\n\r\n<p>b. Sel batang (basil), peka terhadap intensitas cahaya rendah dan tidak peka terhadap warna. Sel basil menghasilkan rhodopsin berupa retinin dan opsin untuk melihat saat gelap. Mata butuh adaptasi untuk memproduksi rhodopsin saat gelap mendadak, sehingga mata mengalami kebutaan sementara.Struktur Bola Mataa. Kornea Adalah bagian sklera yang bening dan dilindungi oleh lapisan konjungtiva yang melindungi kornea dari gesekan. Fungsi kornea adalah memfokuskan bayangan yang masuk ke mata.b. Aqueous humor Adalah cairan yang dihasilkan badan siliaris dan mengisi bagian depan lensa. Fungsi aqueous humor adalah memberi nutrisi bagi kornea dan lensa, dan membiaskan cahaya yang masuk ke mata.c. Pupil Adalah jalan masuknya cahaya ke mata.d. Iris (selaput pelangi) Adalah bagian koroid yang mengatur diameter pupil yang mempengaruhi jumlah cahaya masuk. Saat terang, iris akan mempersempit pupil, dan saat gelap, iris akan memperlebar pupil. Otot yang mengatur diameter pupil adalah otot sfingter (sirkuler) dan dilator (radial).e. Lensa mata Adalah lensa bikonkaf bening dari serat protein. Daya akomodasi adalah kemampuan lensa mata untuk mengubah kecembungan sehingga bayangan jatuh tepat pada retina.f. Vitreous humor Adalah cairan yang mengisi bagian belakang lensa mata (isi bola mata). Fungsi vitreous humor adalah menjaga bentuk dan tekanan bola mata.g. Bintik buta Adalah bagian yang tidak mengandung selsel fotoreseptor. Bintik buta adalah daerah awal saraf optik meninggalkan bola mata.h. Saraf optik (II) Adalah saraf yang mengatur indra penglihatan.</p>\r\n', 'Sistem Indera Pada Manusia', '3', '2020-11-15'),
(6, '<p>joss gandos kotos-kotos sampek mbledos</p>\r\n', 'Materi Wifi Joss', '1', '2020-11-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pengaturan`
--

CREATE TABLE `t_pengaturan` (
  `pengaturan_id` int(11) NOT NULL,
  `pengaturan_background` text,
  `pengaturan_background_status` text,
  `pengaturan_kkm` char(50) DEFAULT NULL,
  `pengaturan_logo` text,
  `pengaturan_latar` text,
  `pengaturan_latar_status` text,
  `pengaturan_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pengaturan`
--

INSERT INTO `t_pengaturan` (`pengaturan_id`, `pengaturan_background`, `pengaturan_background_status`, `pengaturan_kkm`, `pengaturan_logo`, `pengaturan_latar`, `pengaturan_latar_status`, `pengaturan_tanggal`) VALUES
(1, '1048.png', NULL, '70', 'blue.png', '#9d9dff', 'on', '2020-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_uraian`
--

CREATE TABLE `t_uraian` (
  `uraian_id` int(11) NOT NULL,
  `uraian_judul` text,
  `uraian_soal` text,
  `uraian_status` int(11) DEFAULT NULL,
  `uraian_mapel` int(11) DEFAULT NULL,
  `uraian_hapus` int(11) DEFAULT '0',
  `uraian_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_uraian`
--

INSERT INTO `t_uraian` (`uraian_id`, `uraian_judul`, `uraian_soal`, `uraian_status`, `uraian_mapel`, `uraian_hapus`, `uraian_tanggal`) VALUES
(3, 'Uraian 2', '{"uraian_judul":"Uraian 2","id":"3","soal1":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal2":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal3":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal4":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal5":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum."}', 1, 1, 0, '2020-04-22'),
(5, 'Uraian 1', '{"uraian_judul":"Uraian","id":"5","soal1":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal2":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal3":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal4":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal5":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum."}', 1, 3, 0, '2020-04-22'),
(6, 'Uraian', '{"uraian_judul":"Uraian","id":"5","soal1":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal2":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal3":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal4":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal5":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum."}', 1, 2, 0, '2020-04-22'),
(7, 'Uraian 0', '{"uraian_judul":"Uraian","id":"5","soal1":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal2":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal3":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal4":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","soal5":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum."}', 1, 2, 0, '2020-04-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_uraian_hasil`
--

CREATE TABLE `t_uraian_hasil` (
  `uraian_hasil_id` int(11) NOT NULL,
  `uraian_hasil_judul` text,
  `uraian_hasil_soal` text,
  `uraian_hasil_hasil` text,
  `uraian_hasil_mapel` text,
  `uraian_hasil_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_uraian_hasil`
--

INSERT INTO `t_uraian_hasil` (`uraian_hasil_id`, `uraian_hasil_judul`, `uraian_hasil_soal`, `uraian_hasil_hasil`, `uraian_hasil_mapel`, `uraian_hasil_tanggal`) VALUES
(6, 'Uraian', '{"uraian_judul":"Uraian","id":"SOAL1","uraian_mapel":"IPA","mapel":"3","soal1":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban1":"s","soal2":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban2":"s","soal3":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban3":"s","soal4":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban4":"s","soal5":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban5":"s"}', '12', '3', '2020-11-15'),
(7, 'Uraian 2', '{"uraian_judul":"Uraian 2","id":"SOAL2","uraian_mapel":" TKJ ","mapel":"1","soal1":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban1":"a","soal2":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban2":"b","soal3":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban3":"c","soal4":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban4":"d","soal5":"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\\r\\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\\r\\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\\r\\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\\r\\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\\r\\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.","jawaban5":"e"}', '13', '1', '2020-11-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL,
  `user_hapus` int(11) DEFAULT '0',
  `user_name` text,
  `user_email` text,
  `user_password` text,
  `user_tempat_lahir` text,
  `user_tgl_lahir` date DEFAULT NULL,
  `user_alamat` text,
  `user_tlp` text,
  `user_biodata` text,
  `user_level` int(11) DEFAULT NULL,
  `user_mapel` int(11) DEFAULT NULL,
  `user_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`user_id`, `user_hapus`, `user_name`, `user_email`, `user_password`, `user_tempat_lahir`, `user_tgl_lahir`, `user_alamat`, `user_tlp`, `user_biodata`, `user_level`, `user_mapel`, `user_tanggal`) VALUES
(1, 0, 'Pembimbing', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2020-01-23'),
(9, 0, 'Sasuke', '12345', '827ccb0eea8a706c4c34a16891f84e7b', 'Konoha', '2020-01-22', 'Konoha Gakure', '08517178187', NULL, 3, NULL, '2020-01-23'),
(11, 0, 'Naruto', '123', '202cb962ac59075b964b07152d234b70', 'Konoha', '2020-01-08', 'Konoha Gakure', '08638638763', NULL, 3, NULL, '2020-01-24'),
(12, 0, 'Imam Ghozali', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Konoha', '2020-11-02', 'alamat', '085858588585', NULL, 2, 2, '2020-11-14'),
(14, 0, 'Siti Fadilah', '123', '202cb962ac59075b964b07152d234b70', 'Konoha', '2020-11-25', 'alamat', '0685875885', NULL, 2, 1, '2020-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_detail`
--
ALTER TABLE `t_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `t_diskusi`
--
ALTER TABLE `t_diskusi`
  ADD PRIMARY KEY (`diskusi_id`);

--
-- Indexes for table `t_film`
--
ALTER TABLE `t_film`
  ADD PRIMARY KEY (`film_id`);

--
-- Indexes for table `t_hasil`
--
ALTER TABLE `t_hasil`
  ADD PRIMARY KEY (`hasil_id`);

--
-- Indexes for table `t_kurikulum`
--
ALTER TABLE `t_kurikulum`
  ADD PRIMARY KEY (`kurikulum_id`);

--
-- Indexes for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `t_materi`
--
ALTER TABLE `t_materi`
  ADD PRIMARY KEY (`materi_id`);

--
-- Indexes for table `t_pengaturan`
--
ALTER TABLE `t_pengaturan`
  ADD PRIMARY KEY (`pengaturan_id`);

--
-- Indexes for table `t_uraian`
--
ALTER TABLE `t_uraian`
  ADD PRIMARY KEY (`uraian_id`);

--
-- Indexes for table `t_uraian_hasil`
--
ALTER TABLE `t_uraian_hasil`
  ADD PRIMARY KEY (`uraian_hasil_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_detail`
--
ALTER TABLE `t_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_diskusi`
--
ALTER TABLE `t_diskusi`
  MODIFY `diskusi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_film`
--
ALTER TABLE `t_film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_hasil`
--
ALTER TABLE `t_hasil`
  MODIFY `hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_kurikulum`
--
ALTER TABLE `t_kurikulum`
  MODIFY `kurikulum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_mapel`
--
ALTER TABLE `t_mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_materi`
--
ALTER TABLE `t_materi`
  MODIFY `materi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_pengaturan`
--
ALTER TABLE `t_pengaturan`
  MODIFY `pengaturan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_uraian`
--
ALTER TABLE `t_uraian`
  MODIFY `uraian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_uraian_hasil`
--
ALTER TABLE `t_uraian_hasil`
  MODIFY `uraian_hasil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
