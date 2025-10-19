<?php
ob_start();
header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

$device_id = trim($_POST['device_id'] ?? '');
$admin_id = trim($_POST['admin_id'] ?? '');
$assigned_condition = trim($_POST['assigned_condition'] ?? '');
$remarks = trim($_POST['remarks'] ?? '');

if (empty($device_id) || empty($admin_id) || empty($assigned_condition)) {
    echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
    exit;
}

try {
    // Check if device exists and is available
    $checkDevice = $pdo->prepare("SELECT status FROM devices WHERE id = ?");
    $checkDevice->execute([$device_id]);
    $device = $checkDevice->fetch(PDO::FETCH_ASSOC);

    if (!$device) {
        echo json_encode(['success' => false, 'message' => 'Device not found.']);
        exit;
    }

    if ($device['status'] !== 'available') {
        echo json_encode(['success' => false, 'message' => 'This device is not available for assignment.']);
        exit;
    }

    // Assign the device
    $stmt = $pdo->prepare("INSERT INTO device_assignments (device_id, admin_id, assigned_condition, remarks) VALUES (?, ?, ?, ?)");
    $stmt->execute([$device_id, $admin_id, $assigned_condition, $remarks]);

    // Update device status
    $updateDevice = $pdo->prepare("UPDATE devices SET status = 'assigned' WHERE id = ?");
    $updateDevice->execute([$device_id]);

    echo json_encode(['success' => true, 'message' => 'Device assigned successfully.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
