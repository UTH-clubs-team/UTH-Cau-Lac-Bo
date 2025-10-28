<?php
// If PDO is available use the database, otherwise fall back to mock data for frontend-only mode
if (isset($pdo) && $pdo instanceof PDO) {
    try {
        $stmt = $pdo->query("SELECT c.id, c.name, c.description, c.category, c.schedule_meeting, c.activities, c.club_image, c.leader_id,
                                    u.name AS leader_name,
                                    (SELECT COUNT(*) FROM club_members cm WHERE cm.club_id = c.id) AS member_count
                             FROM clubs c
                             LEFT JOIN users u ON u.id = c.leader_id
                             ORDER BY c.created_at DESC");
        $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $clubs = [];
    }
} else {
    // Frontend mock mode: provide sample clubs so the page can render without DB
    include_once __DIR__ . '/../config/mock_data.php';
    // map featuredClubs to the same shape expected by the template
    $clubs = $featuredClubs ?? [];
}
?>
<!-- Clubs Section -->
<div id="clubs" class="section<?php echo ($activeSection === 'clubs') ? ' active' : ''; ?>">
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 2rem; color: #1f2937;">Câu Lạc Bộ Sinh Viên</h1>
        
        <div class="filters">
            <div class="filter-group">
                <label>Tìm kiếm CLB</label>
                <input type="text" id="clubSearch" placeholder="Tìm theo tên..." onkeyup="filterClubs()">
            </div>
            <div class="filter-group">
                <label>Danh mục</label>
                <input type="text" id="clubCategory" placeholder="Nhập danh mục..." onkeyup="filterClubs()">
            </div>
        </div>

        <div class="card-grid" id="clubsList">
            <?php foreach ($clubs as $club): ?>
            <?php
                // Translate category labels if necessary for display
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
                $rawCategory = $club['category'] ?? '';
                $displayCategory = $catMap[$rawCategory] ?? ($rawCategory ? ucfirst($rawCategory) : '');
                $category = htmlspecialchars($displayCategory);
                $leaderName = htmlspecialchars($club['leader_name'] ?: 'N/A');
                $memberCount = (int)($club['member_count'] ?: 0);
                $schedule = htmlspecialchars($club['schedule_meeting'] ?: '');
            ?>
            <div class="card" data-category="<?php echo strtolower($category); ?>">
                <div class="card-header">
                    <div class="card-title"><?php echo htmlspecialchars($club['name']); ?></div>
                    <span class="badge badge-info"><?php echo $memberCount; ?> Thành viên</span>
                </div>
                <div class="card-content">
                    <p><strong>Trưởng CLB:</strong> <?php echo $leaderName; ?></p>
                    <p><strong>Danh mục:</strong> <?php echo ucfirst($category); ?></p>
                    <p><?php echo htmlspecialchars($club['description']); ?></p>
                    <?php if ($schedule): ?>
                    <p><strong>Lịch họp:</strong> <?php echo $schedule; ?></p>
                    <?php endif; ?>
                    <button class="btn btn-success" onclick="joinClub(<?php echo (int)$club['id']; ?>)">Tham Gia CLB</button>
                    <a class="btn btn-secondary" href="?section=clubDetails&club_id=<?php echo (int)$club['id']; ?>">Xem Chi Tiết</a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($clubs)): ?>
            <div>Chưa có câu lạc bộ nào.</div>
            <?php endif; ?>
        </div>
    </div>
</div>