SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `leader_id` int(11) DEFAULT NULL,
  `activities` text DEFAULT NULL,
  `schedule_meeting` varchar(255) DEFAULT NULL,
  `club_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `description`, `category`, `leader_id`, `activities`, `schedule_meeting`, `club_image`, `created_at`) VALUES
(1, 'CLB Công Nghệ', 'Khám phá thế giới công nghệ, lập trình và đổi mới sáng tạo. Tham gia cùng chúng tôi trong các hội thảo, hackathon và các buổi nói chuyện về công nghệ.', 'technology', 2, 'Học code hàng tuần, Hackathon hàng tháng, Tech Talks, Vườn ươm khởi nghiệp', 'Thứ Ba hàng tuần, 18:00', 'uploads/clubs/congnghe.jpg', '2025-09-30 06:49:09'),
(2, 'CLB Mỹ Thuật', 'Thể hiện sự sáng tạo của bạn thông qua các loại hình nghệ thuật khác nhau. Từ hội họa đến nghệ thuật số, chúng tôi chào đón tất cả các nghệ sĩ.', 'arts', 2, 'Vẽ tranh hàng tuần, Đi bộ chụp ảnh (Photo Walk), Triển lãm hàng tháng, Dự án hợp tác', 'Thứ Sáu hàng tuần, 16:00', 'uploads/clubs/mythuat.jpg', '2025-09-30 06:49:09'),
(3, 'Hội Tranh Biện', 'Rèn luyện kỹ năng nói trước công chúng và tư duy phản biện thông qua các cuộc tranh luận và thảo luận hấp dẫn.', 'academic', 2, 'Tranh biện hàng tuần, Hội thảo nói trước công chúng, Thi đấu liên trường, Nghiên cứu & Phân tích', 'Thứ Tư hàng tuần, 19:00', 'uploads/clubs/tranhbien.jpg', '2025-09-30 06:49:09'),
(4, 'CLB Bóng Đá', 'Tham gia đội bóng đá của chúng tôi để tập luyện thường xuyên, đá giao hữu và tham gia các giải đấu.', 'sports', 2, 'Các buổi tập luyện, Đá giao hữu liên khoa, Rèn luyện kỹ năng, Chương trình thể lực', 'Thứ Hai & Thứ Năm, 17:00', 'uploads/clubs/bongda.jpg', '2025-09-30 06:49:09'),
(5, 'Hội Khoa Học', 'Khám phá các phát kiến khoa học, tiến hành thí nghiệm và tham gia các hội chợ khoa học và cuộc thi.', 'academic', 2, 'Thực hành phòng thí nghiệm, Chuẩn bị hội chợ khoa học, Thuyết trình nghiên cứu, Đi thực tế', 'Thứ Bảy hàng tuần, 14:00', 'uploads/clubs/khoahoc.jpg', '2025-09-30 06:49:09'),
(6, 'CLB Âm Nhạc', 'Chia sẻ tình yêu âm nhạc thông qua biểu diễn, các buổi hòa tấu (jam session) và sự kiện thưởng thức âm nhạc.', 'arts', 2, 'Giao lưu âm nhạc, Đêm nhạc Open Mic, Hội thảo lý thuyết âm nhạc, Biểu diễn hòa nhạc', 'Chủ Nhật hàng tuần, 15:00', 'uploads/clubs/amnhac.jpg', '2025-09-30 06:49:09'),
(8, 'CLB Thử Nghiệm', 'Câu lạc bộ dành cho mục đích kiểm thử hệ thống.', 'technology', 7, 'Hội thảo demo', 'Chưa xác định', 'uploads/clubs/thunghiem.jpg', '2025-10-03 10:08:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `club_members`
--

CREATE TABLE `club_members` (
  `id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `joined_date` date DEFAULT curdate(),
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `club_members`
--

INSERT INTO `club_members` (`id`, `club_id`, `user_id`, `joined_date`, `status`) VALUES
(3, 2, 4, '2024-01-18', 'approved'),
(4, 2, 5, '2024-01-22', 'approved'),
(5, 3, 6, '2024-01-25', 'approved'),
(6, 4, 7, '2024-01-28', 'approved'),
(8, 5, 3, '2024-02-01', 'approved'),
(9, 6, 4, '2024-02-03', 'approved'),
(17, 2, 8, '2025-10-03', 'approved'),
(18, 4, 8, '2025-10-03', 'approved');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `max_participants` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `event_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `club_id`, `name`, `date`, `location`, `max_participants`, `description`, `event_image`) VALUES
(1, 1, 'Hackathon 2024', '2024-02-15', 'Phòng máy A', 50, 'Cuộc thi lập trình 24h dành cho sinh viên toàn trường.', 'uploads/events/hackathon.jpg'),
(2, 1, 'Hội thảo AI', '2024-02-20', 'Giảng đường 1', 30, 'Tìm hiểu về trí tuệ nhân tạo căn bản.', 'uploads/events/hoithaoai.jpg'),
(3, 2, 'Triển lãm Nghệ thuật', '2024-02-18', 'Sảnh trưng bày', 100, 'Trưng bày các tác phẩm xuất sắc nhất của thành viên.', 'uploads/events/trienlam.jpg'),
(4, 2, 'Cuộc thi Nhiếp ảnh', '2024-02-25', 'Khu vườn trường', 25, 'Chủ đề: Mùa xuân trong mắt sinh viên.', 'uploads/events/nhiepanh.jpg'),
(5, 3, 'Tranh biện Liên trường', '2024-02-22', 'Hội trường chính', 200, 'Giao lưu tranh biện với các trường đại học lân cận.', 'uploads/events/tranhbienlientruong.jpg'),
(6, 4, 'Giải Bóng đá Mùa xuân', '2024-02-28', 'Sân vận động', 22, 'Giải đấu thường niên của CLB.', 'uploads/events/bongdamuaxuan.jpg'),
(7, 5, 'Hội chợ Khoa học', '2024-03-05', 'Tòa nhà Khoa học', 80, 'Trưng bày các mô hình và thí nghiệm sáng tạo.', 'uploads/events/hoichokhoahoc.jpg'),
(8, 6, 'Hòa nhạc Acoustic', '2024-03-10', 'Phòng Âm nhạc', 150, 'Đêm nhạc nhẹ nhàng thư giãn.', 'uploads/events/hoanhac.jpg'),
(9, 8, 'Sự kiện Demo', '2025-10-24', 'Phòng họp nhỏ', 50, 'Sự kiện dùng để kiểm thử chức năng đăng ký.', 'uploads/events/sukiendemo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event_registrations`
--

CREATE TABLE `event_registrations` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('registered','attended','cancelled') DEFAULT 'registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `event_registrations`
--

INSERT INTO `event_registrations` (`id`, `event_id`, `user_id`, `status`) VALUES
(1, 1, 2, 'registered'),
(2, 1, 3, 'registered'),
(3, 2, 2, 'attended'),
(4, 3, 4, 'registered'),
(5, 4, 4, 'registered'),
(6, 5, 6, 'registered'),
(7, 6, 7, 'registered'),
(8, 7, 3, 'registered'),
(9, 8, 4, 'registered'),
(10, 1, 8, 'registered'),
(11, 3, 8, 'registered'),
(12, 9, 8, 'registered'),
(13, 8, 8, 'registered'),
(14, 7, 8, 'registered'),
(15, 2, 8, 'registered'),
(16, 6, 8, 'registered'),
(17, 4, 8, 'registered'),
(18, 5, 8, 'registered');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `join_requests`
--

CREATE TABLE `join_requests` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `processed_by` int(11) DEFAULT NULL,
  `processed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `join_requests`
--

INSERT INTO `join_requests` (`id`, `club_id`, `user_id`, `request_date`, `status`, `processed_by`, `processed_date`) VALUES
(1, 1, 8, '2025-10-03 20:02:27', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin') DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `student_id`, `password`, `role`, `created_at`) VALUES
(1, 'Quản Trị Viên', 'admin@ut.edu.vn', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2025-09-30 06:49:08'),
(2, 'Nguyễn Văn Hùng', 'hungnv@ut.edu.vn', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '2025-09-30 06:49:08'),
(3, 'Nguyễn Văn A', 'nguyenvana@ut.edu.vn', 'SV001', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '2025-09-30 06:49:09'),
(4, 'Trần Thị B', 'tranthib@ut.edu.vn', 'SV002', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '2025-09-30 06:49:09'),
(5, 'Lê Văn C', 'levanc@ut.edu.vn', 'SV003', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '2025-09-30 06:49:09'),
(6, 'Phạm Thị D', 'phamthid@ut.edu.vn', 'SV004', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '2025-09-30 06:49:09'),
(7, 'Hoàng Văn E', 'hoangvane@ut.edu.vn', 'SV005', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student', '2025-09-30 06:49:09'),
(8, 'Phạm Hoàng Sơn', 'sonph4282@ut.edu.vn', '11', '$2y$10$AlUzIWtS0JyJcM7KCpKuZeDhtB4pv.WjHQJWK7chvKda0ObMW/2w2', 'admin', '2025-10-03 05:42:39'),
(9, 'Người Dùng Test', 'testuser@ut.edu.vn', 'SV_TEST', '$2y$10$Gf.0ZMcX5lz26ZBmiDABluppNVCmDeJ4/DuHaK8hx.BlRj/wMTJvK', 'student', '2025-10-03 10:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leader_id` (`leader_id`);

--
-- Indexes for table `club_members`
--
ALTER TABLE `club_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `join_requests`
--
ALTER TABLE `join_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_request` (`club_id`,`user_id`,`status`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `processed_by` (`processed_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `club_members`
--
ALTER TABLE `club_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_registrations`
--
ALTER TABLE `event_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `join_requests`
--
ALTER TABLE `join_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`leader_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `club_members`
--
ALTER TABLE `club_members`
  ADD CONSTRAINT `club_members_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`),
  ADD CONSTRAINT `club_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

--
-- Constraints for table `event_registrations`
--
ALTER TABLE `event_registrations`
  ADD CONSTRAINT `event_registrations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_registrations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `join_requests`
--
ALTER TABLE `join_requests`
  ADD CONSTRAINT `join_requests_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `join_requests_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `join_requests_ibfk_3` FOREIGN KEY (`processed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;