<?php
// If club_id provided, fetch club details and related info
$clubDetails = null;
$clubMembers = [];
$clubEvents = [];
if (!empty($activeClubId)) {
    try {
        $cdStmt = $pdo->prepare("SELECT c.*, u.name AS leader_name, u.email AS leader_email,
                                        (SELECT COUNT(*) FROM club_members cm WHERE cm.club_id = c.id) AS member_count
                                 FROM clubs c
                                 LEFT JOIN users u ON u.id = c.leader_id
                                 WHERE c.id = ?");
        $cdStmt->execute([$activeClubId]);
        $clubDetails = $cdStmt->fetch(PDO::FETCH_ASSOC) ?: null;
    } catch (Exception $e) {}
    try {
        $memStmt = $pdo->prepare("SELECT u.name, u.email, cm.joined_date
                                   FROM club_members cm
                                   JOIN users u ON u.id = cm.user_id
                                   WHERE cm.club_id = ?");
        $memStmt->execute([$activeClubId]);
        $clubMembers = $memStmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {}
    try {
        $evStmt = $pdo->prepare("SELECT id, name, date, location FROM events WHERE club_id = ? ORDER BY date DESC LIMIT 5");
        $evStmt->execute([$activeClubId]);
        $clubEvents = $evStmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {}
}
?>
<!-- Club Details Section -->
<div id="clubDetails" class="section<?php echo ($activeSection === 'clubDetails') ? ' active' : ''; ?>">
    <div class="container">
        <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
            <a class="btn btn-secondary" href="?section=clubs">← Quay lại CLB</a>
            <h1 id="clubDetailsTitle" style="margin: 0; color: #1f2937;">Chi tiết CLB</h1>
        </div>

        <div id="clubDetailsContent">
            <div class="card" style="margin-bottom: 2rem;">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <div>
                            <div class="card-title" id="clubDetailName" style="font-size: 2rem; margin-bottom: 0.5rem;">
                                <?php echo $clubDetails ? htmlspecialchars($clubDetails['name']) : 'Select a club'; ?>
                            </div>
                            <div style="display: flex; gap: 1rem; align-items: center;">
                                <span class="badge badge-info" id="clubDetailCategory"><?php echo $clubDetails ? htmlspecialchars(ucfirst($clubDetails['category'])) : ''; ?></span>
                                <span class="badge badge-success" id="clubDetailMemberCount"><?php echo $clubDetails ? (int)$clubDetails['member_count'] . ' Members' : ''; ?></span>
                            </div>
                        </div>
                        <?php if ($clubDetails): ?>
                        <button class="btn btn-success" onclick="joinClubFromDetails()" id="joinClubBtn">Tham gia CLB</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-content">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-bottom: 1.5rem;">
                        <div style="display:flex; align-items:flex-start; gap:1rem;">
                            <?php if ($clubDetails && !empty($clubDetails['club_image'])): ?>
                                <?php
                                    // Ensure we don't output dangerous paths; use basename to strip directories
                                    $imgFile = basename($clubDetails['club_image']);
                                    $imgPath = 'uploads/clubs/' . $imgFile;
                                ?>
                                <div style="max-width:280px;">
                                    <img src="<?php echo htmlspecialchars($imgPath); ?>" alt="<?php echo htmlspecialchars($clubDetails['name'] ?? 'Club image'); ?>" style="width:100%; height:auto; border-radius:8px; object-fit:cover; border:1px solid #e5e7eb;">
                                </div>
                            <?php else: ?>
                                <div style="max-width:280px;">
                                    <div style="width:100%; padding:2rem; border-radius:8px; background:#f3f4f6; text-align:center; color:#6b7280; border:1px dashed #e5e7eb;">Không có ảnh sẵn</div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h4 style="color: #008689; margin-bottom: 0.5rem;">👤 Trưởng CLB</h4>
                            <p id="clubDetailLeader" style="margin: 0; font-weight: 500;">
                                <?php echo $clubDetails ? htmlspecialchars($clubDetails['leader_name'] ?: 'N/A') : ''; ?>
                            </p>
                        </div>
                        <div>
                            <h4 style="color: #008689; margin-bottom: 0.5rem;">📅 Lịch họp</h4>
                            <p id="clubDetailSchedule" style="margin: 0;">
                                <?php echo $clubDetails ? htmlspecialchars($clubDetails['schedule_meeting'] ?: '') : ''; ?>
                            </p>
                        </div>
                    </div>
                    
                    <div>
                        <h4 style="color: #008689; margin-bottom: 1rem;">📝 Giới thiệu về CLB</h4>
                        <p id="clubDetailDescription" style="line-height: 1.6; color: #374151;">
                            <?php echo $clubDetails ? nl2br(htmlspecialchars($clubDetails['description'])) : 'Hãy chọn CLB trong danh sách.'; ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Club Activities -->
            <div class="card" style="margin-bottom: 2rem;">
                <div class="card-header">
                    <div class="card-title">🎯 Hoạt động & Chương trình CLB</div>
                </div>
                <div class="card-content">
                    <div class="card-grid" id="clubActivities">
                        <?php if ($clubDetails && !empty($clubDetails['activities'])): ?>
                            <?php foreach (explode(',', $clubDetails['activities']) as $activity): ?>
                            <div style="padding: 1rem; border: 1px solid #e5e7eb; border-radius: 8px;">
                                <h5 style="color: #008689; margin-bottom: 0.5rem;"><?php echo htmlspecialchars(trim($activity)); ?></h5>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div>Không có hoạt động nào được liệt kê.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Recent Events -->
            <div class="card" style="margin-bottom: 2rem;">
                <div class="card-header">
                    <div class="card-title">📅 Sự kiện gần đây & sắp tới</div>
                </div>
                <div class="card-content">
                    <div id="clubEvents">
                        <?php foreach ($clubEvents as $cev): ?>
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem; border: 1px solid #e5e7eb; border-radius: 8px; margin-bottom: 1rem;">
                            <div>
                                <h5 style="margin: 0 0 0.5rem 0; color: #1f2937;"><?php echo htmlspecialchars($cev['name']); ?></h5>
                                <p style="margin: 0; color: #6b7280; font-size: 0.9rem;"><?php echo htmlspecialchars($cev['date']); ?> • <?php echo htmlspecialchars($cev['location']); ?></p>
                            </div>
                            <span class="badge badge-info">—</span>
                        </div>
                        <?php endforeach; ?>
                        <?php if (empty($clubEvents)): ?>
                        <div>Không có sự kiện gần đây.</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Members List -->
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                        <div class="card-title">👥 Thành viên CLB</div>
                        <div style="display: flex; gap: 1rem; align-items: center;">
                            <input type="text" placeholder="Tìm thành viên..." id="memberSearch" onkeyup="filterMembers()" style="padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 5px; font-size: 0.9rem;">
                            <span class="badge badge-info" id="memberCountBadge"><?php echo $clubDetails ? count($clubMembers) . ' Total' : '0 Total'; ?></span>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Ngày tham gia</th>
                                </tr>
                            </thead>
                            <tbody id="membersTableBody">
                                <?php foreach ($clubMembers as $m): ?>
                                <tr>
                                    <td><strong><?php echo htmlspecialchars($m['name']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($m['email']); ?></td>
                                    <td><?php echo htmlspecialchars($m['joined_date']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if (empty($clubMembers)): ?>
                                <tr><td colspan="3">Chưa có thành viên nào.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>