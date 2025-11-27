<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
      
    if (!str_ends_with($email, '@ut.edu.vn')) {
        echo json_encode(['success' => false, 'message' => 'Email phải thuộc miền @ut.edu.vn']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user) {
            error_log("User found: " . $user['name']);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $role = strtolower(trim($user['role']));
                $_SESSION['user_role'] = $role;
                
                error_log("Login successful for: " . $user['name']);
                echo json_encode(['success' => true, 'user' => [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $role
                ]]);
            } else {
                error_log("Password verification failed");
                echo json_encode(['success' => false, 'message' => 'Mật khẩu không hợp lệ']);
            }
        } else {
            error_log("User not found");
            echo json_encode(['success' => false, 'message' => 'Người dùng không tồn tại']);
        }
    } catch (Exception $e) {
        error_log("Login error: " . $e->getMessage());
        echo json_encode(['success' => false, 'message' => 'Lỗi cơ sở dữ liệu']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Phương thức yêu cầu không hợp lệ']);
}
?>