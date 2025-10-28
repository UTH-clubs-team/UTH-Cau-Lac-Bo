<?php
// Include mock data file that contains $upcoming and $featuredClubs arrays
include_once __DIR__ . '/../config/mock_data.php';
?>
<!-- Home Section -->
<div id="home" class="section<?php echo ($activeSection === 'home') ? ' active' : ''; ?>">
    <div class="hero">
        <h1>Chào mừng đến với UTH Clubs</h1>
        <p>Khám phá câu lạc bộ, tham gia sự kiện và kết nối với cộng đồng sinh viên</p>
        <div class="hero-buttons">
            <a href="#" class="btn btn-primary" onclick="showSection('clubs'); return false;">Khám Phá CLB</a>
            <a href="#" class="btn btn-secondary" onclick="showSection('events'); return false;">Xem Sự Kiện</a>
        </div>
    </div>
    
    <div class="features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Phát Triển Bản Thân</h3>
                    <p>Tham gia các CLB để phát triển kỹ năng và đam mê của bạn</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3>Kết Nối</h3>
                    <p>Gặp gỡ những người bạn mới và mở rộng mạng lưới của bạn</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎉</div>
                    <h3>Sự Kiện Hấp Dẫn</h3>
                    <p>Tham gia các sự kiện thú vị và ý nghĩa</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="section-title">Sự Kiện Nổi Bật</h2>
        <div class="card-grid" id="upcomingEvents">
            <?php foreach ($upcoming as $ev): ?>
            <div class="card event-card">
                <div class="card-header">
                    <div style="display:flex; gap:1rem; align-items:center;">
                        <?php if (!empty($ev['event_image'])): ?>
                            <?php $imgFile = basename($ev['event_image']); ?>
                            <img src="uploads/events/<?php echo htmlspecialchars($imgFile); ?>" alt="<?php echo htmlspecialchars($ev['name']); ?>" style="width:72px; height:56px; object-fit:cover; border-radius:6px; cursor:pointer;" onclick="showImageModal('uploads/events/<?php echo htmlspecialchars($imgFile); ?>','<?php echo htmlspecialchars($ev['name']); ?>')">
                        <?php else: ?>
                            <div style="width:72px; height:56px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#6b7280;">Chưa có ảnh</div>
                        <?php endif; ?>
                        <div>
                            <div class="card-title"><?php echo htmlspecialchars($ev['name']); ?></div>
                            <span class="badge badge-info"><?php echo htmlspecialchars($ev['club_name']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <p><strong>📅 Ngày:</strong> <?php echo htmlspecialchars($ev['date']); ?></p>
                    <p><strong>📍 Địa điểm:</strong> <?php echo htmlspecialchars($ev['location']); ?></p>
                    <p><strong>👥 Số chỗ còn lại:</strong> <span class="seats-available"><?php echo max(0, (int)$ev['seats_left']); ?></span>/<?php echo (int)$ev['max_participants']; ?></p>
                    <?php if ((int)$ev['is_registered'] > 0): ?>
                        <button class="btn btn-secondary" disabled>Đã Đăng Ký</button>
                    <?php elseif ((int)$ev['seats_left'] <= 0): ?>
                        <button class="btn btn-secondary" disabled>Đã Đủ Chỗ</button>
                    <?php else: ?>
                        <button class="btn btn-primary" onclick="registerForEvent(<?php echo (int)$ev['id']; ?>)">Đăng Ký Ngay</button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($upcoming)): ?>
            <div class="no-content">Chưa có sự kiện nào.</div>
            <?php endif; ?>
        </div>

        <h2 class="section-title">Câu Lạc Bộ Nổi Bật</h2>
        <div class="card-grid">
            <?php foreach ($featuredClubs as $fc): ?>
            <?php
                // Translate category labels for featured clubs
                $catMap = [
                    'Technology' => 'Công nghệ',
                    'Arts' => 'Nghệ thuật',
                    'Music' => 'Âm nhạc',
                    'Science' => 'Khoa học',
                    'Sports' => 'Thể thao',
                    'Business' => 'Kinh doanh',
                    'Engineering' => 'Kỹ thuật',
                    'Design' => 'Thiết kế',
                    'Humanities' => 'Nhân văn'
                ];
                $rawCategory = $fc['category'] ?? '';
                $displayCategory = $rawCategory ? ($catMap[$rawCategory] ?? ucfirst($rawCategory)) : '';
                $category = htmlspecialchars($displayCategory);
                $schedule = htmlspecialchars($fc['schedule_meeting'] ?: '');
                $desc = trim($fc['description']);
                $desc = $desc ? htmlspecialchars(mb_strimwidth($desc, 0, 160, '...')) : '';
            ?>
            <div class="card" data-category="<?php echo strtolower($category); ?>">
                <div class="card-header">
                    <div class="card-title"><?php echo htmlspecialchars($fc['name']); ?></div>
                    <div style="display:flex; gap:.5rem; align-items:center;">
                        <?php if ($category): ?>
                        <span class="badge badge-warning"><?php echo ucfirst($category); ?></span>
                        <?php endif; ?>
                        <span class="badge badge-info"><?php echo (int)$fc['member_count']; ?> Thành viên</span>
                    </div>
                </div>
                <div class="card-content">
                    <p><strong>Trưởng CLB:</strong> <?php echo htmlspecialchars($fc['leader_name'] ?: 'N/A'); ?></p>
                    <?php if ($schedule): ?>
                    <p><strong>Lịch họp:</strong> <?php echo $schedule; ?></p>
                    <?php endif; ?>
                    <?php if ($desc): ?>
                    <p><?php echo $desc; ?></p>
                    <?php endif; ?>
                    <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
                        <button class="btn btn-success" onclick="joinClub(<?php echo (int)$fc['id']; ?>)">Tham Gia CLB</button>
                        <a class="btn btn-secondary" href="?section=clubDetails&club_id=<?php echo (int)$fc['id']; ?>">Xem Chi Tiết</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($featuredClubs)): ?>
            <div class="no-content">Chưa có câu lạc bộ nào.</div>
            <?php endif; ?>
        </div>
        
        <div class="cta-section">
            <div class="cta-content">
                <h2>Bạn Muốn Tạo Câu Lạc Bộ Mới?</h2>
                <p>Hãy chia sẻ đam mê và tập hợp những người bạn cùng chí hướng</p>
                <a href="?section=dashboard" class="btn btn-primary">Bắt Đầu Ngay</a>
            </div>
        </div>
    </div>
</div>