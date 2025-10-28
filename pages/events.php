<?php
// Fetch events with club names and available seats (max_participants - registrations)
if (isset($pdo) && $pdo instanceof PDO) {
    try {
        $userId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : 0;
        $stmt = $pdo->prepare("SELECT e.id, e.name, e.date, e.location, e.max_participants, e.club_id, e.event_image,
                                    c.name AS club_name,
                                    (e.max_participants - (SELECT COUNT(*) FROM event_registrations er WHERE er.event_id = e.id)) AS seats_left,
                                    (SELECT COUNT(*) FROM event_registrations er WHERE er.event_id = e.id AND er.user_id = ?) AS is_registered
                             FROM events e
                             LEFT JOIN clubs c ON c.id = e.club_id
                             ORDER BY e.date ASC");
        $stmt->execute([$userId]);
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $events = [];
    }

    // Fetch clubs for filter dropdown
    try {
        $clubStmt = $pdo->query("SELECT id, name FROM clubs ORDER BY name ASC");
        $clubsForFilter = $clubStmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $clubsForFilter = [];
    }
} else {
    // Frontend-only / mock mode
    include_once __DIR__ . '/../config/mock_data.php';
    // Map mock upcoming events to the expected shape
    $events = [];
    foreach ($upcoming as $ev) {
        $events[] = [
            'id' => $ev['id'] ?? 0,
            'name' => $ev['name'] ?? '',
            'date' => $ev['date'] ?? '',
            'location' => $ev['location'] ?? '',
            'max_participants' => $ev['max_participants'] ?? 0,
            'club_id' => $ev['club_id'] ?? 0,
            'event_image' => $ev['event_image'] ?? '',
            'club_name' => $ev['club_name'] ?? '',
            'seats_left' => $ev['seats_left'] ?? ($ev['max_participants'] ?? 0),
            'is_registered' => $ev['is_registered'] ?? 0
        ];
    }

    // Build clubsForFilter from featuredClubs mock
    $clubsForFilter = [];
    if (!empty($featuredClubs) && is_array($featuredClubs)) {
        foreach ($featuredClubs as $c) {
            $clubsForFilter[] = [
                'id' => $c['id'] ?? 0,
                'name' => $c['name'] ?? ''
            ];
        }
    }
}
?>
<!-- Events Section -->
<div id="events" class="section<?php echo ($activeSection === 'events') ? ' active' : ''; ?>">
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 2rem; color: #1f2937;">Sự kiện sắp tới</h1>
        
        <div class="filters">
            <div class="filter-group">
                <label>Tìm sự kiện</label>
                <input type="text" id="eventSearch" placeholder="Tìm theo tên..." onkeyup="filterEvents()">
            </div>
            <div class="filter-group">
                <label>CLB</label>
                <select id="eventClub" onchange="filterEvents()">
                    <option value="">Tất cả CLB</option>
                    <?php foreach ($clubsForFilter as $c): ?>
                    <option value="<?php echo (int)$c['id']; ?>"><?php echo htmlspecialchars($c['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="filter-group">
                <label>Từ ngày</label>
                <input type="date" id="eventDateFrom" onchange="filterEvents()">
            </div>
            <div class="filter-group">
                <label>Đến ngày</label>
                <input type="date" id="eventDateTo" onchange="filterEvents()">
            </div>
        </div>

        <div class="card-grid" id="eventsList">
            <?php foreach ($events as $event): ?>
            <div class="card" data-club-id="<?php echo (int)$event['club_id']; ?>" data-date="<?php echo htmlspecialchars($event['date']); ?>">
                <div class="card-header">
                    <div style="display:flex; gap:1rem; align-items:center;">
                        <?php if (!empty($event['event_image'])): ?>
                            <?php $imgFile = basename($event['event_image']); ?>
                            <img src="uploads/events/<?php echo htmlspecialchars($imgFile); ?>" alt="<?php echo htmlspecialchars($event['name']); ?>" style="width:72px; height:56px; object-fit:cover; border-radius:6px; cursor:pointer;" onclick="showImageModal('uploads/events/<?php echo htmlspecialchars($imgFile); ?>','<?php echo htmlspecialchars($event['name']); ?>')">
                        <?php else: ?>
                            <div style="width:72px; height:56px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; border-radius:6px; color:#6b7280;">Chưa có ảnh</div>
                        <?php endif; ?>
                        <div>
                            <div class="card-title"><?php echo htmlspecialchars($event['name']); ?></div>
                            <span class="badge badge-info"><?php echo htmlspecialchars($event['club_name']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <p><strong>📅 Ngày:</strong> <?php echo htmlspecialchars($event['date']); ?></p>
                    <p><strong>📍 Địa điểm:</strong> <?php echo htmlspecialchars($event['location']); ?></p>
                    <p><strong>👥 Số chỗ còn lại:</strong> <span class="seats-available"><?php echo max(0, (int)$event['seats_left']); ?></span>/<?php echo (int)$event['max_participants']; ?></p>
                    <?php if ((int)$event['is_registered'] > 0): ?>
                        <button class="btn btn-secondary" disabled>Đã đăng ký</button>
                    <?php elseif ((int)$event['seats_left'] <= 0): ?>
                        <button class="btn btn-secondary" disabled>Đã đủ chỗ</button>
                    <?php else: ?>
                        <button class="btn btn-primary" onclick="registerForEvent(<?php echo (int)$event['id']; ?>)">Đăng ký ngay</button>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if (empty($events)): ?>
            <div>Chưa có sự kiện nào.</div>
            <?php endif; ?>
        </div>
    </div>
    <script>
        // Adjust filterEvents to work with club-id values
        function filterEvents() {
            const searchTerm = document.getElementById('eventSearch').value.toLowerCase();
            const clubId = document.getElementById('eventClub').value;
            const dateFrom = document.getElementById('eventDateFrom').value;
            const dateTo = document.getElementById('eventDateTo').value;
            const events = document.querySelectorAll('#eventsList .card');
            events.forEach(event => {
                const title = event.querySelector('.card-title').textContent.toLowerCase();
                const eventClubId = event.getAttribute('data-club-id');
                const eventDate = event.getAttribute('data-date');
                const matchesSearch = title.includes(searchTerm);
                const matchesClub = !clubId || eventClubId === clubId;
                const matchesDateFrom = !dateFrom || eventDate >= dateFrom;
                const matchesDateTo = !dateTo || eventDate <= dateTo;
                event.style.display = (matchesSearch && matchesClub && matchesDateFrom && matchesDateTo) ? 'block' : 'none';
            });
        }
    </script>
</div>