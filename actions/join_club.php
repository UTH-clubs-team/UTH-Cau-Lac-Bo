<?php
session_start();
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ']);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Chưa đăng nhập']);
    exit;
}

$userId = (int)$_SESSION['user_id'];
$clubId = isset($_POST['club_id']) ? (int)$_POST['club_id'] : 0;

if ($clubId <= 0) {
    echo json_encode(['success' => false, 'message' => 'Câu lạc bộ không hợp lệ']);
    exit;
}

try {
    // Ensure the status column exists (older DBs may not have it)
    try {
        $colCheck = $pdo->query("SHOW COLUMNS FROM club_members LIKE 'status'")->fetch();
        if (!$colCheck) {
            // If column missing, return an informative error for setup
            echo json_encode(['success' => false, 'message' => 'Cơ sở dữ liệu chưa cấu hình cho yêu cầu tham gia: thiếu cột status. Chạy update_club_members.sql']);
            exit;
        }
    } catch (Exception $e) {
        // If SHOW COLUMNS fails, fall back to generic message
    echo json_encode(['success' => false, 'message' => 'Lỗi cơ sở dữ liệu khi kiểm tra schema']);
        exit;
    }
    // Check if already a member or has pending/rejected request
    $check = $pdo->prepare('SELECT id, status FROM club_members WHERE club_id = ? AND user_id = ?');
    $check->execute([$clubId, $userId]);
    $existing = $check->fetch();
    
    if ($existing) {
        if ($existing['status'] === 'approved') {
            echo json_encode(['success' => false, 'message' => 'Đã là thành viên']);
            exit;
        } elseif ($existing['status'] === 'pending') {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu đang chờ xử lý']);
            exit;
        } elseif ($existing['status'] === 'rejected') {
            // Update rejected request to pending
            $update = $pdo->prepare('UPDATE club_members SET status = "pending", joined_date = CURDATE() WHERE id = ?');
            $update->execute([$existing['id']]);
            echo json_encode(['success' => true, 'message' => 'Yêu cầu tham gia đã gửi, chờ quản trị viên phê duyệt']);
            exit;
        }
    }

    // Create new join request
    $ins = $pdo->prepare('INSERT INTO club_members (club_id, user_id, joined_date, status) VALUES (?, ?, CURDATE(), "pending")');
    $ins->execute([$clubId, $userId]);

    echo json_encode(['success' => true, 'message' => 'Yêu cầu tham gia đã gửi, chờ quản trị viên phê duyệt']);
} catch (Exception $e) {
    // Return error message to help debugging in development. In production you may hide this.
    $msg = getenv('APP_ENV') === 'production' ? 'Server error' : ('Server error: ' . $e->getMessage());
    echo json_encode(['success' => false, 'message' => $msg]);
}
?>


