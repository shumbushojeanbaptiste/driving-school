-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 02:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rw.driving_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_otp`
--

CREATE TABLE `password_reset_otp` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `valid_until` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_centers`
--

CREATE TABLE `tbl_centers` (
  `center_id` int(11) NOT NULL,
  `center_name` varchar(50) DEFAULT NULL,
  `center_phone` varchar(12) DEFAULT NULL,
  `center_code` varchar(11) DEFAULT NULL,
  `center_address` varchar(50) DEFAULT NULL,
  `center_orgin` int(11) DEFAULT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `province_id` varchar(11) DEFAULT NULL,
  `district_id` varchar(11) DEFAULT NULL,
  `sector_id` varchar(11) DEFAULT NULL,
  `cell_id` varchar(11) DEFAULT NULL,
  `village_id` varchar(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_centers`
--

INSERT INTO `tbl_centers` (`center_id`, `center_name`, `center_phone`, `center_code`, `center_address`, `center_orgin`, `reg_date`, `province_id`, `district_id`, `sector_id`, `cell_id`, `village_id`, `status`) VALUES
(1, 'KICUKIRO MAIN STOCK', '78', '1', 'SONATUBE', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(2, 'NYABUGOGO MAIN STOCK', '781', '1', 'NYABUGOGO', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'KICUKIRO-SONATUBE', '782', '2', 'SONATUBE', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(4, 'RUBIS-NYABUGOGO', '784', '2', 'NYABUGOGO', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(5, 'KOBIL-NYABUGOGO', '789', '2', 'NYABUGOGO', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(6, 'CITY-NYARUGENGE', '788', '2', 'CITY', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(7, 'REMERA S.P', '786', '2', 'REMERA GIPOROSO', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(8, 'REMERA ORYX', '7855', '2', 'remera.gare', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(9, 'KINYONI ORYX', '7845', '2', 'GITIKINYONI', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 1),
(10, 'Evaluation', '', '', '', 1, '2024-11-17', NULL, NULL, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driving_schools`
--

CREATE TABLE `tbl_driving_schools` (
  `school_id` int(11) NOT NULL,
  `school_full_name` varchar(100) DEFAULT NULL,
  `school_short_name` varchar(50) DEFAULT NULL,
  `referal_code` varchar(12) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL DEFAULT 'P.0.  BOX 1718 KIGALI I RWANDA',
  `api_key` longtext DEFAULT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_driving_schools`
--

INSERT INTO `tbl_driving_schools` (`school_id`, `school_full_name`, `school_short_name`, `referal_code`, `email`, `phone`, `address`, `api_key`, `reg_date`, `status`) VALUES
(1, 'ITEC Ltd', 'ITEC', '9999', 'info@itec.rw', '0788230853', 'P.0.  BOX 1718 KIGALI I RWANDA', 'w3xb9lK5RTs5AKITTg/MfG5AL+hYK86rY4vqydcGOojdnyK7sKcykSHDu3N9D1kM7uW0YANVKm9EsXg3P8qGnQ==', '2023-09-09 10:11:47', 1),
(4, 'Financial Safety Company ', 'FISA', '890248', 'info@fisa.rw', '0788810007', 'Kigali', '6FSIf4tnKB7JnF6N+uHsHBZXJoWDIbVmY5uyxHrTUnMNvYgl+mvgOHTY9SQ2cpmrWdhTMjUrZ0RMpLiRl6wSlA==', '2024-02-28 10:27:47', 1),
(5, 'ITEC Softwares', 'ITEC-DEV', '845628', 'hicode250@gmail.com', '0788230853', 'KG237 ST', '4vX1BwuAj5ttqBRWK2QruwO0P9wXhgGRNcv5FMOYTtMw0UpbAnl3AOb4BuRJnza8R28IpypPe3FeKzpG/K1Evg==', '2024-02-29 13:28:15', 1),
(6, 'Jacques TUYIZERE', 'Jacques', '339493', 'jamescele01@gmail.com', '0783396759', 'Nyamasheke', '3jmtGsC+s6lQnGQw6JXJCcWOMCcO3oJ0qglc7ijCdmeSXL3cUm2GiMr1KgKHHOA2NrNLVhdfYR+3ufC6NQ+Z6g==', '2024-02-29 15:26:48', 1),
(9, 'TEST', 'ITECPAY', '306882', 'itecpaytest@itec.rw', '0788644687', 'Kigali', 'MOhZJ41ylKAb4UsU9HQWw75m5TVXj1ij4U9hLc/la95wLhjJBrynBxqcVEvZcOjoL26R7mXBAXEZ2IDoYsp6gw==', '2024-08-29 20:06:30', 1),
(10, 'FEROZ', 'ITECPAY', '393149', 'info@feroz-stationery.co.rw', '0788307240', 'kigali', 'NHBomt3S8aFVvMswoarT4QnFbSkrgi0BwVjwrM87cyWjlohA7uWj5Pk8sP/gJkIzGOWzWrohCPDT+0TCX1Qvtw==', '2024-10-14 14:33:33', 1),
(11, 'ACT', 'ITECPAY', '991957', 'acr.sms@itec.rw', '078864468', 'muhima', 'y3XzlrsiwW8c1RgdEtHoK+TKCWVskShbT8UH3BNjAM/B1WBupaqsNcv5YFmbLvpoOjTlrVyvPCWHh9MGbvpZdw==', '2024-10-19 13:07:11', 1),
(12, 'Mothermary', 'ITECPAY', '553785', 'mary.sms@itec.rw', '078864468', 'muhima', 'nvDBVwPACMZJyKb6K0qMffTtIS7zB5ySL+XCVi7j/bhaisFgdZT71zofvGq0a02rRainVXpvlUUseMp6n2bx/g==', '2024-10-19 14:37:15', 1),
(13, 'BSCHOLARZ Ltd', 'ITECPAY', '563752', 'ishimwealexisb@gmail.com', '0786981832', 'NYAMIRAMBO-Kigali RWANDA', 'dEnzIhTh/aHnjfEtF9qpmLwMaOK0ZKyR87AAmS6mlZVbcL/ZSD0F9uQttvXW0+iokQ1DGOwQ6kQhf9+DwPU+ug==', '2024-11-08 14:38:16', 1),
(14, 'FUTURE FOCUS ENTERTAINMENT', 'ITECPAY', '214221', 'futurefocusforum@gmail.com', '0788920683', 'GASABO-Kigali', 'XQ3TsNiDdca2/PHGg/StwBnSIzJHW8Mi6DdDxOjUGRHHOhPt0ZCSqzvyT+/0IKWCnAIzYJtTIRMIwmKTel6v5w==', '2024-11-09 14:08:26', 1),
(15, '', 'ITECPAY', '564296', '', '0785490108', 'EAST', '/ztkaehfC90sxPRUxuLS22TR00FQZKTyZnkGPqloAlJowPbLRThtVxDCbdPPFW+fg+Ys8s/PReb98q5+S5wlQA==', '2024-12-02 10:26:40', 2),
(16, 'East African University Rwanda', 'ITECPAY', '702134', 'nhenryvicky@gmail.com', '0785490108', 'Kigali', 'H8FF1tWnbWPnZjw6NEfEjZgwwgseH3I/qfq/J0CAuRWXpgQNloobS+lnENesFfwxEpVBxWEltyEd619+aHhF2g==', '2024-12-05 19:13:01', 1),
(17, 'Testing', 'ITECPAY1', '272150', 'shumbushojean1@gmail.com', '0788644687', 'muhima', '5+rrSIOy4amGeLHZEg8NB5lgfWQqSvyqcuEVppCH6BZpXAF5lr60MSVchQ25hnAn7/FNjkNsysJwbkQl6iz5pg==', '2024-12-13 12:18:48', 1),
(18, 'Fruist Of Hope Academy', 'ITECPAY', '899126', 'foha@itec.rw', '0788644687', 'Gisozi', 'bqrpLmf/MjvvpFK7ZkwPMn5uK7Afs+blnU88+BrgMqqQvRSjNZjuh171qxADO766wLoELZ6O5S4KsnAT9MzCfg==', '2025-02-28 07:07:11', 1),
(19, 'GOSPEL', 'ITECPAY', '590266', 'gospel@itec.rw', '0788644687', 'Kigali', 'mKncmhaAQwuQoFu5xROufUOe0RbrU+v49XGdoeWpZn9EYY+3i9SfdGr/wQyMhWimEHRuy8c98gkBh3L1UGIngA==', '2025-02-28 07:22:57', 1),
(20, 'Driving School A', 'DSA', 'REF123', 'info@drivingschoola.com', '+250788644687', '123 Main St', NULL, '2025-05-26 21:24:57', 1),
(21, 'St Familly Driving school A', 'FDS', 'REF123', 'info@drivingschoolb.com', '+250788644687', '123 Main St', NULL, '2025-05-26 21:27:13', 1),
(22, 'St Familly Driving school B', 'FDS', 'SC250001', 'info@drivingschoolc.com', '+250788644687', '123 Main St', NULL, '2025-05-26 21:32:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructors`
--

CREATE TABLE `tbl_instructors` (
  `instractor_id` int(11) NOT NULL,
  `instractor_code` varchar(30) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `familly_name` varchar(30) DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ID_number` varchar(16) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 3 COMMENT '3=pending,1=active,3=finished,0=disactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_instructors`
--

INSERT INTO `tbl_instructors` (`instractor_id`, `instractor_code`, `first_name`, `familly_name`, `phone`, `email`, `ID_number`, `status`) VALUES
(1, NULL, 'Alex', NULL, '0788561620', NULL, NULL, 3),
(2, NULL, 'UWICYEZA Belinda', NULL, '0787106743', NULL, NULL, 3),
(3, NULL, 'UMUHOZA Sandrine', NULL, '0788857987', NULL, NULL, 3),
(4, NULL, 'BYIRINGIRO Jules Seraphin Seth', NULL, '0788361117', NULL, NULL, 3),
(5, NULL, 'NDAHIMANA Valensi', NULL, '0788734139', NULL, NULL, 3),
(6, NULL, 'biziyaremye', NULL, '0783857284', NULL, NULL, 3),
(7, NULL, 'biziyaremy', NULL, '0737421788', NULL, NULL, 3),
(8, NULL, 'Shekinah', NULL, '0789066186', NULL, NULL, 3),
(9, NULL, 'Clement NTIHINYURWA', NULL, '0788478632', NULL, NULL, 3),
(10, NULL, 'MUGISHA Nexon', NULL, '0798664112', NULL, NULL, 3),
(11, NULL, 'RWIGARA Rodrigue', NULL, '0787910406', NULL, NULL, 3),
(12, NULL, 'Joyeuse MUKESHIMANA', NULL, '0782554075', NULL, NULL, 3),
(13, NULL, 'RUZINDANA Benjamin', NULL, '0782464880', NULL, NULL, 3),
(14, NULL, 'Jean Eric', NULL, '0787795144', NULL, NULL, 3),
(15, NULL, 'Tiger RUDATINKWA', NULL, '0780486849', NULL, NULL, 3),
(16, NULL, 'Olivier MUHAWENIMANA ', NULL, '0796109163', NULL, NULL, 3),
(17, NULL, 'ISHIMWE Alexis', NULL, '0786981832', NULL, NULL, 3),
(18, NULL, 'MIZERO Divine', NULL, '0791124195', NULL, NULL, 3),
(19, NULL, 'IZERE Carine', NULL, '0781886115', NULL, NULL, 3),
(20, NULL, 'KANYANGE Christine', NULL, '0788896887', NULL, NULL, 3),
(21, NULL, 'SANO Olivier', NULL, '0781271208', NULL, NULL, 3),
(22, NULL, 'jonas', NULL, '0784039108', NULL, NULL, 3),
(23, NULL, 'David', NULL, '0788938793', NULL, NULL, 3),
(24, NULL, 'charles', NULL, '0783939465', NULL, NULL, 3),
(25, NULL, 'Ishimwe Fabrice', NULL, '0784995385', NULL, NULL, 3),
(26, NULL, 'IRAKOZE yves', NULL, '0780758486', NULL, NULL, 3),
(27, NULL, 'RITHA', NULL, '0782302136', NULL, NULL, 3),
(28, NULL, 'NSHOGOZA SERGE', NULL, '0788956719', NULL, NULL, 3),
(29, NULL, 'Alexandre', NULL, '0780340692', NULL, NULL, 3),
(30, NULL, 'Jean derc', NULL, '078888026', NULL, NULL, 3),
(31, NULL, 'Mico innocent', NULL, '0786837774', NULL, NULL, 3),
(32, NULL, 'Hakizimana James', NULL, '0790052383', NULL, NULL, 3),
(33, NULL, 'RUKUNDO OLIVIER', NULL, '0784882753', NULL, NULL, 3),
(34, NULL, 'NDATIMANA UZIEL', NULL, '0788478967', NULL, NULL, 3),
(35, NULL, 'ISHIMWE JEAN PAUL', NULL, '0788333014', NULL, NULL, 3),
(36, NULL, 'NSHIMIYIMANA EMMY', NULL, '0784904364', NULL, NULL, 3),
(37, NULL, 'MUKABARISA JOYCE', NULL, '0782895946', NULL, NULL, 3),
(38, NULL, 'Ndatimana Divine', NULL, '0791021592', NULL, NULL, 3),
(39, NULL, 'Hirwa jules', NULL, '0790175102', NULL, NULL, 3),
(40, NULL, 'Rwigamva derrick', NULL, '0787756670', NULL, NULL, 3),
(41, NULL, 'CEO KIAC', NULL, '0788416472', NULL, NULL, 3),
(42, NULL, 'Fred Rutagengwa', NULL, '0783391573', NULL, NULL, 3),
(43, NULL, 'Delice ', NULL, '0722369744', NULL, NULL, 3),
(44, NULL, 'angel study in canada', NULL, '0787246579', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_licence_permitted`
--

CREATE TABLE `tbl_licence_permitted` (
  `permitted_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL DEFAULT 0,
  `center_id` int(11) NOT NULL DEFAULT 0,
  `license_id` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=approved,3=pendind,0=disactivated'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_license`
--

CREATE TABLE `tbl_license` (
  `license_id` int(11) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `short_name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_license`
--

INSERT INTO `tbl_license` (`license_id`, `full_name`, `short_name`, `status`) VALUES
(1, 'Pro', 'Pro', 1),
(2, 'A', 'AX', 1),
(3, 'B', 'B', 1),
(4, 'C', 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `header` varchar(10) NOT NULL,
  `message` longtext NOT NULL,
  `due_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_mode`
--

CREATE TABLE `tbl_pay_mode` (
  `acc_id` int(11) NOT NULL,
  `acc_mode` varchar(50) NOT NULL,
  `icon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pay_mode`
--

INSERT INTO `tbl_pay_mode` (`acc_id`, `acc_mode`, `icon`) VALUES
(1, 'Bank', NULL),
(2, 'MoMo', NULL),
(3, 'Aitel', NULL),
(4, 'Visa', NULL),
(5, 'SPENN', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pay_trans`
--

CREATE TABLE `tbl_pay_trans` (
  `trans_id` int(11) NOT NULL,
  `trans_code` varchar(100) NOT NULL,
  `stu_code` varchar(11) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `volume` int(11) NOT NULL,
  `due_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=canceled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pay_trans`
--

INSERT INTO `tbl_pay_trans` (`trans_id`, `trans_code`, `stu_code`, `school_id`, `center_id`, `amount`, `phone`, `volume`, `due_date`, `status`) VALUES
(1, 'd50f93df-e5ae-477a-9616-04948fd7dc47', NULL, 3, 0, 100, '0784118032', 10, '2023-09-26 13:00:09', 1),
(2, '63771ea5-2a44-4cb9-937c-d7a34f0fe6f5', NULL, 4, 0, 100000, '0783481370', 10000, '2024-02-29 13:02:22', 1),
(3, '29f95ea9-1599-4dcc-8491-9367d405aecd', NULL, 5, 0, 100, '0788230853', 10, '2024-02-29 13:39:15', 1),
(4, 'cebc2d64-5778-4189-a122-e255840d3006', NULL, 7, 0, 500, '0783857284', 50, '2024-06-09 08:42:50', 1),
(5, '9a35ad40-5041-4e34-b18c-1805ff71ff94', NULL, 7, 0, 500, '0786166863', 50, '2024-06-21 11:54:19', 1),
(6, '2c6fcbf4-e357-4c0c-9568-cd4cfc2e633d', NULL, 7, 0, 500, '0786166863', 50, '2024-07-02 16:10:51', 1),
(7, '6103d5c2-bf7b-4d54-a632-3527c101377a', NULL, 7, 0, 500, '0782617979', 50, '2024-07-21 10:01:30', 1),
(8, 'c671291e-dac2-4adb-b491-156bbdf44550', NULL, 7, 0, 500, '0782617979', 50, '2024-08-04 16:45:15', 1),
(9, 'd7e606e0-81b2-4e06-bdf9-7f9201f0248d', NULL, 7, 0, 500, '0787044600', 50, '2024-08-13 16:58:59', 1),
(10, '333a6e03-647e-4f96-b332-2306339b005b', NULL, 7, 0, 500, '0782617979', 50, '2024-08-18 18:57:00', 1),
(11, 'c26853d0-931d-4a25-99e4-26e75aa0b245', NULL, 7, 0, 500, '0783857284', 50, '2024-09-03 08:08:27', 1),
(12, 'd0159264-a7c3-4bf1-938f-fe8f6e4bea96', NULL, 10, 0, 1650, '0784118032', 165, '2024-10-14 15:02:02', 1),
(13, '9fb984ec-2243-420a-ae5d-77c815cc5a06', NULL, 14, 0, 500, '0788478632', 50, '2024-11-21 07:52:57', 1),
(14, 'e6409d46-4bf9-4fdc-9137-0361a6957cc1', NULL, 14, 0, 1000, '0788478632', 100, '2024-11-21 10:45:10', 1),
(15, '226b84d9-9633-4ac8-bad9-ba61276d271a', NULL, 14, 0, 500, '0788518845', 50, '2024-11-21 15:42:56', 1),
(16, '6b5c259d-9dea-4da9-af25-42e596d24590', NULL, 14, 0, 500, '0788518845', 50, '2024-11-21 15:58:21', 1),
(17, '48058d29-0ff4-4ed2-8f0a-f8c64123a9d8', NULL, 14, 0, 1000, '0788518845', 100, '2024-11-21 15:59:55', 1),
(18, '75248637-1d9f-45df-acad-046a0863ee78', NULL, 14, 0, 2000, '0788518845', 200, '2024-11-28 10:41:23', 1),
(19, 'a2a9ecaa-9cc0-4093-8859-4fc11058607c', NULL, 14, 0, 200, '0788518845', 20, '2024-12-03 09:17:37', 1),
(20, '88c8fd86-3d14-4baf-aecf-e8c7659ed9dc', NULL, 14, 0, 1500, '0788907934', 150, '2024-12-30 18:53:53', 1),
(21, '01c51bb6-e888-4b95-a496-4e522b882a9c', NULL, 14, 0, 1000, '0788518845', 100, '2025-01-09 17:30:20', 1),
(22, 'deca8feb-2cf9-4b0d-8475-6950d54882f6', NULL, 14, 0, 100, '0788518845', 10, '2025-01-30 15:34:50', 1),
(23, 'be2b2c31-fdbd-4880-bd12-b4e5b1be7c4b', NULL, 14, 0, 1000, '0788518845', 100, '2025-01-30 15:38:32', 1),
(24, '5cb0703d-a5e8-4d42-a23e-2bb2531393f5', NULL, 14, 0, 1000, '0788518845', 100, '2025-01-31 11:20:58', 1),
(25, '003fcdaa-a54d-4ff6-94d1-431d4a067b56', NULL, 14, 0, 1500, '0788478632', 150, '2025-02-04 06:26:51', 1),
(26, '962e7e6d-2e6b-4e24-b3cd-5bf3332aa493', NULL, 14, 0, 1000, '0788518845', 100, '2025-02-11 14:25:15', 1),
(27, 'b7378d7b-cc15-451f-b135-5219b45ca649', NULL, 14, 0, 140, '0788518845', 14, '2025-02-24 06:22:36', 1),
(28, '38af3367-aa3b-4459-b5d3-821d5ed157a8', NULL, 14, 0, 200, '0788478632', 20, '2025-02-24 06:23:45', 1),
(29, '9f5bb821-f83f-4c6e-8a2f-3208f9985cdc', NULL, 14, 0, 1000, '0788518845', 100, '2025-02-27 11:04:58', 1),
(30, 'de4aaef5-0ad8-4260-9f22-9def2ee12d15', NULL, 14, 0, 1500, '0788518845', 150, '2025-03-05 14:48:59', 1),
(31, '09208603-5405-4621-9cf6-3de516f95ae7', NULL, 4, 0, 100000, '0788810007', 10000, '2025-03-12 07:27:27', 1),
(32, '40b96858-e907-4af9-88df-d2f4e9a80ec7', NULL, 14, 0, 1000, '0788518845', 100, '2025-03-19 05:59:16', 1),
(33, '6dadda74-bac0-4d2c-a940-671884087ce7', NULL, 14, 0, 1000, '0788478632', 100, '2025-03-28 14:24:30', 1),
(34, '38131d61-82c6-4819-bbd9-e88701def0ec', NULL, 14, 0, 1000, '0788518845', 100, '2025-03-30 12:14:35', 1),
(35, 'b35f009f-31a3-4a07-80ff-33a2443cd6dd', NULL, 14, 0, 500, '0788518845', 50, '2025-04-11 06:56:21', 1),
(36, '38d5e762-0507-42a9-a88a-0fac1ef52463', NULL, 14, 0, 1000, '0788518845', 100, '2025-04-15 14:11:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price`
--

CREATE TABLE `tbl_price` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_price`
--

INSERT INTO `tbl_price` (`id`, `price`) VALUES
(1, 10),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `reg_id` int(11) NOT NULL,
  `stu_code` varchar(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `center_id` int(11) DEFAULT NULL,
  `learning_categ` varchar(11) DEFAULT NULL,
  `paid_day` float NOT NULL DEFAULT 0,
  `amount` float NOT NULL DEFAULT 0,
  `due_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sts` int(11) NOT NULL COMMENT '1=active,3=pending,0=disactive,2=finished'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role`) VALUES
(1, 'National Authority'),
(2, 'Head-Association'),
(3, 'Driving School'),
(4, 'Instractor'),
(5, 'Beginner Driver'),
(6, 'Unclassfication');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school_instractor`
--

CREATE TABLE `tbl_school_instractor` (
  `id` int(11) NOT NULL,
  `ID_number` varchar(20) DEFAULT NULL,
  `school_code` varchar(12) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `interest_rate` float NOT NULL DEFAULT 0,
  `sts` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active,0=disactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `session_id` int(11) NOT NULL,
  `stu_code` varchar(12) DEFAULT NULL,
  `center_id` int(11) DEFAULT 0,
  `instractor_code` varchar(12) DEFAULT NULL,
  `license_categ` varchar(11) DEFAULT NULL,
  `dueDate` date DEFAULT NULL,
  `trm` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=attend,0=not attend'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `short_name` varchar(10) NOT NULL,
  `location` varchar(200) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `sms` varchar(10) NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `full_name`, `short_name`, `location`, `website`, `email`, `mail`, `phone`, `sms`, `logo`) VALUES
(1, 'ITEC-Driving', 'Driving', 'KN 1 Rd, Kigali-Rwanda', 'www.itecsms.rw', 'info@itec.rw', 'info@itec.rw', '0788620612', '0788620612', 'images/favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_packet`
--

CREATE TABLE `tbl_sms_packet` (
  `pack_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `org_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_sms_packet`
--

INSERT INTO `tbl_sms_packet` (`pack_id`, `balance`, `org_id`) VALUES
(1, 2, 1),
(2, 8, 3),
(3, 8924, 4),
(4, 10, 5),
(5, 0, 7),
(6, 27, 10),
(7, 0, 11),
(8, 991, 12),
(9, 599, 13),
(10, 47, 14),
(11, 0, 16),
(12, 1000, 17),
(13, 9580, 18),
(14, 652, 19),
(15, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `stu_code` varchar(30) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `familly_name` varchar(30) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ID_number` varchar(16) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 3 COMMENT '3=pending,1=active,2=finished,0=disactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `stu_code`, `first_name`, `familly_name`, `phone`, `email`, `ID_number`, `status`) VALUES
(1, NULL, 'Alex', NULL, '0788561620', NULL, NULL, 3),
(2, NULL, 'UWICYEZA Belinda', NULL, '0787106743', NULL, NULL, 3),
(3, NULL, 'UMUHOZA Sandrine', NULL, '0788857987', NULL, NULL, 3),
(4, NULL, 'BYIRINGIRO Jules Seraphin Seth', NULL, '0788361117', NULL, NULL, 3),
(5, NULL, 'NDAHIMANA Valensi', NULL, '0788734139', NULL, NULL, 3),
(6, NULL, 'biziyaremye', NULL, '0783857284', NULL, NULL, 3),
(7, NULL, 'biziyaremy', NULL, '0737421788', NULL, NULL, 3),
(8, NULL, 'Shekinah', NULL, '0789066186', NULL, NULL, 3),
(9, NULL, 'Clement NTIHINYURWA', NULL, '0788478632', NULL, NULL, 3),
(10, NULL, 'MUGISHA Nexon', NULL, '0798664112', NULL, NULL, 3),
(11, NULL, 'RWIGARA Rodrigue', NULL, '0787910406', NULL, NULL, 3),
(12, NULL, 'Joyeuse MUKESHIMANA', NULL, '0782554075', NULL, NULL, 3),
(13, NULL, 'RUZINDANA Benjamin', NULL, '0782464880', NULL, NULL, 3),
(14, NULL, 'Jean Eric', NULL, '0787795144', NULL, NULL, 3),
(15, NULL, 'Tiger RUDATINKWA', NULL, '0780486849', NULL, NULL, 3),
(16, NULL, 'Olivier MUHAWENIMANA ', NULL, '0796109163', NULL, NULL, 3),
(17, NULL, 'ISHIMWE Alexis', NULL, '0786981832', NULL, NULL, 3),
(18, NULL, 'MIZERO Divine', NULL, '0791124195', NULL, NULL, 3),
(19, NULL, 'IZERE Carine', NULL, '0781886115', NULL, NULL, 3),
(20, NULL, 'KANYANGE Christine', NULL, '0788896887', NULL, NULL, 3),
(21, NULL, 'SANO Olivier', NULL, '0781271208', NULL, NULL, 3),
(22, NULL, 'jonas', NULL, '0784039108', NULL, NULL, 3),
(23, NULL, 'David', NULL, '0788938793', NULL, NULL, 3),
(24, NULL, 'charles', NULL, '0783939465', NULL, NULL, 3),
(25, NULL, 'Ishimwe Fabrice', NULL, '0784995385', NULL, NULL, 3),
(26, NULL, 'IRAKOZE yves', NULL, '0780758486', NULL, NULL, 3),
(27, NULL, 'RITHA', NULL, '0782302136', NULL, NULL, 3),
(28, NULL, 'NSHOGOZA SERGE', NULL, '0788956719', NULL, NULL, 3),
(29, NULL, 'Alexandre', NULL, '0780340692', NULL, NULL, 3),
(30, NULL, 'Jean derc', NULL, '078888026', NULL, NULL, 3),
(31, NULL, 'Mico innocent', NULL, '0786837774', NULL, NULL, 3),
(32, NULL, 'Hakizimana James', NULL, '0790052383', NULL, NULL, 3),
(33, NULL, 'RUKUNDO OLIVIER', NULL, '0784882753', NULL, NULL, 3),
(34, NULL, 'NDATIMANA UZIEL', NULL, '0788478967', NULL, NULL, 3),
(35, NULL, 'ISHIMWE JEAN PAUL', NULL, '0788333014', NULL, NULL, 3),
(36, NULL, 'NSHIMIYIMANA EMMY', NULL, '0784904364', NULL, NULL, 3),
(37, NULL, 'MUKABARISA JOYCE', NULL, '0782895946', NULL, NULL, 3),
(38, NULL, 'Ndatimana Divine', NULL, '0791021592', NULL, NULL, 3),
(39, NULL, 'Hirwa jules', NULL, '0790175102', NULL, NULL, 3),
(40, NULL, 'Rwigamva derrick', NULL, '0787756670', NULL, NULL, 3),
(41, NULL, 'CEO KIAC', NULL, '0788416472', NULL, NULL, 3),
(42, NULL, 'Fred Rutagengwa', NULL, '0783391573', NULL, NULL, 3),
(43, NULL, 'Delice ', NULL, '0722369744', NULL, NULL, 3),
(44, NULL, 'angel study in canada', NULL, '0787246579', NULL, NULL, 3),
(45, '123456', ' Jean Baptiste', 'SHUMBUSHO', '+250788644687', 'Jean33@example.com', '4678999888866', 1),
(46, '24UB009K', ' Baptiste', 'Jean', '+25078864468', 'Jean@example.com', '467899996', 1),
(47, '24UB009K', ' Jean Baptiste', 'SHUMBUSHO', '+25078864468', 'Jean@example.com', '46789998', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `acc_id` int(11) NOT NULL,
  `user_code` varchar(20) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `security_key` varchar(500) DEFAULT NULL,
  `center_id` varchar(11) DEFAULT NULL,
  `role_id` varchar(11) DEFAULT NULL,
  `school_id` varchar(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `last_logged_in` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`acc_id`, `user_code`, `last_name`, `first_name`, `phone`, `email`, `security_key`, `center_id`, `role_id`, `school_id`, `status`, `last_logged_in`) VALUES
(1, '123456', 'Jean', ' SHUMBUSHO', '+250788644687', 'Jeam400@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1', '1', '1', 1, NULL),
(2, '250001', 'Jean', ' Baptiste', '+1234567890', 'jean2@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1', '1', '2', 1, NULL),
(3, '250002', 'Jean', ' Baptiste', '+1234567890', 'jean3@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1', '1', '2', 1, NULL),
(4, '250003', 'Jean', ' Baptiste', '+250788644687', 'Jeam@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1', '1', '1', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset_otp`
--
ALTER TABLE `password_reset_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_centers`
--
ALTER TABLE `tbl_centers`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `tbl_driving_schools`
--
ALTER TABLE `tbl_driving_schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  ADD PRIMARY KEY (`instractor_id`);

--
-- Indexes for table `tbl_licence_permitted`
--
ALTER TABLE `tbl_licence_permitted`
  ADD PRIMARY KEY (`permitted_id`);

--
-- Indexes for table `tbl_license`
--
ALTER TABLE `tbl_license`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pay_mode`
--
ALTER TABLE `tbl_pay_mode`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `tbl_pay_trans`
--
ALTER TABLE `tbl_pay_trans`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `tbl_price`
--
ALTER TABLE `tbl_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_school_instractor`
--
ALTER TABLE `tbl_school_instractor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_packet`
--
ALTER TABLE `tbl_sms_packet`
  ADD PRIMARY KEY (`pack_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`acc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_reset_otp`
--
ALTER TABLE `password_reset_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_centers`
--
ALTER TABLE `tbl_centers`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_driving_schools`
--
ALTER TABLE `tbl_driving_schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_instructors`
--
ALTER TABLE `tbl_instructors`
  MODIFY `instractor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_licence_permitted`
--
ALTER TABLE `tbl_licence_permitted`
  MODIFY `permitted_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_license`
--
ALTER TABLE `tbl_license`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pay_mode`
--
ALTER TABLE `tbl_pay_mode`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pay_trans`
--
ALTER TABLE `tbl_pay_trans`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_price`
--
ALTER TABLE `tbl_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_school_instractor`
--
ALTER TABLE `tbl_school_instractor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sms_packet`
--
ALTER TABLE `tbl_sms_packet`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
