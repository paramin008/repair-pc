-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2022 at 06:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `type`, `name`, `is_active`, `is_delete`, `updated_at`, `created_at`) VALUES
(5, 3, 'Acer', 'Y', 'N', '2020-03-31 15:06:42', '2020-03-31 15:06:42'),
(6, 3, 'HP', 'Y', 'N', '2020-03-31 15:06:42', '2020-03-31 15:06:42'),
(7, 3, 'Lenovo', 'Y', 'N', '2020-03-31 15:06:42', '2020-03-31 15:06:42'),
(8, 3, 'Asus', 'Y', 'N', '2020-03-31 15:06:42', '2020-03-31 15:06:42'),
(9, 2, 'Acer', 'Y', 'N', '2020-03-31 15:06:42', '2020-03-31 15:06:42'),
(10, 2, 'Lenovo', 'Y', 'N', '2020-03-31 15:06:42', '2020-03-31 15:06:42'),
(11, 2, 'Asus', 'Y', 'N', '2020-03-31 15:06:42', '2020-03-31 15:06:42'),
(13, 5, 'Canon', 'Y', 'N', '2020-04-01 18:02:29', '2020-04-01 18:02:29'),
(14, 7, 'Acer', 'Y', 'N', '2020-04-02 04:26:34', '2020-04-02 04:26:34'),
(15, 5, 'HP', 'Y', 'N', '2020-04-02 04:27:59', '2020-04-02 04:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `is_delete` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `is_active`, `is_delete`, `updated_at`, `created_date`) VALUES
(18, 'Electrical appliances', 'Y', 'Y', '2020-04-01 17:46:28', '2019-12-27 17:58:28'),
(19, 'อุปกรณ์สำนักงาน', 'Y', 'N', '2020-04-01 17:46:48', '2019-12-27 17:58:48'),
(20, 'อื่นๆ', 'Y', 'N', '2020-04-01 17:46:34', '2019-12-27 18:12:28'),
(23, 'b', 'Y', 'N', '2020-07-07 05:49:33', '2020-07-07 05:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `serial_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` enum('Y','N','RP','WO') COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `serial_number`, `category`, `type`, `brand`, `photo`, `is_active`, `is_delete`, `updated_at`, `created_at`) VALUES
(8, 'Acer01', 'A10001', 19, 2, 9, '1585828966_26.jpg', 'Y', 'N', '2020-04-03 22:04:33', '2020-01-03 17:02:16'),
(11, 'MACER1001', 'MACER1001', 19, 7, 14, '1585801630_26.jpg', 'Y', 'N', '2020-07-12 14:13:14', '2020-04-02 04:27:09'),
(12, 'HP Deskjet 1001', 'hpdeskjet1001', 19, 5, 15, '1585801700_26.jpg', 'Y', 'N', '2020-04-03 22:05:21', '2020-04-02 04:28:19'),
(13, 'AIO Lenovo 1001', 'aiolenove1001', 19, 3, 7, '1585801812_26.jpg', 'Y', 'N', '2020-07-30 07:39:43', '2020-04-02 04:30:12'),
(14, 'yrt', 'rr', 19, 7, 14, '1594101308_26.jpg', 'Y', 'N', '2020-07-30 07:39:46', '2020-07-07 05:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `per_id` int(11) NOT NULL,
  `per_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`per_id`, `per_name`) VALUES
(1, 'ผู้ดูแล'),
(2, 'ผู้ใช้งาน'),
(3, 'ช่างซ่อม'),
(4, 'หัวหน้าช่าง');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`id`, `name`, `is_active`, `is_delete`, `updated_at`, `created_at`) VALUES
(2, 'เปิดไม่ติด', 'Y', 'N', '2020-04-02 21:06:43', '2020-04-02 21:06:43'),
(5, 'Printer', 'Y', 'N', '2020-04-02 21:09:03', '2020-04-02 21:09:03'),
(6, 'Internet ใช้งานไม่ได้', 'Y', 'N', '2020-04-02 21:10:08', '2020-04-02 21:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `inventory_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `problem` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `technician` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `inventory_id`, `problem`, `description`, `user_id`, `technician`, `updated_at`, `created_at`, `email`) VALUES
(66, 'ooo', 'ooo', 'ooo', 26, 41, '2020-08-17 17:34:52', '2020-08-17 17:34:52', 'dm\'@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `repair_detail`
--

CREATE TABLE `repair_detail` (
  `id` int(11) NOT NULL,
  `repair_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `note` varchar(210) COLLATE utf8_unicode_ci DEFAULT 'ไม่ได้ระบุ',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `repair_detail`
--

INSERT INTO `repair_detail` (`id`, `repair_id`, `status_id`, `note`, `updated_at`, `created_at`, `email`) VALUES
(85, 66, 14, 'ไม่ได้ระบุ', '2020-08-17 17:34:52', '2020-08-17 17:34:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bg_color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `text_color` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#000000',
  `is_active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `bg_color`, `text_color`, `is_active`, `is_delete`, `updated_at`, `created_at`) VALUES
(1, 'กำลังดำเนินการ', '#0080ff', '#ffffff', 'Y', 'N', '2020-04-01 01:41:34', '2020-04-01 01:41:34'),
(2, 'สำเร็จ', '#008040', '#ffffff', 'Y', 'N', '2020-04-01 01:41:34', '2020-04-01 01:41:34'),
(3, 'ยกเลิก', '#ff0000', '#ffffff', 'Y', 'N', '2020-04-01 01:41:34', '2020-04-01 01:41:34'),
(12, 'ส่งซ่อมศูนย์', '#8000ff', '#ffffff', 'Y', 'N', '2020-04-01 17:48:18', '2020-04-01 17:48:18'),
(13, 'ส่งร้านนอก', '#800080', '#ffffff', 'Y', 'N', '2020-04-01 17:48:24', '2020-04-01 17:48:24'),
(14, 'แจ้งซ่อม', '#80ffff', '#000000', 'Y', 'N', '2020-04-02 12:05:30', '2020-04-02 12:05:30'),
(15, 'ไม่สำเร็จ', '#ff8000', '#000000', 'Y', 'N', '2020-04-02 12:06:04', '2020-04-02 12:06:04'),
(16, 'รออะไหล่', '#808000', '#ffffff', 'Y', 'N', '2020-04-02 12:06:12', '2020-04-02 12:06:12'),
(17, 'รอตรวจสอบ', '#ffff00', '#000000', 'Y', 'N', '2020-04-03 01:28:19', '2020-04-03 01:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `title`, `name`, `updated_at`, `created_at`) VALUES
(1, 'ระบบแจ้งซ่อม', 'ระบบแจ้งซ่อม', '2020-07-07 06:19:44', '2019-12-26 18:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `category`, `name`, `is_active`, `is_delete`, `updated_at`, `created_at`) VALUES
(2, 19, 'โน๊ตบุ๊ค', 'Y', 'N', '2020-04-01 17:47:20', '2020-01-03 17:32:34'),
(3, 19, 'คอมพิวเตอร์', 'Y', 'N', '2020-04-01 17:47:10', '2020-03-31 14:57:06'),
(4, 20, 'test', 'Y', 'Y', '2020-04-01 17:47:04', '2020-04-01 08:21:56'),
(5, 19, 'ปริ้นเตอร์', 'Y', 'N', '2020-04-01 17:47:41', '2020-04-01 17:47:31'),
(6, 19, 'เครื่องถ่ายเอกสาร', 'Y', 'N', '2020-04-01 17:47:58', '2020-04-01 17:47:58'),
(7, 19, 'หน้าจอ', 'Y', 'N', '2020-04-02 04:25:27', '2020-04-02 04:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `ui_language`
--

CREATE TABLE `ui_language` (
  `id` int(11) NOT NULL,
  `en` text COLLATE utf8_unicode_ci NOT NULL,
  `th` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ui_language`
--

INSERT INTO `ui_language` (`id`, `en`, `th`) VALUES
(2, 'Login', 'เข้าสู่ระบบ'),
(3, 'Thailand', 'ภาษาไทย'),
(4, 'English', 'ภาษาอังกฤษ'),
(5, 'Username', 'ชื่อผู้ใช้งาน'),
(6, 'Password', 'รหัสผ่าน'),
(7, 'Welcome', 'ยินดีต้อนรับ'),
(9, 'Dashboard', 'แดชบอร์ด'),
(10, 'Home', 'หน้าแรก'),
(11, 'Profile', 'โปรไฟล์'),
(12, 'Logout', 'ออกจากระบบ'),
(13, 'Users', 'ผู้ใช้งาน'),
(14, 'Systems', 'ระบบ'),
(15, 'Settings', 'ตั้งค่า'),
(16, 'Category', 'หมวดหมู่'),
(17, 'Type', 'ประเภท'),
(18, 'Brand', 'ยี่ห้อ'),
(19, 'Problems', 'ปัญหา'),
(20, 'Status', 'สถานะ'),
(21, 'Inventory', 'รายการ'),
(22, 'Repair', 'แจ้งซ่อม'),
(23, 'Enabled', 'เปิดใช้งาน'),
(24, 'disable', 'ปิดใช้งาน'),
(25, 'Background Color', 'สีพื้นหลัง'),
(26, 'Select Color', 'เลือกสี'),
(27, 'Text Color', 'สีข้อความ'),
(28, 'Save', 'บันทึก'),
(29, 'Problem', 'ปัญหา'),
(30, 'Name', 'ชื่อ'),
(31, 'Color', 'สี'),
(32, 'Edit', 'แก้ไข'),
(33, 'Delete', 'ลบ'),
(34, 'Select All', 'เลือกทั้งหมด'),
(35, 'Trash', 'ถังขยะ'),
(36, 'No', 'ไม่'),
(37, 'Yes', 'ใช่'),
(38, 'Are you want to delete all?', 'คุณต้องการลบทั้งหมด?'),
(39, 'Do you want to delete this information?', 'คุณต้องการลบข้อมูลนี้หรือไม่?'),
(40, 'Please Enter Name', 'โปรดระบุชื่อ'),
(41, 'New Inventory', ''),
(42, 'Picture', 'รูปภาพ'),
(43, 'Send to Repair', 'ส่งซ่อม'),
(44, 'Worn out', 'ชำรุด'),
(45, 'Choose File', 'เลือกไฟล์'),
(46, 'Serial Number', 'รหัสเครื่อง'),
(48, 'Please Select Category', 'โปรดเลือกหมวดหมู่'),
(49, 'Please Select Type', 'โปรดเลือกประเภท'),
(50, 'Please Select Brand', 'โปรดเลือกยี่ห้อ'),
(51, 'Please Enter Serial Number', 'โปรดระบุรหัสเครื่อง'),
(52, 'Disabled', 'ปิดใช้งาน'),
(53, 'Extensions Support', 'การสนับสนุนส่วนขยาย'),
(54, 'Home', 'หน้าหลัก'),
(55, 'Please Enter Problem', 'โปรดระบุปัญหา'),
(56, 'Please Enter Brand', 'โปรดระบุยี่ห้อ'),
(58, 'Title', 'หัวข้อ'),
(59, 'Data update successful.', 'อัปเดตข้อมูลสำเร็จแล้ว'),
(60, 'Please Enter Title', 'โปรดระบุหัวข้อ'),
(61, 'Please Enter Type', 'โปรดระบุประเภท'),
(62, 'Please Enter Category', 'โปรดระบุหมวดหมู่'),
(64, 'New User', 'เพิ่มผู้ใช้'),
(65, 'Full Name', 'ชื่อและนามสกุล'),
(66, 'Position', 'ตำแหน่ง'),
(67, 'View', 'ดู'),
(68, 'User', 'ผู้ใช้'),
(69, 'Prolfile', 'ข้อมูลส่วนตัว'),
(70, 'Email', 'อีเมล'),
(71, 'Gender', 'เพศ'),
(72, 'BirthDay', 'วันเกิด'),
(73, 'Phone Number', 'เบอร์โทร'),
(74, 'Male', 'ชาย'),
(75, 'First Name', 'ชื่อ'),
(76, 'Last Name', 'นามสกุล'),
(77, 'Gender', 'เพศ'),
(78, 'Female', 'หญิง'),
(80, 'Upload', 'อัพโหลด'),
(81, 'Info', 'ข้อมูล'),
(82, 'Change Password', 'เปลี่ยนรหัสผ่าน'),
(83, 'Current Password', 'รหัสผ่านปัจจุบัน'),
(84, 'New Password', 'รหัสผ่านใหม่'),
(85, 'Confirm Password', 'ยืนยันรหัสผ่าน'),
(86, 'Please Enter Username', 'กรุณาใส่ชื่อผู้ใช้'),
(87, 'Please Enter First Name', 'กรุณาใส่ชื่อ'),
(88, 'Please Enter Last Name', 'กรุณาใส่นามสกุล'),
(89, 'Please Enter Email', 'กรุณาใส่อีเมล'),
(90, 'Please Enter Current Password', 'กรุณาใส่รหัสผ่านปัจจุบัน'),
(91, 'Please Enter New Password', 'กรุณาใส่รหัสผ่านใหม่'),
(92, 'Your password must be at least 6 characters long.', 'รหัสผ่านของคุณจะต้องมีความยาวอย่างน้อย 6 ตัวอักษร'),
(93, 'Please Enter Confirm Password', 'กรุณาใส่รหัสผ่านยืนยัน'),
(94, 'Please enter the same password as above.', ' กรุณาใส่รหัสผ่านเดียวกันกับด้านบน'),
(95, 'Upload', 'อัปโหลด'),
(96, 'Last Name', 'นามสกุล'),
(97, 'Repair List', 'รายการซ่อม'),
(98, 'Date', 'วันที่'),
(99, 'Repairer', 'ผู้ซ่อม'),
(100, 'Technician', 'ช่าง'),
(101, 'Please Select Inventory', 'กรุณาเลือกรายการ'),
(102, 'Please Select Problem', 'กรุณาเลือกปัญหา'),
(103, 'Description', 'ลักษณะอาการ'),
(104, 'Techician', 'ช่าง'),
(105, 'Please Select Technician', 'กรุณาเลือกช่าง'),
(106, 'No results found', 'ไม่พบผลลัพธ์'),
(107, 'Please Enter Description', 'กรุณาระบุลักษณะอาการ'),
(108, 'Successful data deletion.', 'ลบข้อมูลสำเร็จแล้ว'),
(109, 'Repair Today', 'รายการซ่อมวันนี้'),
(110, 'View More', 'ดูเพิ่มเติม'),
(111, 'Successfully saved data.', 'บันทึกข้อมูลสำเร็จแล้ว'),
(112, 'Inventory Enabled', 'เปิดใช้งานรายการ'),
(113, 'Inventory Disabled', 'ปิดใช้งานรายการ'),
(114, 'Inventory Send To Repair', 'รายการที่ส่งซ่อม'),
(115, 'Inventory Worn out', 'รายการที่เสีย'),
(116, 'Do you want to Logout?', 'คุณต้องการออกจากระบบหรือไม่'),
(117, 'Language', 'ภาษา'),
(118, 'EN', 'อังกฤษ'),
(119, 'TH', 'ไทย'),
(120, 'Detail', 'รายละเอียด'),
(121, 'Repair Update', 'ปรับปรุงซ่อมแซม'),
(122, 'Note', 'บันทึก'),
(123, 'Close', 'ปิด'),
(124, 'Add', 'เพิ่ม'),
(125, 'Cancel successful.', 'ยกเลิกสำเร็จ'),
(126, 'Repair Info', 'ข้อมูลซ่อม'),
(127, 'List Repair', 'รายการซ่อม'),
(128, 'Teahician', 'ช่าง'),
(129, 'List Techician', 'รายซื่อช่าง'),
(130, 'Repairing System Online', 'ระบบแจ้งซ่อมออนไลน์'),
(131, 'Send Mail', 'ส่งอีเมลแจ้งชำระ'),
(132, 'Price', 'ราคา'),
(133, 'Baht', 'บาท'),
(134, 'Subject', 'หัวข้อ'),
(135, 'detil', 'รายละเอียด');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL DEFAULT 2,
  `is_active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `is_delete` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `gender`, `birthdate`, `email`, `phone_number`, `profile`, `position`, `is_active`, `is_delete`, `updated_at`, `created_at`) VALUES
(26, 'admin', '$2y$10$4LF/.nmuBTQH8G6kU7DJ/ekql3cGtRZHVge7plFiN/S/2amMn.ZAq', 'paramin', 'supapong', 'M', '1994-01-13', 'paramin@gmail.com', '0928195249', '1597245602_26.jpg', 1, 'Y', 'N', '2022-01-30 05:44:18', '2019-12-27 04:28:27'),
(41, 'user02', '$2y$10$qQHacxdGFA7mW2oPOAvHouuiyLSX8H50aFW765/GJ0TZP57hN.1ou', 'ช่าง', '02', 'M', '2020-07-06', 'user02@mail.com', '09922222', '1594565989_26.png', 3, 'Y', 'N', '2020-07-12 15:07:04', '2020-04-02 21:31:40'),
(42, 'user01', '$2y$10$TgXp6.3aaoMKKG9P754le.QJ9upDOpLj0lQuJIgO.0/VQ0b5BQaaO', 'user', '01', 'M', '0002-02-07', 'user@gmail.com', '', '1594566079_26.jpg', 2, 'Y', 'N', '2020-07-12 15:07:20', '2020-04-03 21:59:20'),
(43, 'user03', '$2y$10$UXnWKnIGTkX0z0cciDHo9ud0vFZrZdY2HZs5zMr.teKwP/RkD1Jf2', 'หัวหน้าช่าง', '03', 'M', '2020-07-22', 'user03@mail.com', '', '', 4, 'Y', 'N', '2020-07-08 18:13:49', '2020-04-03 22:00:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair_detail`
--
ALTER TABLE `repair_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `repair_id` (`repair_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_language`
--
ALTER TABLE `ui_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `repair_detail`
--
ALTER TABLE `repair_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ui_language`
--
ALTER TABLE `ui_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `repair_detail`
--
ALTER TABLE `repair_detail`
  ADD CONSTRAINT `repair` FOREIGN KEY (`repair_id`) REFERENCES `repair` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
