-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2024 lúc 05:29 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `task_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `task_management`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE `activity_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO `activity_logs` (`log_id`, `user_id`, `action`, `timestamp`) VALUES
(41, 4, 'Thêm công việc: Làm bài tập về nhà', '2024-12-14 11:20:02'),
(42, 4, 'Thêm danh mục: Làm việc', '2024-12-14 12:34:04'),
(43, 4, 'Thêm danh mục: Sinh hoạt', '2024-12-14 12:34:20'),
(44, 4, 'Xóa danh mục: Sinh hoạt', '2024-12-14 12:34:56'),
(45, 4, 'Xóa công việc: Làm bài tập về nhà', '2024-12-14 12:36:00'),
(46, 4, 'Thêm công việc: Làm bài tập 2', '2024-12-14 12:36:41'),
(47, 7, 'Xóa danh mục: hunglo', '2024-12-14 15:19:34'),
(48, 7, 'Xóa danh mục: hunglo', '2024-12-14 15:19:37'),
(49, 7, 'Xóa danh mục: test2', '2024-12-14 15:19:39'),
(50, 7, 'Xóa danh mục: tesst', '2024-12-14 15:19:41'),
(51, 7, 'Thêm danh mục: Danh mục mới', '2024-12-14 15:19:47'),
(52, 4, 'Thêm công việc: Làm bài tập 3', '2024-12-14 16:32:44'),
(53, 4, 'Sửa công việc: Làm bài tập 3', '2024-12-14 16:38:36'),
(54, 4, 'Thêm công việc: Làm bài tập 3', '2024-12-16 11:17:27'),
(55, 4, 'Thêm công việc: thử nghiệm lần 2', '2024-12-16 11:21:31'),
(56, 4, 'Thêm công việc: thử nghiệm lần 3', '2024-12-16 11:21:51'),
(57, 4, 'Xóa công việc: Làm bài tập 2', '2024-12-16 11:21:58'),
(58, 4, 'Xóa công việc: Làm bài tập 3', '2024-12-16 11:22:02'),
(59, 4, 'Xóa công việc: Làm bài tập 3', '2024-12-16 11:22:04'),
(60, 4, 'Xóa công việc: thử nghiệm lần 2', '2024-12-16 11:22:08'),
(61, 4, 'Xóa công việc: thử nghiệm lần 3', '2024-12-16 11:22:11'),
(62, 4, 'Thêm công việc: Làm bài tập 3', '2024-12-16 11:22:28'),
(63, 4, 'Thêm công việc: Làm bài tập 2', '2024-12-16 11:22:49'),
(64, 4, 'Thêm công việc: Làm bài tập 4', '2024-12-16 11:23:08'),
(65, 4, 'Sửa công việc: Làm bài tập 4', '2024-12-16 11:23:13'),
(66, 4, 'Sửa công việc: Làm bài tập 4', '2024-12-16 11:23:22'),
(67, 4, 'Sửa công việc: Làm bài tập 3', '2024-12-16 11:27:37'),
(68, 4, 'Sửa công việc: Làm bài tập 3', '2024-12-16 11:27:50');

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `priority` enum('low','medium','high') NOT NULL,
  `due_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `image` longblob DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `isDone` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE `reminders` (
  `reminder_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `reminder_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE `attachments` (
  `attachment_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

INSERT INTO `categories` (`category_id`, `user_id`, `category_name`) VALUES
(52, 4, 'Học tập'),
(59, 11, 'tesst'),
(63, 7, 'Học tập'),
(65, 11, 'help'),
(66, 11, 'test'),
(67, 4, 'Làm việc'),
(69, 7, 'Danh mục mới');


INSERT INTO `notifications` (`notification_id`, `user_id`, `message`, `is_read`, `created_at`) VALUES
(1, 4, 'test', 0, '2024-12-06 15:00:00');

INSERT INTO `tasks` (`task_id`, `user_id`, `title`, `description`, `priority`, `due_date`, `created_at`, `image`, `category`, `isDone`) VALUES
(18, NULL, 'test3', '', 'medium', '0000-00-00 00:00:00', '2024-12-03 12:25:06', NULL, 'Học tập', 0),
(19, NULL, 'test4', '', 'medium', '0000-00-00 00:00:00', '2024-12-03 12:28:35', NULL, 'Học tập', 0),
(20, NULL, 'test cv', '', 'medium', '0000-00-00 00:00:00', '2024-12-03 12:32:12', NULL, 'Học tập', 0),
(21, NULL, 'test cv 2', '', 'medium', '0000-00-00 00:00:00', '2024-12-03 12:37:27', NULL, 'Học tập', 0),
(22, NULL, 'thử nghiệm', '', 'medium', '0000-00-00 00:00:00', '2024-12-03 12:40:32', NULL, 'Học tập', 0),
(24, 7, 'n', '', 'medium', '0000-00-00 00:00:00', '2024-12-05 14:53:04', NULL, 'Học tập', 0),
(25, 7, 'test cv', '', 'medium', '0000-00-00 00:00:00', '2024-12-05 15:25:19', NULL, 'tesst', 0),
(26, 7, 'test cv', '', 'medium', '0000-00-00 00:00:00', '2024-12-05 15:25:31', NULL, 'Học tập', 0),
(28, 4, 'test2', 'test', 'medium', '2024-12-10 20:50:00', '2024-12-10 20:49:36', NULL, 'huongdan1', 0),
(37, 4, 'Làm bài tập 3', 'Làm bài tập 3 SGK Toán trang 70', 'medium', '2024-12-16 11:30:00', '2024-12-16 11:22:28', NULL, 'Học tập', 0),
(38, 4, 'Làm bài tập 2', '', 'medium', '2024-12-16 11:30:00', '2024-12-16 11:22:49', NULL, 'Học tập', 0),
(39, 4, 'Làm bài tập 4', '', 'medium', '2024-12-16 11:30:00', '2024-12-16 11:23:08', NULL, 'Học tập', 0);

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `created_at`) VALUES
(1, 'linhtran31', 'linhtran31@gmail.com', '$2y$10$9FWecizc7bMtsL6ZW7tJieZfwWCmElZp2yaZQdMFuFXSIIQjOjn2i', '2024-09-28 07:36:57'),
(2, 'test', 'test@gmail.com', '$2y$10$2F.7mhbPUeY3RbZrlkMKLun9UE84HgpPdBHOK2DmblccjCacpcwQ2', '2024-09-28 08:13:31'),
(3, 'test1', 'test1@gmail.com', '$2y$10$xRKdmt/l5Y/oAB0vprPp4eLvleiQ.IiPzAZxsbc.vjzlsUA2N6gH2', '2024-09-28 08:17:02'),
(4, 'hungpikatv', 'minotaurgamingofficial303@gmail.com', '$2y$10$wXwn53XrwUk8xJgkAdyVS.2hm8q77dJBPSUsdCfkh/YMLfUxI0z.O', '2024-10-30 04:39:08'),
(5, 'vinhhung2004', 'hungpikatv@gmail.com', '$2y$10$cepjCL/sjH4FnP6V7l3R3uAATredX.VHuQalTNxA2VWywtvoSnJPm', '2024-11-05 09:15:51'),
(6, '1h', 'minotaurgdvn3917@gmail.com', '$2y$10$Mbz0YbJ7rVQUQVHZydyeKu1JNL1MypNEpz1EGb.foVkQsy6Wq99.y', '2024-11-15 02:44:52'),
(7, '124', 'nguyenlevinhhungnt153@gmail.com', '$2y$10$2yUbS7xSdTHHxjjeCBn.X.zuqHRPiACvAISx67XK9kYLRc8nX1x4m', '2024-11-15 02:45:42'),
(8, 'vinhhung', 'hung@gmail.com', '$2y$10$vHLc/.oDLDlsKW1ylEOEeeic5r57fGBFuD74l5K2WcaHdr.0zVWMq', '2024-11-21 07:20:55'),
(9, '12345', '123@gmail.com', '$2y$10$l1lIKqf09evf7O06Yf1Wm.LS8vhfQpDdHJP0c3Q6NyFJwzBscP.Ba', '2024-11-21 07:21:39'),
(10, 'phan ngoc trien ', 'trienphan29011998@gmail.com', '$2y$10$EIW/fVcDiypflmBvZR2vzu2/Odp6LuqlF6AoB/KLC8kM7BJnN6V7G', '2024-11-21 07:42:05'),
(11, 'mino1234', 'mino1234@gmail.com', '$2y$10$VhTwQXmmhMIRLjcBXQNRcOZDNe5PIK3GS7byr6o4e.viT/JwCxMy6', '2024-12-05 07:23:50'),
(12, 'hungpikatv@gmail.com', 'mino12345@gmail.com', '$2y$10$Wm8y0i7wEcw.ieP2ZQSNBeXIISJ35JpMMVxqGDzUzfbEx5hWbT.wG', '2024-12-14 09:03:08');

ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `attachments`
--
ALTER TABLE `attachments`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
