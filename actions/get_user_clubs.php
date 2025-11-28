<?php
require_once '../config/database.php';
require_once '../auth/check_session.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    $stmt = $pdo->prepare("
        SELECT c.*, cm.joined_date, cm.status as member_status
        FROM clubs c
        JOIN club_members cm ON c.id = cm.club_id
        WHERE cm.user_id = ? AND cm.status = 'approved'
        ORDER BY cm.joined_date DESC
    ");
    $stmt->execute([$user_id]);
    $clubs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['success' => true, 'clubs' => $clubs]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
