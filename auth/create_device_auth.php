<?php
ob_start();
header('Content-Type: application/json');
error_reporting(0);
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$device_name = trim($_POST['device_name'] ?? '');
$serial_number = trim($_POST['serial_number'] ?? '');

if (empty($device_name) || empty($serial_number)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

try {
    // Check for duplicate serial number
    $check = $pdo->prepare("SELECT id FROM devices WHERE serial_number = ?");
    $check->execute([$serial_number]);

    if ($check->rowCount() > 0) {
        echo json_encode(['success' => false, 'message' => 'A device with this serial number already exists.']);
        exit;
    }

    // Insert new device
    $stmt = $pdo->prepare("INSERT INTO devices (device_name, serial_number, status) VALUES (?, ?, 'available')");
    $stmt->execute([$device_name, $serial_number]);

    echo json_encode(['success' => true, 'message' => 'Device added successfully.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}