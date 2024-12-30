-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 31, 2024 lúc 12:55 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(2, 'Phim Lẻ', 'Phim lẻ cập nhật hằng ngày', 1, 'phim-le', 2),
(4, 'Phim Bộ', 'Phim bộ cập nhật hằng ngày', 1, 'phim-bo', 3),
(5, 'Phim Hoạt Hình', 'Phim hoạt hình cập nhật nhanh nhất', 1, 'phim-hoat-hinh', 5),
(6, 'Phim Mới', 'Phim mới cập nhật nhanh nhất', 1, 'phim-moi', 1),
(9, 'Phim Chiếu Rạp', 'Phim chiếu rạp cập nhật nhanh nhất', 1, 'phim-chieu-rap', 0),
(11, 'Phim Thuyết Minh', 'Phim thuyết minh mới nhất', 1, 'phim-thuyet-minh', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'Phim Việt Nam cập nhật nhanh nhất', 1, 'viet-nam'),
(2, 'Mỹ', 'Phim Mỹ cập nhật hằng ngày', 1, 'my'),
(3, 'Anh', 'Phim Anh cập nhật nhanh nhất', 1, 'anh'),
(4, 'Nhật Bản', 'Phim Nhật Bản cập nhật nhanh nhất', 1, 'nhat-ban'),
(5, 'Hàn Quốc', 'Phim Hàn Quốc cập nhật nhanh nhất', 1, 'han-quoc'),
(6, 'Trung quốc', 'Phim Trung Quốc cập nhật nhanh nhất', 1, 'trung-quoc'),
(7, 'Thái Lan', 'Phim Thái Lan cập nhật nhanh nhất', 1, 'Thái Lan'),
(8, 'Đài Loan', 'Phim Đài Loan cập nhật nhanh nhất', 1, 'Đài Loan'),
(9, 'Singapo', 'phim singapo', 1, 'Singapo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detect_attacks`
--

CREATE TABLE `detect_attacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attack_type` varchar(255) NOT NULL,
  `detected_at` timestamp NULL DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detect_attacks`
--

INSERT INTO `detect_attacks` (`id`, `attack_type`, `detected_at`, `details`, `created_at`, `updated_at`) VALUES
(7, 'Brute Force', '2024-11-22 08:41:24', 'Brute Force Attack By ip: 127.0.0.1& email: poghao@gmail.com', NULL, NULL),
(109, 'SQL Injection', '2024-11-25 08:34:21', 'Suspicious SQL Injection detected in parameter: slug with value: \' OR \'a\'=\'a', NULL, NULL),
(114, 'XSS', '2024-11-26 23:58:39', 'Suspicious XSS detected in parameter: search with value: <script>alert(\'XSS\')</script>', NULL, NULL),
(129, 'DDoS', '2024-11-27 01:06:53', 'High number of requests detected from IP: 127.0.0.1on Url: http://127.0.0.1:8000', NULL, NULL),
(133, 'SQL Injection', '2024-11-28 13:11:45', 'Suspicious SQL Injection detected in parameter: slug with value: \' OR \'a\'=\'a', NULL, NULL),
(134, 'SQL Injection', '2024-12-26 15:08:20', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(135, 'XSS', '2024-12-26 15:12:30', 'Suspicious XSS detected in parameter: linkphim with value: <p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream16.com/share/d303e6665ea75181d5bdf2221aa8a0fa\" ></iframe></p>', NULL, NULL),
(136, 'XSS', '2024-12-28 00:23:20', 'Suspicious XSS detected in parameter: linkphim with value: <p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/e1054bf2d703bca1e8fe101d3ac5efcd\" ></iframe></p>', NULL, NULL),
(137, 'SQL Injection', '2024-12-28 00:36:03', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(138, 'XSS', '2024-12-28 00:37:01', 'Suspicious XSS detected in parameter: linkphim with value: <p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/e1054bf2d703bca1e8fe101d3ac5efcd\" ></iframe></p>', NULL, NULL),
(139, 'SQL Injection', '2024-12-29 22:00:33', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(140, 'SQL Injection', '2024-12-29 22:00:55', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(141, 'SQL Injection', '2024-12-30 16:20:15', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(142, 'SQL Injection', '2024-12-30 16:21:08', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(143, 'SQL Injection', '2024-12-30 16:22:46', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(144, 'XSS', '2024-12-30 16:23:30', 'Suspicious XSS detected in parameter: linkphim with value: <p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream11.com/share/27802e14b7689cc7d57176ffea7f37b5\" ></iframe></p>', NULL, NULL),
(145, 'XSS', '2024-12-30 16:47:13', 'Suspicious XSS detected in parameter: linkphim with value: <p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/eea5d933e9dce59c7dd0f6532f9ea81b\" ></iframe></p>', NULL, NULL),
(146, 'SQL Injection', '2024-12-30 16:49:02', 'Suspicious SQL Injection detected in parameter: _method with value: DELETE', NULL, NULL),
(147, 'XSS', '2024-12-30 16:49:50', 'Suspicious XSS detected in parameter: linkphim with value: <p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/eea5d933e9dce59c7dd0f6532f9ea81b\" ></iframe></p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` varchar(600) NOT NULL,
  `linkvideotructiep` varchar(600) DEFAULT NULL,
  `episode` varchar(11) NOT NULL,
  `server` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `linkvideotructiep`, `episode`, `server`) VALUES
(4, 32, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '1', 6),
(5, 32, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '2', 0),
(6, 32, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '3', 0),
(7, 32, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '4', 0),
(8, 28, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Jd-1Qn8yLoE?si=5vocd-TZHJHZq6bx\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, 'FullHD', 0),
(11, 33, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/7mgu9mNZ8Hk?si=-pbvc4XGDVoi1D_L\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, 'HDCam', 0),
(12, 32, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '5', 0),
(13, 27, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/oVzVdvGIC7U\" title=\"Peaky Blinders - Season 1 | Trailer\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '1', 0),
(14, 27, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '2', 0),
(15, 27, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '3', 0),
(16, 32, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '6', 0),
(20, 32, '<iframe width=\"100%\" height=\"500\" src=\"https://www.youtube.com/embed/GSycMV-_Csw?si=95moG3SifeLYz8ME\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', NULL, '7', 3),
(22, 34, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/b67fb3360ae5597d85a005153451dd4e\" ></iframe></p>', NULL, '1', 8),
(23, 34, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream11.com/share/2aa997b8fcedde0b8b1d430704d322db\" ></iframe></p>', NULL, '2', 8),
(24, 35, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"//ok.ru/videoembed/1982389750341\" ></iframe></p>', NULL, '1', 4),
(25, 45, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/ec0f40c389aeef789ce03eb814facc6c\" ></iframe></p>', NULL, '1', 8),
(26, 45, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/be93cca187e923aabc702667ba5f0d06\" ></iframe></p>', NULL, '2', 1),
(27, 45, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/b986700c627db479a4d9460b75de7222\" ></iframe></p>', NULL, '3', 1),
(28, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/e8258e5140317ff36c7f8225a3bf9590\" ></iframe></p>', NULL, '1', 8),
(29, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/d3630410c51e60941a9001a46871070e\" ></iframe></p>', NULL, '2', 1),
(30, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/c3d377d10b13f8b39bf1218a60fe77b1\" ></iframe></p>', NULL, '3', 1),
(31, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/20b02dc95171540bc52912baf3aa709d\" ></iframe></p>', NULL, '4', 1),
(32, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/07211688a0869d995947a8fb11b215d6\" ></iframe></p>', NULL, '5', 1),
(33, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/0dbb3fb9a5cd1d5f8a9075b5bb8070aa\" ></iframe></p>', NULL, '6', 1),
(34, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/e7e69cdf28f8ce6b69b4e1853ee21bab\" ></iframe></p>', NULL, '7', 1),
(35, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/71d7232b9fed020ca23729017873089e\" ></iframe></p>', NULL, '8', 1),
(36, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/add7a048049671970976f3e18f21ade3\" ></iframe></p>', NULL, '9', 1),
(37, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/4f5a97cf06cf69028997db51d8726d28\" ></iframe></p>', NULL, '10', 1),
(38, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/6df182582740607da754e4515b70e32d\" ></iframe></p>', NULL, '11', 1),
(39, 44, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream13.com/share/9529fbba677729d3206b3b9073d1e9ca\" ></iframe></p>', NULL, '12', 1),
(40, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/251dbb5e528421776ff6e17c87be507f\" ></iframe></p>', NULL, '1', 8),
(41, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/0beb34df7e9615cd43b9090989ca4848\" ></iframe></p>', NULL, '2', 1),
(42, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/f2c5b1f06bfe59954cb2a56858c2ed98\" ></iframe></p>', NULL, '3', 1),
(43, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/5cdf0f9533d6b4c0984fc5ae00913459\" ></iframe></p>', NULL, '4', 1),
(44, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/f005e17eabbb0d38b06b8a78f3637d85\" ></iframe></p>', NULL, '5', 1),
(45, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/02c27682b80b462437ba4efc71267562\" ></iframe></p>', NULL, '6', 1),
(46, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/8b1ecf6d8049bb062a356f1cc812e69e\" ></iframe></p>', NULL, '7', 1),
(47, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/c2c701fe341a7756ca7fd4eaa83ff63f\" ></iframe></p>', NULL, '8', 1),
(48, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/f7ae58c7f1a1cc4abe9273a0f971ba2a\" ></iframe></p>', NULL, '9', 1),
(49, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/14da15db887a4b50efe5c1bc66537089\" ></iframe></p>', NULL, '10', 1),
(50, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/234e691320c0ad5b45ee3c96d0d7b8f8\" ></iframe></p>', NULL, '11', 1),
(51, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/d11509055cea2caaa57bc2abe499b3e5\" ></iframe></p>', NULL, '12', 1),
(52, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/3f8e8bb571cc086ca44e9605ad23ffde\" ></iframe></p>', NULL, '13', 1),
(53, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/3dde11a7673e90ad96fafd0b3b27a477\" ></iframe></p>', NULL, '14', 1),
(54, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/bc3c4a6331a8a9950945a1aa8c95ab8a\" ></iframe></p>', NULL, '15', 1),
(55, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/d9fbed9da256e344c1fa46bb46c34c5f\" ></iframe></p>', NULL, '16', 1),
(56, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/c035226640b6b89ffaf333f54e523c10\" ></iframe></p>', NULL, '17', 1),
(57, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/9c693b040f150014937c0072d90c00db\" ></iframe></p>', NULL, '18', 1),
(58, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/452e91de642a8e9c43121664d5d3c05c\" ></iframe></p>', NULL, '19', 1),
(59, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/fce34b6aef091b6fb2032870279690f8\" ></iframe></p>', NULL, '20', 1),
(60, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/419345a4c56c55ba30671ab8c25d2a73\" ></iframe></p>', NULL, '21', 1),
(61, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/2bba9f4124283edd644799e0cecd45ca\" ></iframe></p>', NULL, '22', 1),
(62, 32, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream16.com/share/d303e6665ea75181d5bdf2221aa8a0fa\" ></iframe></p>', NULL, '8', 8),
(64, 34, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/e1054bf2d703bca1e8fe101d3ac5efcd\" ></iframe></p>', NULL, '3', 8),
(65, 31, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream11.com/share/27802e14b7689cc7d57176ffea7f37b5\" ></iframe></p>', NULL, '1', 8),
(67, 46, '<p><iframe allowfullscreen frameborder=\"0\" height=\"360\" width=\"100%\" scrolling=\"0\" src=\"https://vip.opstream17.com/share/eea5d933e9dce59c7dd0f6532f9ea81b\" ></iframe></p>', 'https://vip.opstream17.com/20240526/8670_8c527822/index.m3u8', '23', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Hành Động', 'Phim hành động cập nhật nhanh nhất', 1, 'hanh-dong'),
(3, 'Hài Hước', 'Phim hài hước cập nhật hằng ngày', 1, 'hai-huoc'),
(4, 'Lãng Mạn', 'Phim lãng mạn cập nhật nhanh nhất', 1, 'lang-man'),
(5, 'Viễn Tưởng', 'Phim viễn tưởng cập nhật nhanh nhất', 1, 'vien-tuong'),
(6, 'Võ Thuật', 'Phim võ thuật cập nhật nhanh nhất', 1, 'vo-thuat'),
(7, 'Kinh Dị', 'Phim kinh dị cập nhật nhanh nhất', 1, 'kinh-di'),
(8, 'Tâm Lý', 'Phim tâm lý cập nhật nhanh nhất', 0, 'tam-ly');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `copyright` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `logo`, `copyright`) VALUES
(1, 'Phim Hay | Phim Mới | Phim HD Vietsub | Xem Phim Online | Shopphimhei.top', 'SHOPPHIMHEI.TOP : Xem phim hay nhất 2024 cập nhật nhanh nhất, Xem Phim Online HD Vietsub - Thuyết Minh tốt trên nhiều thiết bị.', 'logo4504.jpg', 'Copyright © 2024 By Heisenberg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linkmovie`
--

CREATE TABLE `linkmovie` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `linkmovie`
--

INSERT INTO `linkmovie` (`id`, `title`, `description`, `status`) VALUES
(1, 'Server Vip Nhanh', 'Link Vip Nhanh 80k/tháng, xem phim nhanh và không quảng cáo', 1),
(2, 'Server Thường', 'Link Thường có quảng cáo và đôi lúc lag', 1),
(3, 'Server Hydrax', 'Link Hydrax link mượt nhưng quảng cáo hơi nhiều', 1),
(4, 'Server Ok.ru', 'Link Ok.ru phim hay, video mượt', 1),
(5, 'Server doodstream', 'Link doodstream video mượt và miễn phí', 1),
(6, 'Server vimeo nhanh', 'Link vimeo mượt và miễn phí nhanh', 1),
(8, 'Server OPhim', 'Link vimeo mượt và miễn phí nhanh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_21_101218_create_detect_attacks_table', 2),
(6, '2024_11_21_133827_create_detect_attacks_table', 3),
(7, '2024_11_21_134554_create_detect_attacks_table', 4),
(8, '2024_11_22_152337_create_detect_attacks_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thuocphim` varchar(10) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(50) DEFAULT NULL,
  `ngaycapnhat` varchar(50) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL DEFAULT 0,
  `trailer` varchar(300) DEFAULT NULL,
  `sotap` varchar(100) DEFAULT NULL,
  `count_views` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `thoiluong`, `description`, `status`, `image`, `slug`, `category_id`, `thuocphim`, `genre_id`, `country_id`, `phim_hot`, `resolution`, `name_eng`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `tags`, `topview`, `season`, `trailer`, `sotap`, `count_views`, `position`) VALUES
(3, 'Người Nhện: Không còn nhà', '', 'Người Nhện: Không Còn Nhà, Spider-Man: No Way Home 2021 CAM Vietsub + Thuyết minh\r\nNgười Nhện: Không Còn Nhà - Spider-Man: No Way Home, Spider-Man: No Way Home 2021 CAM Với Danh Tính Của Người Nhện Giờ đã được Tiết Lộ, Peter Nhờ Doctor Strange Giúp đỡ. Khi Một Câu Thần Chú Bị Sai, Những Kẻ Thù Nguy Hiểm Từ Các Thế Giới Khác Bắt đầu Xuất Hiện, Buộc Peter Phải Khám Phá Ra ý Nghĩa Thực Sự Của Việc Trở Thành Người Nhện.', 1, 'nguoi-nhen-khong-con-nha-58642-thumbnail-250x3504352.jpg', 'nguoi-nhen-khong-con-nha', 2, '', 1, 1, 1, 0, '', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '0', NULL, 13),
(4, 'THỜI ĐẠI MA PHÁP', '', 'Thời đại Ma Pháp, Mahouka Koukou no Rettousei: Raihousha-hen | The Irregular at Magic High School: Visitor Arc 2020 Tập 13 HD Vietsub\r\nThời đại Ma Pháp - Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc, Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc 2020', 1, 'thoi-dai-ma-phap9960.jpg', 'thoi-dai-ma-phap', 5, '', 5, 4, 0, 0, '', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '0', NULL, 29),
(5, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', '', 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 5, 'phimle', 1, 2, 0, 0, '', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '0', NULL, 28),
(6, 'HUYỀN THOẠI GAME THỦ', '', 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'huyen-thoai-game-thu-60196-thumbnail4006.jpg', 'huyen-thoai-game-thu', 5, 'phimle', 3, 4, 0, 0, '', 0, NULL, NULL, NULL, NULL, 2, 0, NULL, '0', NULL, 27),
(7, 'Người Nhện: Không còn nhà', '', 'Người Nhện: Không Còn Nhà, Spider-Man: No Way Home 2021 CAM Vietsub + Thuyết minh\r\nNgười Nhện: Không Còn Nhà - Spider-Man: No Way Home, Spider-Man: No Way Home 2021 CAM Với Danh Tính Của Người Nhện Giờ đã được Tiết Lộ, Peter Nhờ Doctor Strange Giúp đỡ. Khi Một Câu Thần Chú Bị Sai, Những Kẻ Thù Nguy Hiểm Từ Các Thế Giới Khác Bắt đầu Xuất Hiện, Buộc Peter Phải Khám Phá Ra ý Nghĩa Thực Sự Của Việc Trở Thành Người Nhện.', 1, 'nguoi-nhen-khong-con-nha-58642-thumbnail-250x3504352.jpg', 'nguoi-nhen-khong-con-nha', 2, 'phimle', 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 2, 0, NULL, '0', NULL, 12),
(8, 'THỜI ĐẠI MA PHÁP', '', 'Thời đại Ma Pháp, Mahouka Koukou no Rettousei: Raihousha-hen | The Irregular at Magic High School: Visitor Arc 2020 Tập 13 HD Vietsub\r\nThời đại Ma Pháp - Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc, Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc 2020', 1, 'thoi-dai-ma-phap9960.jpg', 'thoi-dai-ma-phap', 5, 'phimle', 5, 4, 0, 0, '', 0, NULL, NULL, NULL, NULL, 1, 0, NULL, '0', NULL, 26),
(9, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', '', 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 5, 'phimle', 1, 2, 0, 0, '', 0, NULL, NULL, NULL, NULL, 1, 0, NULL, '0', NULL, 25),
(10, 'HUYỀN THOẠI GAME THỦ', '', 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'huyen-thoai-game-thu-60196-thumbnail4006.jpg', 'huyen-thoai-game-thu', 5, 'phimle', 3, 4, 0, 0, '', 0, NULL, NULL, NULL, NULL, 1, 0, NULL, '0', NULL, 24),
(11, 'Người Nhện: Không còn nhà', '', 'Người Nhện: Không Còn Nhà, Spider-Man: No Way Home 2021 CAM Vietsub + Thuyết minh\r\nNgười Nhện: Không Còn Nhà - Spider-Man: No Way Home, Spider-Man: No Way Home 2021 CAM Với Danh Tính Của Người Nhện Giờ đã được Tiết Lộ, Peter Nhờ Doctor Strange Giúp đỡ. Khi Một Câu Thần Chú Bị Sai, Những Kẻ Thù Nguy Hiểm Từ Các Thế Giới Khác Bắt đầu Xuất Hiện, Buộc Peter Phải Khám Phá Ra ý Nghĩa Thực Sự Của Việc Trở Thành Người Nhện.', 1, 'nguoi-nhen-khong-con-nha-58642-thumbnail-250x3504352.jpg', 'nguoi-nhen-khong-con-nha', 2, 'phimle', 1, 1, 0, 0, '', 0, NULL, NULL, NULL, NULL, 1, 0, NULL, '0', NULL, 11),
(12, 'THỜI ĐẠI MA PHÁP', '', 'Thời đại Ma Pháp, Mahouka Koukou no Rettousei: Raihousha-hen | The Irregular at Magic High School: Visitor Arc 2020 Tập 13 HD Vietsub\r\nThời đại Ma Pháp - Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc, Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc 2020', 1, 'thoi-dai-ma-phap9960.jpg', 'thoi-dai-ma-phap', 5, 'phimle', 5, 4, 1, 0, 'thoi-dai-ma-phap', 0, NULL, NULL, NULL, NULL, 1, 0, NULL, '0', NULL, 23),
(13, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', '', 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 5, 'phimle', 1, 2, 0, 0, '', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '0', NULL, 22),
(14, 'HUYỀN THOẠI GAME THỦ', '', 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'huyen-thoai-game-thu-60196-thumbnail4006.jpg', 'huyen-thoai-game-thu', 2, 'phimle', 1, 1, 1, 0, '', 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, '0', NULL, 10),
(15, 'Người Nhện: Không còn nhà', '133 phút', 'Người Nhện: Không Còn Nhà, Spider-Man: No Way Home 2021 CAM Vietsub + Thuyết minh\r\nNgười Nhện: Không Còn Nhà - Spider-Man: No Way Home, Spider-Man: No Way Home 2021 CAM Với Danh Tính Của Người Nhện Giờ đã được Tiết Lộ, Peter Nhờ Doctor Strange Giúp đỡ. Khi Một Câu Thần Chú Bị Sai, Những Kẻ Thù Nguy Hiểm Từ Các Thế Giới Khác Bắt đầu Xuất Hiện, Buộc Peter Phải Khám Phá Ra ý Nghĩa Thực Sự Của Việc Trở Thành Người Nhện.', 1, 'nguoi-nhen-khong-con-nha-58642-thumbnail-250x3504352.jpg', 'nguoi-nhen-khong-con-nha', 2, 'phimle', 1, 1, 1, 0, 'Spider-Man: No Way Home (2021)', 0, NULL, '2024-02-02 07:06:55', NULL, NULL, NULL, 0, 'rt-2cxAiPJk', '0', NULL, 9),
(16, 'THỜI ĐẠI MA PHÁP', '', 'Thời đại Ma Pháp, Mahouka Koukou no Rettousei: Raihousha-hen | The Irregular at Magic High School: Visitor Arc 2020 Tập 13 HD Vietsub\r\nThời đại Ma Pháp - Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc, Mahouka Koukou No Rettousei: Raihousha-hen | The Irregular At Magic High School: Visitor Arc 2020', 1, 'thoi-dai-ma-phap9960.jpg', 'thoi-dai-ma-phap', 5, 'phimle', 5, 4, 0, 0, 'The Era Of Magic', 0, NULL, '2024-01-14 11:11:56', NULL, NULL, 0, 0, NULL, '0', NULL, 21),
(17, 'SIÊU NHÂN/NGƯỜI DƠI ĐẠI CHIẾN: KẺ THÙ QUỐC GIA', '', 'Siêu Nhân/Người Dơi Đại Chiến: Kẻ Thù Quốc Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub\r\nSuperman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đã cáo buộc Superman là kẻ thù, buộc Superman làm sao để phá vỡ sao băng Kryptonite chuẩn bị đâm vào trái đất. Superman sẽ hành động thế nào?', 1, 'sieu-nhan-nguoi-doi-dai-chien-ke-thu-quoc-gia8833.jpg', 'sieu-nhannguoi-doi-dai-chien-ke-thu-quoc-gia', 2, 'phimle', 1, 1, 1, 0, '', 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '0', NULL, 8),
(18, 'HUYỀN THOẠI GAME THỦ', '', 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'huyen-thoai-game-thu-60196-thumbnail4006.jpg', 'huyen-thoai-game-thu', 2, 'phimle', 1, 1, 1, 0, '', 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '0', NULL, 7),
(19, 'HUYỀN THOẠI GAME THỦ', '', 'Huyền Thoại Game Thủ, No Game, No Life 2015 Tập 12 / 12 HD Vietsub\r\nHai anh em Sora & Shiro tạo nên huyền thoại game thủ với thành tích quán quân trong tất cả bảng xếp hạng game dưới cái tên Kuhaku hay còn được gọi là Blank. Bước ra khỏi thế giới ảo, họ là những NEET chính hiệu, không việc làm, không ăn học, cách ly và sợ tiếp xúc với bên ngoài, luôn nghĩ mình sinh nhầm thế giới. Một ngày nọ, có 1 tên kì lạ tự cho mình là thần (Tên: Tet, là 1 vị thần tối cao) đã hỏi 1 câu hỏi kì lạ \"2 người muốn vào 1 thế giới chỉ định đoạt bằng game? nếu nó thực sự tồn tại? \" và đưa 2 anh em được đưa tới một thế giới khác - một nơi mà mọi thứ đều được quyết định bởi game, từ các dụng cụ, tiền tệ, quốc gia thậm chí là cả mạng sống đều quyết định qua game. Khi tới đây mục tiêu duy nhất của 2 anh em họ chỉ là: đánh bại 16 tộc -đoạt lấy quân cờ chủng tộc (là thứ cốt lõi của 1 quốc gia nơi đây) để thách đấu với Tet.', 1, 'huyen-thoai-game-thu-60196-thumbnail4006.jpg', 'huyen-thoai-game-thu', 4, 'phimle', 4, 7, 1, 0, 'No Game, No Life', 0, NULL, NULL, NULL, NULL, 0, 0, NULL, '0', NULL, 17),
(20, 'One Punch Man', '50 phút / 1 tập', 'one punch man c Gia, Superman/Batman: Public Enemies 2009 Tập HD Vietsub Superman/Batman: Public Enemies là bộ phim hoạt hình về Người Dơi và Siêu Nhân. Trong phần này, nói về cuộc chiến của họ khi Lex Luthor được bầu làm Tổng thống Mỹ, ông đ', 1, 'thoi-dai-ma-phap6341.jpg', 'one-punch-man', 4, 'phimbo', 6, 5, 1, 5, 'one-punch-man', 0, NULL, '2024-01-17 10:47:28', '2015', NULL, 0, 0, NULL, '0', 1, 16),
(22, 'D4DJ: FIRST MIX', '', 'D4DJ: First Mix, D4DJ First Mix, Dig Delight Direct Drive DJ 2020 Tập 11 Anime HD Vietsub\r\nD4DJ: First Mix, D4DJ First Mix, Dig Delight Direct Drive DJ 2020 Anime', 1, 'd4dj-first-mix-61500-thumbnail6547.jpg', 'd4dj-first-mix', 5, 'phimle', 8, 4, 1, 5, 'D4DJ First Mix, Dig Delight Direct Drive DJ (2020)', 0, NULL, '2024-01-14 11:12:58', NULL, NULL, 0, 0, NULL, '0', NULL, 20),
(23, 'No Game, No Life (2015)', NULL, 'gdhh ghđheh hhhhh fgdhdfhdh fhdhdhd fgdfd dfdfdhs dgdgd dggrgr grdggd rted', 1, 'huyen-thoai-game-thu-60196-thumbnail6913.jpg', 'no-game-no-life-2015', 11, 'phimle', 4, 3, 1, 5, 'No Game, No Life (2015)', 1, NULL, '2024-02-02 07:03:41', '2015', NULL, 2, 0, 'rt-2cxAiPJk', '0', NULL, 18),
(24, 'MA TRẬN: HỒI SINH', '120 phút', 'Ma Trận: Hồi Sinh, The Matrix Resurrections 2021 HD Vietsub + TM\r\nMa Trận: Hồi Sinh - The Matrix Resurrections 2021 Quay Trở Lại Một Thế Giới Của Hai Thực Tại: Một, Cuộc Sống Hàng Ngày; Khác, Những Gì Nằm Sau Nó. Để Tìm Hiểu Xem Thực Tế Của Anh Ta Có Phải Là Một Công Trình Hay Không, để Thực Sự Hiểu Rõ Bản Thân Mình, Anh Anderson Sẽ Phải Chọn Theo Dõi Con Thỏ Trắng Một Lần Nữa. Ma Trận: Hồi Sinh là phần phim tiếp theo rất được trông đợi của loạt phim “Ma Trận” đình đám, đã góp phần tái định nghĩa thể loại phim khoa học viễn tưởng. Phần phim mới nhất này đón chào sự trở lại của cặp đôi Keanu Reeves và Carrie-Anne Moss với vai diễn biểu tượng đã làm nên tên tuổi của họ, Neo và Trinity. Ngoài ra, phim còn có sự góp mặt của dàn diễn viên đầy tài năng gồm Yahya Abdul-', 1, 'poster_matrix_4_1_1972.jpg', 'ma-tran-hoi-sinh', 9, 'phimle', 8, 2, 1, 5, 'The Matrix Resurrections (2021)', 1, NULL, '2024-02-17 08:42:26', '2023', 'motphim,vtv16, khoaitv, phimgi, hatdetv, xemphimso, hdo, topphimhd, khoaitv, vungtv, dongphim, fptplay, zingtv, xemphimgi', 1, 0, 'AT0VjEfeSik', '1', 1, 0),
(25, 'LỄ TẠ ƠN KINH HOÀNG', '133 phút', 'Lễ Tạ Ơn Kinh Hoàng 2023, Thanksgiving HD Vietsub\r\nAfter a Black Friday riot ends in tragedy, a mysterious Thanksgiving-inspired killer terrorizes Plymouth, Massachusetts - the birthplace of the holiday. Picking off residents one by one, what begins as random revenge killings are soon revealed to be part of a larger, sinister holiday plan.', 1, 'thanksgiving_new_poster_1_2907.jpg', 'le-ta-on-kinh-hoang', 9, 'phimle', 7, 2, 1, 4, 'Thanksgiving (2023)', 0, NULL, '2024-02-17 07:08:18', '2023', 'motphim,vtv16, khoaitv, phimgi, hatdetv, xemphimso, hdo, topphimhd, khoaitv, vungtv, dongphim, fptplay, zingtv, xemphimgi', 2, 3, NULL, '1', NULL, 1),
(26, 'JOHNNY ENGLISH: ĐIỆP VIÊN KHÔNG KHÔNG THẤY', '100 phút', 'Johnny English: Điệp Viên Không Không Thấy 2003, Johnny English HD Vietsub\r\n\"Johnny English: Điệp Viên Không Không Thấy\" là một bộ phim hài hành động năm 2003 do đạo diễn Peter Howitt thực hiện. Bộ phim xoay quanh nhân vật chính là Johnny English, một nhân viên tình báo vụng về nhưng có tấm lòng cao cả và sự tận tụy với nhiệm vụ của mình.\r\n\r\nJohnny English, một điệp viên người Anh, được giao nhiệm vụ bảo vệ viên chức Quốc vương sau khi tất cả các điệp viên khác của MI7 bị tiêu diệt trong một vụ tai nạn bí ẩn. Tuy nhiên, Johnny lại là một người vụng về và gặp nhiều khó khăn trong việc thích ứng với công việc mới của mình.\r\n\r\nKhi Quốc vương Anh bị đe dọa bởi tên trộm tài sản quốc gia, Johnny English và đồng nghiệp của mình, Bough, phải tìm cách ngăn chặn âm mưu này. Johnny vướng vào những tình huống hài hước và nguy hiểm khiến anh trở thành một tấm gương tiêu', 1, 'johnnyenglish957.jpg', 'johnny-english-diep-vien-khong-khong-thay', 2, 'phimle', 6, 3, 1, 0, 'Johnny English (2003)', 0, '2024-01-17 11:23:28', '2024-02-17 06:54:47', '2003', 'johnny english Johnny English: Điệp Viên Không Không Thấy,\r\nxem phim Johnny English: Điệp Viên Không Không Thấy viesub, xem Bí Johnny English: Điệp Viên Không Không Thấy vietsub online tap 1, tap 2, tap 3, tap 4, tap 5 phim Johnny English ep 5, ep 6, ep 7, ep 8, ep 9, ep 10, Lịch chiếu phim Johnny English: Điệp Viên Không Không Thấy, xem Johnny English: Điệp Viên Không Không Thấy tập 11, tập 12, tập 13, tập 14, tập 15, phim Johnny English: Điệp Viên Không Không Thấy tap 16, tap 17, tap 18, tap 19, tap 20, xem phim Johnny English: Điệp Viên Không Không Thấy tập 21, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, Johnny English: Điệp Viên Không Không Thấy tap cuoi, Johnny English vietsub tron bo, Johnny English: Điệp Viên Không Không Thấy phim3s, Johnny English: Điệp Viên Không Không Thấy motphim,vtv16, khoaitv, phimgi, hatdetv, xemphimso, hdo, topphimhd, khoaitv, vungtv, dongphim, fptplay, zingtv, xemphimgi Johnny English: Điệp Viên Không Không Thấy youtube,vietsubtv, bomtan, Johnny English: Điệp Viên Không Không Thấy phimmoi, hdonline, phimbathu, bilutv, banhtv, goldphim, bongngotv, bilutvs, phimmoizz, fullphim, 247phim, dongphym, xemphimvui, phimhay.co, galaxyplay, fptplay, hdviet, hdonline, hdo.tv, netflix, xemphimplus,phimmoiz, iphimmoi, phimchill, xemphimchill, ephimmoi, ezphimmoi, azphimmoi, phimmoichill, phimgii, xemphimgii, billuu, bichill, motchill, khophim18, zaphim, 2phimhay, iphimhay, iphim, VTVGiaitri, PhimHD7, Hplus, Kphim, Cliptv, yeuphimmoi, Vietsubtv, Bomtan, Biphim, Khophimplus, Johnny English: Điệp Viên Không Không Thấy full, Johnny English online, Johnny English: Điệp Viên Không Không Thấy Thuyết Minh, Johnny English: Điệp Viên Không Không Thấy Vietsub, Johnny English: Điệp Viên Không Không Thấy Lồng Tiếng', 1, 3, NULL, '1', 1, 5),
(27, 'Bóng Ma Anh Quốc', '50 phút / 1 tập', 'Bóng Ma Anh Quốc: Phần 1 Peaky Blinders Season 1 2013 Full HD Vietsub Thuyết Minh Ở nước Anh đầu thế kỷ 19, Peaky Blinders kể về những thủ lĩnh của băng đảng Peaky Blinders khét tiếng trong Thế giới ngầm với bộ não của Tommy Shelby, con trai thứ hai của họ. Phim kể về hành trình thăng tiến của Tommy trong Thế giới ngầm với những âm mưu và thủ đoạn tàn nhẫn. Ngoài ra, người xem sẽ được chứng kiến rất nhiều nhân vật và sự kiện lịch sử có thật như cuộc kháng chiến giành độc lập của người Ireland ...', 1, 'bong-ma-anh-quoc-phan-18615.jpg', 'bong-ma-anh-quoc', 4, 'phimbo', 8, 2, 1, 0, 'Peaky Blinders', 0, '2024-02-02 05:56:59', '2024-02-19 09:39:24', '2022', 'peaky blinders,\r\nbóng ma anh quốc', 0, 6, NULL, '6', 3, 15),
(28, 'Mật Vụ Ong', '120 phút', 'Mật Vụ Ong The Beekeeper 2024 là một bộ phim hành động, giật gân Mỹ do David Ayer đạo diễn và Kurt Wimmer viết kịch bản. Phim có sự tham gia của Jason Statham trong vai Adam Clay, một cựu thành viên của tổ chức bí mật gọi là Beekeepers, người bắt đầu một chiến dịch trả thù cá nhân. Cốt truyện của phim xoay quanh Adam Clay, từng sống yên bình với công việc nuôi ong, nhưng lại bị kéo vào một tình huống phức tạp liên quan đến tham nhũng cấp cao và sự dối trá. Phim khám phá các chủ đề về báo thù, tự điều chỉnh xã hội, và sự phức tạp của đạo đức.\r\nNhìn chung, \"The Beekeeper\" nổi bật như một bộ phim kịch tính, kết hợp sự căng thẳng của lòng trả thù với sự phức tạp của những lựa chọn đạo đức trước mặt tham nhũng.', 1, 'mat-vu-ong6161.jpg', 'mat-vu-ong', 2, 'phimle', 6, 2, 1, 0, 'The Beekeeper (2024)', 0, '2024-02-15 08:24:02', '2024-02-16 07:46:21', '2024', 'the beekeeper\r\nmat vu ong', 2, 0, NULL, '1', NULL, 6),
(31, 'Thợ Săn Hoang Mạc', '120 phút', 'Thợ Săn Hoang Mạc Badland Hunters 2024 là một bộ phim hành động-gây cấn lấy bối cảnh ở Seoul sau tận thế. Bộ phim xoay quanh hành trình của Nam-san, một người săn lùng trong vùng đất hoang dã do Ma Dong-seok thủ vai, trong nhiệm vụ cứu một thiếu niên bị một bác sĩ điên bắt cóc. Cốt truyện phát triển trong một Seoul biến thành đất hoang khắc nghiệt sau một trận động đất khủng khiếp, khiến cho việc sống sót trở nên thách thức.\r\nDàn diễn viên bao gồm Lee Joon-young trong vai Choi Ji-wan, đối tác đáng tin cậy của Nam-san, và Roh Jeong-eui trong vai Suna, một cô gái mạnh mẽ đồng hành cùng Nam-san. An Ji-hye đảm nhận vai Lee Eun-ho, một sĩ quan lực lượng đặc biệt. Bộ phim được đạo diễn bởi Heo Myeong Haeng và kịch bản được viết bởi Kim Bo-tong và Kwak Jae-Min. Quá trình sản xuất bao gồm việc quay phim bắt đầu từ tháng 2 năm 2022 và kết thúc vào tháng 5 năm 2022. Netflix xác nhận sản xuất và phân phối bộ phim, đồng thời phát sóng tại 190 quốc gia.\r\n\"Badland Hunters\" là sự kết hợp của nhiều thể loại, bao gồm hành động, kịch tính, phiêu lưu, khoa học viễn tưởng và drama. Đây là một bộ phim thảm họa đi sâu vào các chủ đề về sự sống còn, ý chí con người đối mặt với những điều kiện khắc nghiệt, và sự không chắc chắn trong mối quan hệ. Bộ phim Hàn Quốc này hứa hẹn mang đến một trải nghiệm kịch tính với bối cảnh độc đáo và câu chuyện hấp dẫn.', 1, 'badland-hunters1995.jpg', 'tho-san-hoang-mac', 6, 'phimle', 8, 5, 1, 0, 'Badland Hunters (2024)', 0, '2024-02-19 09:08:03', '2024-03-17 12:53:35', '2024', 'tho san hoang mac,\r\nbadland hunters netflix', 1, 0, '-rOZK710Kgs', '1', 7, 3),
(32, 'Reacher (Phần 2)', '50 phút / 1 tập', 'Reacher (Phần 2) Reacher (Season 2) 2023 tiếp tục cuộc phiêu lưu của nhân vật Jack Reacher, với sự trở lại của Alan Ritchson trong vai chính. Dựa trên cuốn sách thứ 11 của Lee Child, \"Bad Luck and Trouble\", mùa này đưa Reacher vào một cuộc điều tra ly kỳ.\r\nMùa thứ hai bắt đầu với Jack Reacher nhận được một thông điệp mã hóa từ Nealy (Maria Sten), báo tin một thành viên của đơn vị điều tra đặc biệt cũ của họ đã bị giết. Nạn nhân, Calvin Franz, là người mà Reacher từng tuyển dụng. Cái chết của Franz làm dấy lên một loạt các sự kiện, dẫn Reacher và ba thành viên cũ của đơn vị của mình vào một cuộc săn lùng kẻ giết người hàng loạt', 1, 'reacher-season-29344.jpg', 'reacher-phan-2', 6, 'phimbo', 8, 2, 1, 0, 'Reacher (Season 2) (2023)', 0, '2024-02-19 09:10:01', '2024-04-22 10:33:11', '2023', 'reacher phan 2\r\nreacher season 2', 1, 2, 'tC-rRhQcnlI', '8', 10, 14),
(33, 'Argylle Siêu Điệp Viên', '120 phút', 'Argylle Siêu Điệp Viên Argylle 2024 là một bộ phim hành động hài hước về điệp viên được sản xuất vào năm 2024, đạo diễn và sản xuất bởi Matthew Vaughn. Phim có sự tham gia của dàn diễn viên nổi tiếng bao gồm Bryce Dallas Howard, Sam Rockwell, Bryan Cranston, Catherine O\'Hara, Henry Cavill, Sofia Boutella, Dua Lipa, Ariana DeBose, John Cena và Samuel L. Jackson. Câu chuyện xoay quanh Elly Conway/Rachel Kylle (do Bryce Dallas Howard thủ vai), một tác giả ẩn dật viết sách đặc vụ gián điệp bán chạy. Cuộc phiêu lưu kịch tính bắt đầu khi thế giới hư cấu trong sách của cô, tập trung vào điệp viên bí mật Argylle và nhiệm vụ của anh ta để phá vỡ một tổ chức gián điệp toàn cầu, bắt đầu phản ánh hoạt động gián điệp thực tế. Elly, cùng với Aiden (Sam Rockwell), một điệp viên dị ứng với mèo, đã dấn thân vào một cuộc phiêu lưu vòng quanh thế giới để luôn đi trước một bước so với kẻ giết người khi thế giới hư cấu và thực của cô bắt đầu hòa quện', 1, '06kv6rhtdx6170381666921036.jpg', 'argylle-sieu-diep-vien', 6, 'phimle', 3, 2, 1, 1, 'Argylle (2024)', 1, '2024-03-06 18:23:34', '2024-03-06 18:23:34', '2024', 'argylle\r\nargylle siêu điệp viên', 2, 0, '7mgu9mNZ8Hk', '1', 2016, 2),
(34, 'TRÒ CHƠI CỦA THẦN', '24 phút / tập', 'Reiyan Asura, nếu đó là tên thật của anh ấy, thức tỉnh trong khoảng không, bị ràng buộc bởi xiềng xích. Anh ta không nhớ mình là ai hay làm thế nào anh ta đến được thế giới màu trắng này. Anh ấy không hề biết rằng anh ấy đã cùng hàng triệu người khác tham gia vào một trò chơi phức tạp, nơi chỉ có kẻ mạnh nhất mới thắng thế. Reiyan tuy mạnh mẽ nhưng liệu anh có bí mật nào có thể giúp anh sống sót không? Chào mừng đến với trò chơi của Thần. Hãy chứng minh giá trị của bạn hoặc chết để giải trí cho Ngài.', 1, 'tro-choi-cua-than-thumb961.avif', 'tro-choi-cua-than', 6, 'phimbo', 6, 4, 1, 0, 'Gods\' Game We Play', 0, '2024-04-16 08:47:40', '2024-04-22 10:10:00', '2023', 'TRÒ CHƠI CỦA THẦN, Gods\' Game We Play', 1, 1, 'https://youtu.be/a-1LlOTclzw', '3', 29266, 19),
(35, 'Cầu thang ước nguyện', '100 phút', 'Tại một trường trung học nghệ thuật dành cho nữ nọ, có một truyền thuyết rằng nếu bạn tìm thấy bậc thứ 29 trên cầu thang dẫn đến ký túc xá, hồ ly sẽ thực hiện ước nguyện của bạn.', 1, 'Wishing_Stairs_poster7354.jpeg', 'cau-thang-uoc-nguyen', 9, 'phimle', 8, 5, 1, 0, 'Whispering Corridors 3: Wishing Stairs', 0, '2024-04-17 09:22:05', '2024-04-22 10:32:24', '2006', 'Cầu thang ước nguyện, Wishing Stairs, Whispering Corridors 3', 2, 0, 'https://youtu.be/CwwRWc2ogjs', '1', 91315, 4),
(42, 'Thôn Tính Bầu Trời', '24 phút/tập', '<p>Trên Trái đất, một thảm họa đã gây ra sự biến đổi của muôn loài. Kẻ thượng đẳng sống sót và kẻ thấp kém bị tuyệt chủng. Trong hoàn cảnh đó, Luo Feng được thừa kế từ chủ nhân của Ngôi sao Yunmo và trở thành một trong ba người mạnh nhất trên Trái đất. Anh ta bị mất thịt của mình trong cuộc chiến chống lại con quái vật khổng lồ bị nuốt chửng nhưng sau đó anh ta đã lấy thịt của con quái vật. Trong xác thịt, anh ta đã phát triển một cơ thể người. Sau đó, anh bước ra khỏi Trái đất và hướng đến vũ trụ.</p>', 1, 'https://img.ophim.live/uploads/movies/thon-tinh-bau-troi-thumb.jpg', 'thon-tinh-bau-troi', 11, 'phimle', 8, 9, 1, 0, 'Swallowed Star', 0, '2024-05-24 15:02:16', '2024-05-24 15:02:16', NULL, 'Thôn Tính Bầu Trời,thon-tinh-bau-troi', NULL, 0, '', '130', 92307, NULL),
(44, 'Chuyện Tình Của Anh Chị Em Tôi', '130 phút/tập', '<p><br>Nó định nghĩa lại các chương trình hẹn hò với một bước ngoặt gia đình! Cùng với bốn cặp anh chị em ruột, họ tập hợp trong một ngôi nhà chung để giúp đỡ nhau tìm kiếm đối tác lãng mạn. Nó giới thiệu một khái niệm mới mẻ nơi các anh chị em bắt đầu hành trình tìm kiếm tình yêu, không chỉ cho bản thân mình mà còn cho nhau, tất cả dưới sự chứng kiến của các anh chị em của họ.</p>', 1, 'https://img.ophim.live/uploads/movies/chuyen-tinh-cua-anh-chi-em-toi-thumb.jpg', 'chuyen-tinh-cua-anh-chi-em-toi', 11, 'phimle', 8, 9, 1, 0, 'My Sibling\'s Romance', 0, '2024-05-25 10:12:46', '2024-05-25 10:12:46', NULL, 'Chuyện Tình Của Anh Chị Em Tôi,chuyen-tinh-cua-anh-chi-em-toi', NULL, 0, '', '15', 31339, NULL),
(45, 'Phạm Vi Bên Ngoài (Phần 2)', '59 phút/tập', '<p>Bí ẩn xung quanh khoảng trống bí ẩn trên đồng cỏ phía tây trang trại của gia đình Abbott ngày càng sâu sắc hơn trong Phần hai, khi Royal và vợ Cecelia đấu tranh để giữ gia đình của họ bên nhau sau sự mất tích đột ngột của cháu gái họ. Rủi ro chưa bao giờ cao hơn đối với Abbotts, những người hiện đang phải đối mặt với các mối đe dọa trên nhiều mặt trận.</p>', 1, 'https://img.ophim.live/uploads/movies/pham-vi-ben-ngoai-phan-2-thumb.jpg', 'pham-vi-ben-ngoai-phan-2', 11, 'phimle', 8, 9, 1, 0, 'Outer Range (Season 2)', 0, '2024-05-25 11:03:33', '2024-05-25 11:03:33', NULL, 'Phạm Vi Bên Ngoài (Phần 2),pham-vi-ben-ngoai-phan-2', NULL, 0, 'https://www.youtube.com/watch?v=8UkDdTMZh14', '7 Tập', 98394, NULL),
(46, 'Em Là Ánh Sáng Của Anh', '11 phút/tập', 'Cố Lâm Tinh, đại thiếu gia nhà họ Cố trước giờ ngang ngược, kiêu căng vô tình gặp gỡ Trần Tư Nam, một trợ giảng đại học kiên cường, lương thiện. Cố Lâm Tinh lâm vào hoàn cảnh sa sút, buộc phải ký thỏa thuận thuê chung nhà, hai người từ đó bắt đầu cuộc sống chung ngọt ngào. Tuy nhiên mâu thuẫn gia đình đã nảy sinh. Trước những tin đồn bịa đặt và cám dỗ của đồng tiền, Cố Lâm Tinh và Trần Tư Nam sẽ lựa chọn như thế nào?', 1, 'https://img.ophim.live/uploads/movies/em-la-anh-sang-cua-anh-thumb.jpg', 'em-la-anh-sang-cua-anh', 11, 'phimle', 8, 9, 1, 0, 'My Star', 0, '2024-05-25 13:11:38', '2024-05-25 13:11:38', NULL, 'Em Là Ánh Sáng Của Anh,em-la-anh-sang-cua-anh', NULL, 0, '', '24', 85262, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_category`
--

CREATE TABLE `movie_category` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_category`
--

INSERT INTO `movie_category` (`id`, `movie_id`, `category_id`) VALUES
(1, 35, 2),
(2, 35, 9),
(3, 34, 4),
(4, 34, 5),
(5, 34, 6),
(6, 35, 6),
(7, 32, 4),
(8, 32, 6),
(9, 37, 11),
(10, 41, 11),
(11, 42, 11),
(12, 43, 11),
(13, 44, 11),
(14, 45, 11),
(15, 46, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(4, 28, 1),
(5, 28, 6),
(6, 27, 8),
(7, 27, 1),
(8, 26, 1),
(9, 26, 3),
(10, 26, 6),
(11, 24, 1),
(12, 24, 6),
(13, 25, 1),
(14, 25, 7),
(15, 24, 8),
(28, 31, 1),
(29, 31, 3),
(30, 31, 5),
(31, 31, 7),
(32, 31, 8),
(36, 32, 1),
(37, 32, 3),
(38, 32, 8),
(39, 33, 1),
(40, 33, 3),
(41, 34, 3),
(42, 34, 4),
(43, 34, 5),
(44, 34, 6),
(45, 35, 7),
(46, 35, 8),
(52, 42, 8),
(54, 44, 8),
(55, 45, 8),
(56, 46, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `rating`, `movie_id`, `ip_address`) VALUES
(1, 3, 31, '127.0.0.1'),
(2, 2, 25, '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `facebook_id`) VALUES
(3, 'Poghao', 'poghao@gmail.com', NULL, '$2y$10$GzrPd2zerQ8raUvhFbIkPers8MCFYjVyvQD4Qmi.VJmiplpLYheE.', NULL, '2024-01-13 20:02:23', '2024-01-13 20:02:23', NULL, NULL),
(4, 'Hào Trương Huỳnh', 'haocsca113@gmail.com', NULL, 'eyJpdiI6InZKdWltaTlkMU16eG1QVlhCcFk2emc9PSIsInZhbHVlIjoiV2JTZXVUMEhNcEJnd2dKVWUzTXZSeU5pYUhFVlZXT1ZOZk40Q1g4SFdtaz0iLCJtYWMiOiJhMjFjZDkyMDc5ZGM4NTgwZmQ4Y2U2OTYxZDY5NTExNWQ0YzRmYTE1N2UyN2MwYTNlODgxOTJlYzk5OWNlNDA5IiwidGFnIjoiIn0=', NULL, '2024-04-18 07:12:56', '2024-04-18 07:12:56', '115868358498485712861', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detect_attacks`
--
ALTER TABLE `detect_attacks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linkmovie`
--
ALTER TABLE `linkmovie`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `detect_attacks`
--
ALTER TABLE `detect_attacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `linkmovie`
--
ALTER TABLE `linkmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
