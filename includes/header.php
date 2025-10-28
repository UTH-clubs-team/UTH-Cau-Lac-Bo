<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTH Clubs - Quản Lý Câu Lạc Bộ & Sự Kiện</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">🎓 Câu lạc bộ của UTH</div>
            <ul class="nav-links" id="navLinks">
                <li><a href="#" onclick="showSection('home'); return false;" class="active">Trang Chủ</a></li>
                <li><a href="#" onclick="showSection('clubs'); return false;">Câu Lạc Bộ</a></li>
                <li><a href="#" onclick="showSection('events'); return false;">Sự Kiện</a></li>
            </ul>
            <div class="auth-section" id="authSection">
                <div class="auth-buttons">
                    <a href="#" class="btn btn-secondary" onclick="showLoginModal(); return false;">Đăng Nhập</a>
                    <a href="#" class="btn btn-primary" onclick="showRegisterModal(); return false;">Đăng Ký</a>
                </div>
            </div>
        </div>
    </nav>
    <script>
        window.__ACTIVE_SECTION__ = <?php echo json_encode(isset($activeSection) ? $activeSection : 'home'); ?>;
        window.__ACTIVE_CLUB_ID__ = <?php echo json_encode(isset($activeClubId) ? $activeClubId : null); ?>;
    </script>
    <main class="site-main">