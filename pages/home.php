<?php
// Include mock data file that contains $upcoming and $featuredClubs arrays
include_once __DIR__ . '/../config/mock_data.php';
?>
<!-- Phần Trang Chủ -->
<div id="home" class="section<?php echo ($activeSection === 'home') ? ' active' : ''; ?>">
    <!-- Phần Hero với màu chủ đạo mới -->
    <div class="hero" style="background: linear-gradient(135deg, #008689 0%, #005a5c 100%); color: white; padding: 100px 0; text-align: center;">
        <div class="container">
            <h1 style="font-size: 3.5rem; font-weight: 700; margin-bottom: 1.5rem; text-shadow: 0 2px 10px rgba(0,0,0,0.1);">Chào Mừng Đến Với Câu Lạc Bộ Của Đại Học Giao Thông Vận Tải </h1>
            <p style="font-size: 1.4rem; margin-bottom: 2.5rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto;">Khám phá câu lạc bộ, tham gia sự kiện và kết nối với cộng đồng sinh viên</p>
            <div class="hero-buttons" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="#" class="btn btn-primary" onclick="showSection('clubs'); return false;" style="background: #fff; color: #008689; padding: 12px 30px; border-radius: 50px; font-weight: 600; text-decoration: none; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">Khám Phá CLB</a>
                <a href="#" class="btn btn-secondary" onclick="showSection('events'); return false;" style="background: transparent; border: 2px solid #fff; color: #fff; padding: 12px 30px; border-radius: 50px; font-weight: 600; text-decoration: none; transition: all 0.3s;">Xem Sự Kiện</a>
            </div>
        </div>
    </div>
    
    <!-- Phần Tính Năng với màu chủ đạo mới -->
    <div class="features-section" style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; font-weight: 700; color: #008689;">Tại Sao Tham Gia UTH Clubs?</h2>
            <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <div class="feature-card" style="background: white; padding: 2.5rem; border-radius: 15px; text-align: center; box-shadow: 0 5px 25px rgba(0,0,0,0.05); transition: transform 0.3s; border-top: 4px solid #008689;">
                    <div class="feature-icon" style="font-size: 3rem; margin-bottom: 1.5rem;">🎯</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; font-weight: 600; color: #008689;">Phát Triển Bản Thân</h3>
                    <p style="color: #6c757d; line-height: 1.6;">Tham gia các CLB để phát triển kỹ năng và đam mê của bạn trong môi trường chuyên nghiệp</p>
                </div>
                <div class="feature-card" style="background: white; padding: 2.5rem; border-radius: 15px; text-align: center; box-shadow: 0 5px 25px rgba(0,0,0,0.05); transition: transform 0.3s; border-top: 4px solid #008689;">
                    <div class="feature-icon" style="font-size: 3rem; margin-bottom: 1.5rem;">🤝</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; font-weight: 600; color: #008689;">Kết Nối Cộng Đồng</h3>
                    <p style="color: #6c757d; line-height: 1.6;">Gặp gỡ những người bạn mới và mở rộng mạng lưới quan hệ của bạn trong và ngoài trường</p>
                </div>
                <div class="feature-card" style="background: white; padding: 2.5rem; border-radius: 15px; text-align: center; box-shadow: 0 5px 25px rgba(0,0,0,0.05); transition: transform 0.3s; border-top: 4px solid #008689;">
                    <div class="feature-icon" style="font-size: 3rem; margin-bottom: 1.5rem;">🎉</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem; font-weight: 600; color: #008689;">Sự Kiện Đặc Sắc</h3>
                    <p style="color: #6c757d; line-height: 1.6;">Tham gia các sự kiện thú vị, ý nghĩa được tổ chức bởi các câu lạc bộ hàng đầu</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Phần Câu Lạc Bộ Nổi Bật với Layout Xen Kẽ -->
    <div class="clubs-section" style="padding: 80px 0; background: white;">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; font-weight: 700; color: #008689;">Câu Lạc Bộ Nổi Bật</h2>
            
            <?php foreach ($featuredClubs as $index => $fc): ?>
            <?php
                // Dịch nhãn danh mục
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
                $fullDesc = $desc ? htmlspecialchars($desc) : 'Câu lạc bộ đang phát triển nội dung mô tả...';
                $shortDesc = $desc ? htmlspecialchars(mb_strimwidth($desc, 0, 160, '...')) : '';
                
                // Xác định layout xen kẽ
                $isEven = $index % 2 === 0;
                $imageSide = $isEven ? 'left' : 'right';
            ?>
            
            <div class="club-item" style="margin-bottom: 80px;">
                <div class="two-column-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; <?php echo !$isEven ? 'direction: rtl;' : ''; ?>">
                    <!-- Cột hình ảnh -->
                    <div class="image-column" style="<?php echo !$isEven ? 'margin-left: 2rem;' : 'margin-right: 2rem;' ?>">
                        <div class="main-image" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                            <?php if (!empty($fc['club_image'])): ?>
                                <?php $imgFile = basename($fc['club_image']); ?>
                                <img src="uploads/clubs/<?php echo htmlspecialchars($imgFile); ?>" alt="<?php echo htmlspecialchars($fc['name']); ?>" style="width: 100%; height: 300px; object-fit: cover; transition: transform 0.5s;">
                            <?php else: ?>
                                <div style="width: 100%; height: 300px; background: linear-gradient(135deg, #008689 0%, #005a5c 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem; font-weight: 600;">
                                    <?php echo htmlspecialchars($fc['name']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Cột nội dung -->
                    <div class="content-column" style="<?php echo !$isEven ? 'text-align: left;' : ''; ?>">
                        <div class="club-category" style="background: #e6f3f3; color: #008689; padding: 0.5rem 1rem; border-radius: 50px; display: inline-block; font-weight: 600; margin-bottom: 1rem;">
                            <?php echo $category ?: 'Đa dạng'; ?>
                        </div>
                        <h3 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: #008689;"><?php echo htmlspecialchars($fc['name']); ?></h3>
                        <p style="font-size: 1.1rem; line-height: 1.7; color: #555; margin-bottom: 1.5rem;">
                            <?php echo $fullDesc; ?>
                        </p>
                        
                        <div class="club-details" style="display: grid; gap: 1rem; margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="width: 40px; height: 40px; background: #e6f3f3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #008689; font-weight: bold;">👤</div>
                                <div>
                                    <div style="font-weight: 600; color: #333;">Trưởng CLB</div>
                                    <div style="color: #666;"><?php echo htmlspecialchars($fc['leader_name'] ?: 'Đang cập nhật'); ?></div>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="width: 40px; height: 40px; background: #e6f3f3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #008689; font-weight: bold;">👥</div>
                                <div>
                                    <div style="font-weight: 600; color: #333;">Thành viên</div>
                                    <div style="color: #666;"><?php echo (int)$fc['member_count']; ?> thành viên</div>
                                </div>
                            </div>
                            
                            <?php if ($schedule): ?>
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="width: 40px; height: 40px; background: #e6f3f3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #008689; font-weight: bold;">📅</div>
                                <div>
                                    <div style="font-weight: 600; color: #333;">Lịch họp</div>
                                    <div style="color: #666;"><?php echo $schedule; ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <button class="btn btn-join" onclick="joinClub(<?php echo (int)$fc['id']; ?>)" style="background: #008689; color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: inline-flex; align-items: center; gap: 0.5rem;">
                                <span>Tham Gia Ngay</span>
                            </button>
                            <a class="btn btn-details" href="?section=clubDetails&club_id=<?php echo (int)$fc['id']; ?>" style="background: transparent; color: #008689; border: 2px solid #008689; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 600; text-decoration: none; transition: all 0.3s; display: inline-flex; align-items: center; gap: 0.5rem;">
                                <span>Xem Chi Tiết</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Phần Sự Kiện Sắp Diễn Ra với Layout Xen Kẽ -->
    <div class="events-section" style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; font-weight: 700; color: #008689;">Sự Kiện Sắp Diễn Ra</h2>
            
            <?php foreach ($upcoming as $index => $ev): ?>
            <?php
                // Xác định layout xen kẽ
                $isEven = $index % 2 === 0;
                $imageSide = $isEven ? 'left' : 'right';
                
                // Xác định trạng thái đăng ký
                $isRegistered = (int)$ev['is_registered'] > 0;
                $isFull = (int)$ev['seats_left'] <= 0;
            ?>
            
            <div class="event-item" style="margin-bottom: 80px;">
                <div class="two-column-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; <?php echo !$isEven ? 'direction: rtl;' : ''; ?>">
                    <!-- Cột hình ảnh -->
                    <div class="image-column" style="<?php echo !$isEven ? 'margin-left: 2rem;' : 'margin-right: 2rem;' ?>">
                        <div class="main-image" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative;">
                            <?php if (!empty($ev['event_image'])): ?>
                                <?php $imgFile = basename($ev['event_image']); ?>
                                <img src="uploads/events/<?php echo htmlspecialchars($imgFile); ?>" alt="<?php echo htmlspecialchars($ev['name']); ?>" style="width: 100%; height: 300px; object-fit: cover; transition: transform 0.5s;">
                            <?php else: ?>
                                <div style="width: 100%; height: 300px; background: linear-gradient(135deg, #008689 0%, #005a5c 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.2rem; font-weight: 600; text-align: center; padding: 1rem;">
                                    <?php echo htmlspecialchars($ev['name']); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Badge trạng thái sự kiện -->
                            <div style="position: absolute; top: 1rem; right: 1rem; background: rgba(0, 134, 137, 0.9); color: white; padding: 0.5rem 1rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">
                                <?php echo htmlspecialchars($ev['club_name']); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Cột nội dung -->
                    <div class="content-column" style="<?php echo !$isEven ? 'text-align: left;' : ''; ?>">
                        <div class="event-date" style="background: #e6f3f3; color: #008689; padding: 0.5rem 1rem; border-radius: 50px; display: inline-block; font-weight: 600; margin-bottom: 1rem;">
                            📅 <?php echo htmlspecialchars($ev['date']); ?>
                        </div>
                        <h3 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: #008689;"><?php echo htmlspecialchars($ev['name']); ?></h3>
                        
                        <div class="event-details" style="display: grid; gap: 1rem; margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="width: 40px; height: 40px; background: #e6f3f3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #008689; font-weight: bold;">📍</div>
                                <div>
                                    <div style="font-weight: 600; color: #333;">Địa điểm</div>
                                    <div style="color: #666;"><?php echo htmlspecialchars($ev['location']); ?></div>
                                </div>
                            </div>
                            
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="width: 40px; height: 40px; background: #e6f3f3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #008689; font-weight: bold;">👥</div>
                                <div>
                                    <div style="font-weight: 600; color: #333;">Số chỗ còn lại</div>
                                    <div style="color: #666;">
                                        <span class="seats-available" style="font-weight: 700; color: #008689;"><?php echo max(0, (int)$ev['seats_left']); ?></span>
                                        /<?php echo (int)$ev['max_participants']; ?> chỗ
                                    </div>
                                </div>
                            </div>
                            
                            <?php if (!empty($ev['description'])): ?>
                            <div style="margin-top: 1rem;">
                                <div style="font-weight: 600; color: #333; margin-bottom: 0.5rem;">Mô tả sự kiện:</div>
                                <div style="color: #666; line-height: 1.6;"><?php echo htmlspecialchars($ev['description']); ?></div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                            <?php if ($isRegistered): ?>
                                <button class="btn btn-registered" disabled style="background: #28a745; color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: not-allowed; display: inline-flex; align-items: center; gap: 0.5rem;">
                                    <span>✓ Đã Đăng Ký</span>
                                </button>
                            <?php elseif ($isFull): ?>
                                <button class="btn btn-full" disabled style="background: #6c757d; color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: not-allowed; display: inline-flex; align-items: center; gap: 0.5rem;">
                                    <span>Đã Đủ Chỗ</span>
                                </button>
                            <?php else: ?>
                                <button class="btn btn-register" onclick="registerForEvent(<?php echo (int)$ev['id']; ?>)" style="background: #008689; color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: inline-flex; align-items: center; gap: 0.5rem;">
                                    <span>Đăng Ký Ngay</span>
                                </button>
                            <?php endif; ?>
                            
                            <button class="btn btn-details" onclick="showEventDetails(<?php echo (int)$ev['id']; ?>)" style="background: transparent; color: #008689; border: 2px solid #008689; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 600; cursor: pointer; transition: all 0.3s; display: inline-flex; align-items: center; gap: 0.5rem;">
                                <span>Chi Tiết</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            
            <?php if (empty($upcoming)): ?>
            <div class="no-events" style="text-align: center; padding: 3rem; color: #6c757d;">
                <div style="font-size: 5rem; margin-bottom: 1rem;">📅</div>
                <h3 style="font-size: 1.5rem; margin-bottom: 1rem; color: #008689;">Chưa có sự kiện sắp diễn ra</h3>
                <p>Hãy quay lại sau để xem các sự kiện mới nhất từ các câu lạc bộ!</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Phần Kêu Gọi Hành Động -->
    <div class="cta-section" style="background: linear-gradient(135deg, #008689 0%, #005a5c 100%); color: white; padding: 80px 0; text-align: center; border-radius: 15px; margin: 80px 0;">
        <div class="cta-content">
            <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem; font-weight: 700;">Bạn Muốn Tạo Câu Lạc Bộ Mới?</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.9;">Hãy chia sẻ đam mê và tập hợp những người bạn cùng chí hướng</p>
            <a href="?section=dashboard" class="btn btn-primary" style="background: white; color: #008689; padding: 12px 30px; border-radius: 50px; font-weight: 600; text-decoration: none; transition: all 0.3s; display: inline-block;">Bắt Đầu Ngay</a>
        </div>
    </div>
</div>

<style>
/* Thêm hiệu ứng hover cho các thẻ */
.card:hover {
    transform: translateY(-5px);
}

.feature-card:hover {
    transform: translateY(-5px);
}

/* Hiệu ứng hover cho hình ảnh */
.image-column img:hover {
    transform: scale(1.05);
}

/* Hiệu ứng cho nút */
.btn-join:hover, .btn-register:hover {
    background: #005a5c !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0, 134, 137, 0.3);
}

.btn-details:hover {
    background: #008689 !important;
    color: white !important;
    transform: translateY(-2px);
}

/* Điều chỉnh responsive */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem !important;
    }
    
    .hero p {
        font-size: 1.1rem !important;
    }
    
    .hero-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    /* Responsive cho layout 2 cột */
    .two-column-layout {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
        direction: ltr !important;
    }
    
    .image-column {
        margin: 0 !important;
    }
    
    .content-column {
        text-align: center !important;
    }
    
    .club-details, .event-details {
        text-align: left;
    }
    
    h2, h3 {
        font-size: 1.8rem !important;
    }
}

/* Transition cho hình ảnh */
.image-column img {
    transition: transform 0.5s ease;
}

/* Hiệu ứng fade-in cho các phần tử */
.club-item, .event-item {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.8s ease, transform 0.8s ease;
}

.club-item.visible, .event-item.visible {
    opacity: 1;
    transform: translateY(0);
}
</style>

<script>
// Thêm hiệu ứng khi cuộn trang
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });
    
    // Quan sát các item câu lạc bộ và sự kiện
    const clubItems = document.querySelectorAll('.club-item');
    const eventItems = document.querySelectorAll('.event-item');
    
    clubItems.forEach(item => observer.observe(item));
    eventItems.forEach(item => observer.observe(item));
});

// Hàm hiển thị chi tiết sự kiện
function showEventDetails(eventId) {
    // Chuyển hướng đến trang chi tiết sự kiện
    window.location.href = `?section=eventDetails&event_id=${eventId}`;
}
</script>