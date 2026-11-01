-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: simara_batik
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `simara_batik`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `simara_batik` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `simara_batik`;

--
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `akun` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kdps` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmps` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `js` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hj` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun`
--

LOCK TABLES `akun` WRITE;
/*!40000 ALTER TABLE `akun` DISABLE KEYS */;
/*!40000 ALTER TABLE `akun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `berita`
--

DROP TABLE IF EXISTS `berita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `berita` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `berita_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `berita`
--

LOCK TABLES `berita` WRITE;
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` VALUES (1,'Koleksi Eksklusif SIMARA Batik Nusantara Terbaru','koleksi-eksklusif-simara-batik-nusantara-terbaru','Aruna Batik Nusantara kembali menghadirkan mahakarya terbaru dengan motif klasik dan modern berkualitas tinggi yang dikerjakan oleh para pembatik berpengalaman.','batik_sekar_jagad.png','Administrator','published','2026-10-29 15:24:31','2026-10-29 15:24:31','2026-10-29 15:24:31'),(2,'Pelestarian Warisan Budaya Batik Tulis Nusantara','pelestarian-warisan-budaya-batik-tulis-nusantara','Komitmen SIMARA Aruna Batik Nusantara dalam menjaga kelestarian teknik membatik canting tradisional khas Indonesia dengan pewarnaan ramah lingkungan.','batik_buketan.png','Administrator','published','2026-10-29 15:24:31','2026-10-29 15:24:31','2026-10-29 15:24:31'),(3,'Pesona Corak Batik Tulis Pesisiran Tegal','pesona-corak-batik-tulis-pesisiran-tegal','Mengenal keunikan corak batik pesisiran khas Tegal seperti motif Ambringan dan Sekar Jagad dengan karakter warna tegas yang sarat akan filosofi luhur.','batik_ambringan.png','Administrator','published','2026-10-29 23:57:22','2026-10-29 23:57:22','2026-10-29 23:57:22');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku_besar`
--

DROP TABLE IF EXISTS `buku_besar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buku_besar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idtrans` int DEFAULT NULL,
  `notran` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgltr` date DEFAULT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmldb` double DEFAULT NULL,
  `jmlcr` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku_besar`
--

LOCK TABLES `buku_besar` WRITE;
/*!40000 ALTER TABLE `buku_besar` DISABLE KEYS */;
/*!40000 ALTER TABLE `buku_besar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'Apakah batik Anda 100% tulis tangan?','Ya, semua produk kami adalah batik tulis tangan asli yang dikerjakan oleh pengrajin berpengalaman.',1,1,'2026-10-29 08:56:32','2026-10-29 08:56:32'),(2,'Apakah bisa pesan desain custom?','Tentu bisa! Kami menerima pesanan custom batik dengan motif dan warna sesuai keinginan Anda. Hubungi kami via WhatsApp untuk konsultasi.',2,1,'2026-10-29 08:56:32','2026-10-29 08:56:32'),(3,'Berapa lama waktu pembuatan batik custom?','Tergantung tingkat kerumitan motif. Umumnya 2–4 minggu untuk batik tulis. Kami akan mengkonfirmasi estimasi waktu saat Anda memesan.',3,1,'2026-10-29 08:56:32','2026-10-29 08:56:32'),(4,'Apakah tersedia pengiriman ke luar kota?','Ya, kami melayani pengiriman ke seluruh Indonesia melalui berbagai jasa ekspedisi. Ongkos kirim ditanggung pembeli.',4,1,'2026-10-29 08:56:32','2026-10-29 08:56:32'),(5,'Bagaimana cara merawat batik agar awet?','Cuci dengan tangan menggunakan sabun khusus batik atau shampo, jangan diperas, keringkan di tempat teduh, dan hindari sinar matahari langsung.',5,1,'2026-10-29 08:56:32','2026-10-29 08:56:32');
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeri`
--

LOCK TABLES `galeri` WRITE;
/*!40000 ALTER TABLE `galeri` DISABLE KEYS */;
INSERT INTO `galeri` VALUES (1,'Mahakarya Batik Sekar Jagad','Motif klasik lambang keindahan alam nusantara dengan detail canting halus dan warna alami.','photos/batik_sekar_jagad.png',1,1,'2026-10-29 23:54:31','2026-10-29 23:54:31'),(2,'Keanggunan Corak Ambringan','Motif flora pesisir khas Tegal dengan perpaduan warna kontemporer yang elegan.','photos/batik_ambringan.png',1,1,'2026-10-29 23:55:01','2026-10-29 23:55:01'),(3,'Pesona Batik Buketan Modern','Rangkaian corak buket bunga penuh keceriaan yang cocok untuk berbagai busana formal.','photos/batik_buketan.png',1,1,'2026-10-29 23:55:35','2026-10-30 00:45:54');
/*!40000 ALTER TABLE `galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hero_sliders`
--

DROP TABLE IF EXISTS `hero_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hero_sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan` int NOT NULL DEFAULT '0',
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hero_sliders`
--

LOCK TABLES `hero_sliders` WRITE;
/*!40000 ALTER TABLE `hero_sliders` DISABLE KEYS */;
INSERT INTO `hero_sliders` VALUES (1,'Selamat Datang di Aruna Batik Nusantara','Temukan koleksi batik tulis premium dengan motif khas pesisiran dan Nusantara','photos/slider_1.png',1,1,'2026-10-29 08:56:32','2026-10-30 00:16:06'),(2,'Koleksi Mahakarya Eksklusif','Batik tulis dengan bahan sutra & katun primissima serta pewarna alami berkualitas tinggi','photos/slider_2.png',2,1,'2026-10-29 08:56:32','2026-10-30 00:16:18'),(3,'Layanan Batik Custom & Seragam','Melayani pembuatan batik khusus instansi, keluarga, dan motif personal pilihan Anda','photos/slider_3.png',3,1,'2026-10-29 08:56:32','2026-10-30 00:16:29');
/*!40000 ALTER TABLE `hero_sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_kain`
--

DROP TABLE IF EXISTS `jenis_kain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_kain` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_kain`
--

LOCK TABLES `jenis_kain` WRITE;
/*!40000 ALTER TABLE `jenis_kain` DISABLE KEYS */;
INSERT INTO `jenis_kain` VALUES (1,'Katun Primissima','Kain katun kualitas tertinggi, serat sangat rapat dan halus, adem saat dikenakan serta menyerap warna secara sempurna.',75000,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(2,'Katun Prima','Kain katun standar pengrajin batik tulis, lembut, kuat, dan nyaman digunakan untuk busana harian.',50000,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(3,'Sutra Alam','Kain sutra asli bertekstur sangat lembut, jatuh anggun, berkilau mewah, dan eksklusif untuk acara resmi.',180000,'2026-10-30 00:11:12','2026-10-30 00:11:12');
/*!40000 ALTER TABLE `jenis_kain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kas_keluar`
--

DROP TABLE IF EXISTS `kas_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kas_keluar` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nokk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglkk` date NOT NULL,
  `memokk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmkk` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kas_keluar`
--

LOCK TABLES `kas_keluar` WRITE;
/*!40000 ALTER TABLE `kas_keluar` DISABLE KEYS */;
/*!40000 ALTER TABLE `kas_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kas_keluar_det`
--

DROP TABLE IF EXISTS `kas_keluar_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kas_keluar_det` (
  `idkk` bigint unsigned NOT NULL,
  `idakun` bigint unsigned NOT NULL,
  `nilcr` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kas_keluar_det`
--

LOCK TABLES `kas_keluar_det` WRITE;
/*!40000 ALTER TABLE `kas_keluar_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `kas_keluar_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kas_masuk`
--

DROP TABLE IF EXISTS `kas_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kas_masuk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nokm` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tglkm` date NOT NULL,
  `memokm` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlkmd` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kas_masuk`
--

LOCK TABLES `kas_masuk` WRITE;
/*!40000 ALTER TABLE `kas_masuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `kas_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kas_masuk_det`
--

DROP TABLE IF EXISTS `kas_masuk_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kas_masuk_det` (
  `idkm` bigint unsigned NOT NULL,
  `idakun` bigint unsigned NOT NULL,
  `nildb` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kas_masuk_det`
--

LOCK TABLES `kas_masuk_det` WRITE;
/*!40000 ALTER TABLE `kas_masuk_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `kas_masuk_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2024_12_01_055951_create_akuns_table',1),(5,'2024_12_01_055959_create_kas_keluars_table',1),(6,'2024_12_01_060007_create_kas_keluar_dets_table',1),(7,'2024_12_01_060016_create_buku_besars_table',1),(8,'2024_12_01_064238_create_kas_masuks_table',1),(9,'2024_12_01_064248_create_kas_masuk_dets_table',1),(10,'2024_12_01_092354_create_persediaans_table',1),(11,'2025_05_02_075229_create_motif_table',1),(12,'2025_05_02_075257_create_ukuran_table',1),(13,'2025_05_02_075432_create_jenis_kain_table',1),(14,'2025_05_02_082231_create_produksi_sendiri_table',1),(15,'2025_05_02_082300_create_setengah_jadi_table',1),(16,'2025_05_08_044121_create_penjualan_batik_table',1),(17,'2025_05_09_175407_create_permission_tables',1),(18,'2025_05_10_000000_create_pengeluaran_table',1),(19,'2025_05_31_113947_create_berita_table',1),(20,'2025_06_01_000001_create_site_settings_table',2),(21,'2025_06_01_000002_create_hero_sliders_table',2),(22,'2025_06_01_000003_create_galeri_table',2),(23,'2025_06_01_000004_create_faq_table',2),(24,'2025_06_01_000005_create_pesanan_table',2),(25,'2025_06_01_000006_add_tipe_akun_to_users_table',2),(26,'2025_06_01_000007_make_nama_ibu_nullable_on_users_table',3),(27,'2025_06_01_000008_add_foto_to_users_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motif`
--

DROP TABLE IF EXISTS `motif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `motif` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `motif_kode_motif_unique` (`kode_motif`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motif`
--

LOCK TABLES `motif` WRITE;
/*!40000 ALTER TABLE `motif` DISABLE KEYS */;
INSERT INTO `motif` VALUES (1,'MTF-001','Sekar Jagad','Motif klasik khas nusantara lambang keanekaragaman, keindahan, dan pesona alam yang harmonis.',50000,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(2,'MTF-002','Ambringan','Motif anggun dengan nuansa flora khas pesisir yang melambangkan kelemahlembutan budi pekerti.',45000,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(3,'MTF-003','Buketan','Motif rangkaian buket bunga berpadu corak tradisional dan modern bernuansa ceria serta dinamis.',40000,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(4,'MTF-004','Suluran','Motif sulur dedaunan saling mengikat melambangkan ikatan tali silaturahmi dan kehidupan yang bertumbuh.',35000,'2026-10-30 00:11:12','2026-10-30 00:11:12');
/*!40000 ALTER TABLE `motif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengeluaran`
--

DROP TABLE IF EXISTS `pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengeluaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `jumlah` double(15,2) NOT NULL DEFAULT '1.00',
  `total` double(15,2) NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengeluaran`
--

LOCK TABLES `pengeluaran` WRITE;
/*!40000 ALTER TABLE `pengeluaran` DISABLE KEYS */;
INSERT INTO `pengeluaran` VALUES (1,'2026-10-24','Bahan Baku & Malam','Pembelian lilin malam batik kualitas super dan canting kuningan',5.00,350000.00,'Toko Bahan Kimia Batik Sejahtera','Transfer Bank',NULL,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(2,'2026-10-27','Pewarna Alami & Kimia','Pembelian zat pewarna naptol dan remasol untuk 20 kain batik',10.00,480000.00,'Pewarna Alam Nusantara','Tunai',NULL,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(3,'2026-10-28','Operasional Workshop','Biaya perawatan kompor minyak batik dan listrik workshop',1.00,250000.00,'PLN & Pengelola Workshop','Transfer Bank',NULL,'2026-10-30 00:11:12','2026-10-30 00:11:12');
/*!40000 ALTER TABLE `pengeluaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan_batik`
--

DROP TABLE IF EXISTS `penjualan_batik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penjualan_batik` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_penjualan` date NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` bigint unsigned DEFAULT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_produk` enum('setengah_jadi','produksi_sendiri') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_item` int unsigned NOT NULL,
  `harga_satuan` double(15,2) NOT NULL,
  `total_bayar` double(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_pembayaran` enum('lunas','belum_lunas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_lunas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan_batik`
--

LOCK TABLES `penjualan_batik` WRITE;
/*!40000 ALTER TABLE `penjualan_batik` DISABLE KEYS */;
INSERT INTO `penjualan_batik` VALUES (1,'2026-10-25','Hj. Siti Rahmawati',1,'MTF-001-001','Kain Batik Tulis Sekar Jagad Eksklusif','produksi_sendiri',2,450000.00,900000.00,'Pesanan seragam hajatan keluarga',NULL,'lunas','2026-10-30 00:11:12','2026-10-30 00:11:12'),(2,'2026-10-28','Bapak Bambang Wijaya',3,'MTF-003-003','Kain Batik Tulis Buketan Sutra Premium','produksi_sendiri',1,650000.00,650000.00,'Pembelian kado eksklusif untuk kolega',NULL,'lunas','2026-10-30 00:11:12','2026-10-30 00:11:12'),(3,'2026-10-26','Konveksi Berkah Jaya',1,'MTF-001-SJ-001','Bahan Pola Kemeja Batik Sekar Jagad','setengah_jadi',5,250000.00,1250000.00,'Bahan pembuatan kemeja kantor pesanan instansi',NULL,'lunas','2026-10-30 00:11:12','2026-10-30 00:11:12'),(4,'2026-10-29','Ibu Dewi Sartika',2,'MTF-003-SJ-002','Bahan Pola Kain Polos Motif Buketan','setengah_jadi',2,190000.00,380000.00,'Bahan untuk pembuatan gamis pesta',NULL,'lunas','2026-10-30 00:11:12','2026-10-30 00:11:12');
/*!40000 ALTER TABLE `penjualan_batik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persediaan`
--

DROP TABLE IF EXISTS `persediaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persediaan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kdps` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nmps` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int unsigned NOT NULL,
  `hj` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persediaan`
--

LOCK TABLES `persediaan` WRITE;
/*!40000 ALTER TABLE `persediaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `persediaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pesanan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `produk_id` bigint unsigned DEFAULT NULL,
  `sumber_produk` enum('produksi_sendiri','setengah_jadi') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` double(15,2) NOT NULL DEFAULT '0.00',
  `total` double(15,2) NOT NULL DEFAULT '0.00',
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `status_pesanan` enum('pending','diproses','selesai','dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status_pengiriman` enum('menunggu','dikirim','diterima') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `alamat_pengiriman` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pesanan_user_id_foreign` (`user_id`),
  CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesanan`
--

LOCK TABLES `pesanan` WRITE;
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
INSERT INTO `pesanan` VALUES (1,2,NULL,'produksi_sendiri','Batik Tulis Parang Barong',2,350000.00,700000.00,'Mohon dikemas dengan kotak kado batik','diproses','dikirim','Jl. Mawar Indah No. 45, Yogyakarta','081298765432','2026-10-29 09:09:17','2026-10-29 09:09:17');
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produksi_sendiri`
--

DROP TABLE IF EXISTS `produksi_sendiri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produksi_sendiri` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif_id` bigint unsigned NOT NULL,
  `jenis_kain_id` bigint unsigned NOT NULL,
  `ukuran_id` bigint unsigned NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `harga` double(15,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `produksi_sendiri_kode_produk_unique` (`kode_produk`),
  KEY `produksi_sendiri_motif_id_foreign` (`motif_id`),
  KEY `produksi_sendiri_jenis_kain_id_foreign` (`jenis_kain_id`),
  KEY `produksi_sendiri_ukuran_id_foreign` (`ukuran_id`),
  CONSTRAINT `produksi_sendiri_jenis_kain_id_foreign` FOREIGN KEY (`jenis_kain_id`) REFERENCES `jenis_kain` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produksi_sendiri_motif_id_foreign` FOREIGN KEY (`motif_id`) REFERENCES `motif` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produksi_sendiri_ukuran_id_foreign` FOREIGN KEY (`ukuran_id`) REFERENCES `ukuran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produksi_sendiri`
--

LOCK TABLES `produksi_sendiri` WRITE;
/*!40000 ALTER TABLE `produksi_sendiri` DISABLE KEYS */;
INSERT INTO `produksi_sendiri` VALUES (1,'Kain Batik Tulis Sekar Jagad Eksklusif','MTF-001-001',1,1,1,15,450000.00,'photos/batik_sekar_jagad.png','2026-10-30 00:11:12','2026-10-30 00:19:29'),(2,'Kain Batik Tulis Ambringan Pesisir','MTF-002-002',2,2,1,10,375000.00,'photos/batik_ambringan.png','2026-10-30 00:11:12','2026-10-30 00:19:41'),(3,'Kain Batik Tulis Buketan Sutra Premium','MTF-003-003',3,3,2,8,650000.00,'photos/batik_buketan.png','2026-10-30 00:11:12','2026-10-30 00:19:56'),(4,'Kain Batik Tulis Suluran Daun Hijau','MTF-004-004',4,1,3,12,320000.00,'photos/batik_suluran.png','2026-10-30 00:11:12','2026-10-30 00:20:13');
/*!40000 ALTER TABLE `produksi_sendiri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setengah_jadi`
--

DROP TABLE IF EXISTS `setengah_jadi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `setengah_jadi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif_id` bigint unsigned NOT NULL,
  `jenis_kain_id` bigint unsigned NOT NULL,
  `ukuran_id` bigint unsigned NOT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `harga` double(15,2) NOT NULL DEFAULT '0.00',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setengah_jadi_kode_produk_unique` (`kode_produk`),
  KEY `setengah_jadi_motif_id_foreign` (`motif_id`),
  KEY `setengah_jadi_jenis_kain_id_foreign` (`jenis_kain_id`),
  KEY `setengah_jadi_ukuran_id_foreign` (`ukuran_id`),
  CONSTRAINT `setengah_jadi_jenis_kain_id_foreign` FOREIGN KEY (`jenis_kain_id`) REFERENCES `jenis_kain` (`id`) ON DELETE CASCADE,
  CONSTRAINT `setengah_jadi_motif_id_foreign` FOREIGN KEY (`motif_id`) REFERENCES `motif` (`id`) ON DELETE CASCADE,
  CONSTRAINT `setengah_jadi_ukuran_id_foreign` FOREIGN KEY (`ukuran_id`) REFERENCES `ukuran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setengah_jadi`
--

LOCK TABLES `setengah_jadi` WRITE;
/*!40000 ALTER TABLE `setengah_jadi` DISABLE KEYS */;
INSERT INTO `setengah_jadi` VALUES (1,'Bahan Pola Kemeja Batik Sekar Jagad','MTF-001-SJ-001',1,1,1,20,250000.00,'photos/batik_sekar_jagad.png','2026-10-30 00:11:12','2026-10-30 00:18:28'),(2,'Bahan Pola Kain Polos Motif Buketan','MTF-003-SJ-002',3,2,3,14,190000.00,'photos/batik_buketan.png','2026-10-30 00:11:12','2026-10-30 00:19:09'),(3,'Kain Mori Berpola Lilin Motif Ambringan','MTF-002-SJ-003',2,1,2,25,175000.00,'photos/batik_ambringan.png','2026-10-30 00:11:12','2026-10-30 00:18:53');
/*!40000 ALTER TABLE `setengah_jadi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_settings` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `type` enum('text','image','json','textarea') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES ('alamat','Jl. Gajah Mada No. 88, Tegal Barat, Kota Tegal, Jawa Tengah 52113','text','Alamat Toko','2026-10-29 08:56:31','2026-10-29 08:56:31'),('deskripsi_toko','Aruna Batik Nusantara adalah produsen dan galeri batik tulis berkualitas tinggi yang berbasis di Tegal, Jawa Tengah. Kami menghadirkan mahakarya batik autentik perpaduan seni tradisional nusantara dan estetika modern.','textarea','Deskripsi Toko','2026-10-29 08:56:31','2026-10-29 08:56:31'),('email','kontak@arunabatik.com','text','Email Toko','2026-10-29 08:56:31','2026-10-29 08:56:31'),('facebook','https://facebook.com','text','URL Facebook','2026-10-29 08:56:31','2026-10-30 00:15:35'),('footer_teks','© 2025 SIMARA - Aruna Batik Nusantara. Hak cipta dilindungi.','text','Teks Footer','2026-10-29 08:56:31','2026-10-29 08:56:31'),('instagram','https://instagram.com','text','URL Instagram','2026-10-29 08:56:31','2026-10-30 00:15:35'),('jam_buka','Senin–Sabtu: 08.30–17.00 WIB','text','Jam Operasional','2026-10-29 08:56:31','2026-10-29 08:56:31'),('logo','asset/img/logo_batik.png','image','Logo Toko','2026-10-29 08:56:31','2026-10-30 00:15:35'),('misi','1. Memproduksi kain batik tulis autentik dengan standar mutu tertinggi.\n2. Mengedukasi masyarakat luas tentang filosofi dan pelestarian corak batik nusantara.\n3. Memberdayakan pembatik dan perajin lokal di sentra daerah.','textarea','Misi','2026-10-29 08:56:32','2026-10-30 00:15:35'),('nama_toko','Aruna Batik Nusantara','text','Nama Toko','2026-10-29 08:56:31','2026-10-29 08:56:31'),('tagline','Keanggunan Mahakarya Batik Tulis Nusantara','text','Tagline / Slogan','2026-10-29 08:56:31','2026-10-29 08:56:31'),('tentang_isi','Aruna Batik Nusantara berakar dari kecintaan terhadap warisan mahakarya kain batik nusantara, khususnya corak pesisiran Jawa Tengah. Kami berkomitmen menjaga keluhuran teknik batik tulis tradisional dengan sentuhan pewarnaan alami dan inovasi desain kontemporer.','textarea','Isi Halaman Tentang','2026-10-29 08:56:31','2026-10-29 08:56:31'),('tentang_judul','Tentang Aruna Batik Nusantara','text','Judul Halaman Tentang','2026-10-29 08:56:31','2026-10-29 08:56:31'),('visi','Menjadi pusat rujukan mahakarya batik tulis berkualitas tinggi yang membanggakan warisan nusantara di kancah nasional dan internasional.','textarea','Visi','2026-10-29 08:56:31','2026-10-29 08:56:31'),('whatsapp','6281234567890','text','Nomor WhatsApp (tanpa +)','2026-10-29 08:56:31','2026-10-29 08:56:31');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ukuran`
--

DROP TABLE IF EXISTS `ukuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ukuran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ukuran`
--

LOCK TABLES `ukuran` WRITE;
/*!40000 ALTER TABLE `ukuran` DISABLE KEYS */;
INSERT INTO `ukuran` VALUES (1,'200 x 115 cm','Ukuran standar untuk bahan kemeja lengan panjang pria atau jarik bawahan wanita.',0,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(2,'250 x 115 cm','Ukuran panjang ekstra ideal untuk gamis, selendang panjang, atau dress terusan.',0,'2026-10-30 00:11:12','2026-10-30 00:11:12'),(3,'180 x 100 cm','Ukuran medium untuk bahan atasan blus, kemeja pendek, atau rok lilit.',0,'2026-10-30 00:11:12','2026-10-30 00:11:12');
/*!40000 ALTER TABLE `ukuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_akun` enum('admin','pelanggan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `pemilik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'STAFF',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator SIMARA','admin','admin@arunabatik.com','$2y$10$TaINYMmsh4b3vUByrI0exuueCxVId7Y46TnoL6w6ojnQib6mrFORS','PEMILIK','admin','PEMILIK','Jl. Gajah Mada No. 88, Tegal Barat, Kota Tegal, Jawa Tengah 52113',NULL,'081234567890','ACTIVE','Ibu Aruna','2026-10-29 07:41:49','2026-10-29 07:41:49'),(2,'Budi Santoso (Pelanggan)','budi_pelanggan','pelanggan@arunabatik.com','$2y$10$j9ROuYYyzfi8vOozA/AND.hHSwW7WYuHJz9KcJUq.Ylr4lrkTm2mi','PELANGGAN','pelanggan','STAFF','Jl. Mawar Indah No. 45, Yogyakarta',NULL,'081298765432','ACTIVE',NULL,'2026-10-29 09:09:17','2026-10-29 09:09:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-11-01 23:13:51
