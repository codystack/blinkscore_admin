<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_POST['admin_id'] ?? null;
    $title = trim($_POST['title'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $status = trim($_POST['status'] ?? '');

    if (empty($admin_id) || empty($title) || empty($message) || empty($status)) {
        echo json_encode(["success" => false, "message" => "All fields are required."]);
        exit;
    }

    try {
        $stmt = $pdo->prepare("
            INSERT INTO notices (admin_id, title, message, status)
            VALUES (:admin_id, :title, :message, :status)
        ");
        $stmt->execute([
            ':admin_id' => $admin_id,
            ':title' => $title,
            ':message' => $message,
            ':status' => $status
        ]);

        echo json_encode(["success" => true, "message" => "Notice created successfully."]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}