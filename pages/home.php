
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

    <!-- Phần Giới Thiệu Câu Lạc Bộ -->
    <div class="clubs-section" style="padding: 80px 0; background: white;">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; font-weight: 700; color: #008689;">Hoạt Động Nổi Bật</h2>
            
            <!-- CLB Công Nghệ -->
            <div class="club-item" style="margin-bottom: 80px;">
                <div class="two-column-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                    <!-- Cột hình ảnh -->
                    <div class="image-column" style="margin-right: 2rem;">
                        <div class="main-image" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="CLB Công Nghệ" style="width: 100%; height: 350px; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                    </div>
                    
                    <!-- Cột nội dung -->
                    <div class="content-column">
                        <div class="club-category" style="background: #e6f3f3; color: #008689; padding: 0.5rem 1rem; border-radius: 50px; display: inline-block; font-weight: 600; margin-bottom: 1rem;">
                            Công Nghệ & Sáng Tạo
                        </div>
                        <h3 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: #008689;">Sân Chơi Công Nghệ</h3>
                        <p style="color: #6c757d; line-height: 1.7; margin-bottom: 1.5rem; font-size: 1.1rem;">
                            Không gian lý tưởng cho những tâm hồn đam mê công nghệ. Tại đây, chúng tôi cùng nhau khám phá, sáng tạo và phát triển các ý tưởng đột phá trong lĩnh vực công nghệ thông tin và truyền thông.
                        </p>
                        
                        <div class="highlight-features" style="background: #f8f9fa; padding: 1.5rem; border-radius: 10px; margin-top: 2rem;">
                            <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                                <span style="color: #008689; margin-right: 0.75rem;">✓</span>
                                <span>Workshop lập trình hàng tháng</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                                <span style="color: #008689; margin-right: 0.75rem;">✓</span>
                                <span>Cuộc thi hackathon thường niên</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <span style="color: #008689; margin-right: 0.75rem;">✓</span>
                                <span>Kết nối với doanh nghiệp công nghệ hàng đầu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- CLB Thể Thao -->
            <div class="club-item" style="margin-bottom: 80px;">
                <div class="two-column-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                    <!-- Cột hình ảnh -->
                    <div class="image-column" style="margin-right: 2rem;">
                        <div class="main-image" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                            <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="CLB Thể Thao" style="width: 100%; height: 350px; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                    </div>
                    
                    <!-- Cột nội dung -->
                    <div class="content-column">
                        <div class="club-category" style="background: #e6f3f3; color: #008689; padding: 0.5rem 1rem; border-radius: 50px; display: inline-block; font-weight: 600; margin-bottom: 1rem;">
                            Thể Thao & Sức Khỏe
                        </div>
                        <h3 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: #008689;">Năng Động Xanh</h3>
                        <p style="color: #6c757d; line-height: 1.7; margin-bottom: 1.5rem; font-size: 1.1rem;">
                            Phát triển lối sống lành mạnh thông qua các hoạt động thể thao đa dạng. Chúng tôi tin rằng một cơ thể khỏe mạnh là nền tảng cho một tinh thần mạnh mẽ và sáng tạo.
                        </p>
                        
                        <div class="highlight-features" style="background: #f8f9fa; padding: 1.5rem; border-radius: 10px; margin-top: 2rem;">
                            <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                                <span style="color: #008689; margin-right: 0.75rem;">✓</span>
                                <span>Đa dạng bộ môn: Bóng đá, bóng rổ, cầu lông, bơi lội</span>
                            </div>
                            <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                                <span style="color: #008689; margin-right: 0.75rem;">✓</span>
                                <span>Lớp yoga và thể dục nhịp điệu miễn phí</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <span style="color: #008689; margin-right: 0.75rem;">✓</span>
                                <span>Giải đấu giao hữu giữa các khoa hàng tháng</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phần Sự Kiện Sắp Diễn Ra với Layout Xen Kẽ -->
    <div class="events-section" style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 3rem; font-weight: 700; color: #008689;">Sự Kiện Nổi Bật</h2>
            
            <!-- Sự kiện 1 -->
            <div class="event-item" style="margin-bottom: 80px;">
                <div class="two-column-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                    <!-- Cột hình ảnh -->
                    <div class="image-column" style="margin-right: 2rem;">
                        <div class="main-image" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative;">
                            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Hackathon Sinh Viên" style="width: 100%; height: 350px; object-fit: cover; transition: transform 0.5s ease;">
                            <div style="position: absolute; top: 1rem; right: 1rem; background: rgba(0, 134, 137, 0.9); color: white; padding: 0.5rem 1rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">
                                CLB Công Nghệ
                            </div>
                        </div>
                    </div>

                    <!-- Cột nội dung -->
                    <div class="content-column">
                        <div style="background: #e6f3f3; color: #008689; padding: 0.5rem 1rem; border-radius: 50px; display: inline-block; font-weight: 600; margin-bottom: 1rem;">
                            📅 15/12/2023 - 17/12/2023
                        </div>
                        <h3 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: #008689;">Hackathon Sáng Tạo Công Nghệ 2023</h3>
                        
                        <div style="display: grid; gap: 1rem; margin-bottom: 2rem;">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="width: 40px; height: 40px; background: #e6f3f3; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #008689; font-weight: bold;">📍</div>
                                <div>
                                    <div style="font-weight: 600; color: #333;">Địa điểm</div>
                                    <div style="color: #666;">Hội trường A1, Trường ĐH Giao Thông Vận Tải</div>
                                </div>
                            </div>
                            
                            <div style="margin-top: 1rem;">
                                <div style="font-weight: 600; color: #333; margin-bottom: 0.5rem;">Mô tả sự kiện:</div>
                                <div style="color: #666; line-height: 1.6;">
                                    Cuộc thi lập trình Hackathon thường niên dành cho sinh viên toàn trường. Tham gia để có cơ hội:
                                    <ul style="margin-top: 0.5rem; padding-left: 1.2rem;">
                                        <li>Thi đấu và học hỏi từ các chuyên gia công nghệ</li>
                                        <li>Nhận hỗ trợ từ các mentor giàu kinh nghiệm</li>
                                        <li>Cơ hội nhận học bổng và thực tập tại các công ty đối tác</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sự kiện 2 -->
            <div class="event-item" style="margin-bottom: 80px;">
                <div class="two-column-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; direction: rtl;">
                    <!-- Cột hình ảnh -->
                    <div class="image-column" style="margin-left: 2rem;">
                        <div class="main-image" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); position: relative;">
                            <img src="https://images.unsplash.com/photo-1501612780327-45045538702b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Đêm Nhạc Sinh Viên" style="width: 100%; height: 350px; object-fit: cover; transition: transform 0.5s ease;">
                            <div style="position: absolute; top: 1rem; right: 1rem; background: rgba(0, 134, 137, 0.9); color: white; padding: 0.5rem 1rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">
                                CLB Âm Nhạc
                            </div>
                        </div>
                    </div>

                    <!-- Cột nội dung -->
                    <div class="content-column" style="text-align: left;">
                        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                            <div>
                                <div style="background: linear-gradient(135deg, #008689, #00b4b8); color: white; padding: 0.6rem 1.2rem; border-radius: 50px; display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600; margin-bottom: 1rem; box-shadow: 0 4px 15px rgba(0, 134, 137, 0.2);">
                                    <span>📅</span>
                                    <span>22/12/2023 - 20:00</span>
                                </div>
                                <h3 style="font-size: 2.2rem; font-weight: 800; margin: 0.5rem 0 1.2rem; color: #008689; line-height: 1.2; letter-spacing: -0.5px;">Đêm Nhạc Mùa Đông 2023<br><span style="font-size: 1.8rem; color: #4a90e2;">Âm Vang Mùa Lễ Hội</span></h3>
                            </div>
                            
                            <div style="background: white; border-radius: 12px; padding: 1.5rem; box-shadow: 0 5px 25px rgba(0,0,0,0.05);">
                                <div style="display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1.5rem; padding-bottom: 1.5rem; border-bottom: 1px solid #f0f0f0;">
                                    <div style="background: #f0f9fa; width: 48px; height: 48px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #008689; font-size: 1.2rem;">📍</div>
                                    <div>
                                        <div style="font-weight: 700; color: #2c3e50; margin-bottom: 0.3rem; font-size: 1.1rem;">Địa điểm tổ chức</div>
                                        <div style="color: #5d6d7e; font-size: 1.05rem;">Sân vận động trường ĐH Giao Thông Vận Tải</div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div style="font-weight: 700; color: #2c3e50; margin-bottom: 1rem; font-size: 1.2rem; display: flex; align-items: center; gap: 0.5rem;">
                                        <span>✨</span>
                                        <span>Chương trình đặc sắc</span>
                                    </div>
                                    <div style="color: #4a5568; line-height: 1.7;">
                                        <p style="margin-bottom: 1rem;">Đêm nhạc hội đặc biệt chào đón Giáng Sinh và Năm Mới, nơi hội tụ những tài năng âm nhạc xuất sắc nhất của trường. Một không gian ấm áp với sắc màu rực rỡ và giai điệu ngọt ngào.</p>
                                        <ul style="margin: 0; padding-left: 1.5rem; display: grid; gap: 0.8rem;">
                                            <li style="position: relative; padding-left: 1.5rem;">
                                                <div style="position: absolute; left: 0; top: 0.4em; width: 8px; height: 8px; background: #008689; border-radius: 50%;"></div>
                                                <strong>Biểu diễn đặc biệt:</strong> Các ban nhạc sinh viên tài năng với những bản hit đình đám
                                            </li>
                                            <li style="position: relative; padding-left: 1.5rem;">
                                                <div style="position: absolute; left: 0; top: 0.4em; width: 8px; height: 8px; background: #008689; border-radius: 50%;"></div>
                                                <strong>Tiết mục đặc biệt:</strong> Cựu sinh viên nổi tiếng trở về biểu diễn
                                            </li>
                                            <li style="position: relative; padding-left: 1.5rem;">
                                                <div style="position: absolute; left: 0; top: 0.4em; width: 8px; height: 8px; background: #008689; border-radius: 50%;"></div>
                                                <strong>Khu ẩm thực:</strong> Đa dạng món ngon đường phố và đồ uống mùa đông hấp dẫn
                                            </li>
                                            <li style="position: relative; padding-left: 1.5rem;">
                                                <div style="position: absolute; left: 0; top: 0.4em; width: 8px; height: 8px; background: #008689; border-radius: 50%;"></div>
                                                <strong>Trò chơi tương tác:</strong> Nhiều phần quà hấp dẫn từ nhà tài trợ
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Phần Kêu Gọi Hành Động -->
    <div class="cta-section" style="background: linear-gradient(135deg, #008689 0%, #005a5c 100%); color: white; padding: 80px 0; text-align: center; border-radius: 15px; margin: 80px 0;">
        <div class="cta-content">
            <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem; font-weight: 700;">Bạn Muốn Tạo Câu Lạc Bộ Mới?</h2>
            <p style="font-size: 1.2rem; margin-bottom: 2.5rem; opacity: 0.9;">Hãy chia sẻ đam mê và tập hợp những người bạn cùng chí hướng</p>
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