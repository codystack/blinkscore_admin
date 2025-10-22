<?php
ob_start();
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../utils/get_client_info.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method', 400);
    }

    if (empty($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Not authenticated.']);
        exit;
    }

    $user_id = (int) $_SESSION['user_id'];

    $lat = isset($_POST['lat']) && $_POST['lat'] !== '' ? (float) $_POST['lat'] : null;
    $lng = isset($_POST['lng']) && $_POST['lng'] !== '' ? (float) $_POST['lng'] : null;
    $note = isset($_POST['note']) ? trim($_POST['note']) : null;

    $ip = getClientIp();
    $agent = getUserAgent();

    // Find the latest attendance row with clock_in_at set and clock_out_at IS NULL for this user
    $stmt = $pdo->prepare("
        SELECT id
        FROM attendance
        WHERE user_id = ? AND clock_in_at IS NOT NULL AND clock_out_at IS NULL
        ORDER BY id DESC
        LIMIT 1
    ");
    $stmt->execute([$user_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo json_encode(['success' => false, 'message' => 'No active clock-in session found.']);
        exit;
    }

    $attendance_id = (int) $row['id'];

    $update = $pdo->prepare("
        UPDATE attendance
        SET clock_out_at = NOW(),
            clock_out_ip = ?,
            clock_out_agent = ?,
            clock_out_lat = ?,
            clock_out_lng = ?,
            clock_out_note = ?
        WHERE id = ?
    ");
    $update->execute([$ip, $agent, $lat, $lng, $note, $attendance_id]);

    echo json_encode(['success' => true, 'message' => 'Clock-out recorded.', 'timestamp' => date('c')]);
    exit;

} catch (Throwable $e) {
    error_log("Clock Out error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error.']);
    exit;
}