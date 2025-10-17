<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/db.php'; // $pdo available

try {
    $token    = $_POST['token'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';

    // Basic validation
    if (!$token || !$password || !$confirm) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    if ($password !== $confirm) {
        echo json_encode(["success" => false, "message" => "Passwords do not match."]);
        exit;
    }

    if (strlen($password) < 6) {
        echo json_encode(["success" => false, "message" => "Password must be at least 6 characters."]);
        exit;
    }

    // Find token
    $stmt = $pdo->prepare("SELECT pr.user_id, pr.expires_at, u.email 
                           FROM password_resets pr 
                           JOIN users u ON pr.user_id = u.id 
                           WHERE pr.token = ?");
    $stmt->execute([$token]);
    $reset = $stmt->fetch();

    if (!$reset) {
        echo json_encode(["success" => false, "message" => "Invalid or expired token."]);
        exit;
    }

    if (strtotime($reset['expires_at']) < time()) {
        echo json_encode(["success" => false, "message" => "Reset link has expired."]);
        exit;
    }

    // Hash new password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Update user password
    $update = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    $update->execute([$hashed_password, $reset['user_id']]);

    // Delete token so it can’t be reused
    $delete = $pdo->prepare("DELETE FROM password_resets WHERE user_id = ?");
    $delete->execute([$reset['user_id']]);

    echo json_encode([
        "success" => true,
        "message" => "Your password has been reset successfully. You can now log in."
    ]);
    exit;

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Server error. Please try again later."
    ]);
    exit;
}
