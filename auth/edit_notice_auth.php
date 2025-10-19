<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$id          = $_POST['id'] ?? null;
$admin_id    = $_POST['admin_id'] ?? null;
$title       = trim($_POST['title'] ?? '');
$message     = trim($_POST['message'] ?? '');
$status      = $_POST['status'] ?? 'active';

if (!$id || !$title || !$message || !$admin_id) {
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        UPDATE notices 
        SET admin_id = :admin_id, title = :title, message = :message, 
            status = :status 
        WHERE id = :id
    ");
    $stmt->execute([
        ':admin_id' => $admin_id,
        ':title' => $title,
        ':message' => $message,
        ':status' => $status,
        ':id' => $id
    ]);

    echo json_encode(['success' => true, 'message' => 'Notice updated successfully']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}