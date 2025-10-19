<?php
ob_start();
header('Content-Type: application/json');
error_reporting(0);
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$id = $_POST['device_id'] ?? '';
$device_name = trim($_POST['device_name'] ?? '');
$serial_number = trim($_POST['serial_number'] ?? '');
$status = trim($_POST['status'] ?? '');

if (empty($id) || empty($device_name) || empty($serial_number)) {
    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
    exit;
}

try {
    // Check if device exists
    $check = $pdo->prepare("SELECT * FROM devices WHERE id = ?");
    $check->execute([$id]);
    if ($check->rowCount() === 0) {
        echo json_encode(['success' => false, 'message' => 'Device not found.']);
        exit;
    }

    // Update device info
    $stmt = $pdo->prepare("UPDATE devices SET device_name = ?, serial_number = ?, status = ? WHERE id = ?");
    $stmt->execute([$device_name, $serial_number, $status ?: 'available', $id]);

    echo json_encode(['success' => true, 'message' => 'Device updated successfully.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
