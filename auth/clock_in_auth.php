<?php

header('Content-Type: application/json');
require_once __DIR__ . '/../config/db.php';           // provide $pdo
require_once __DIR__ . '/../utils/get_client_info.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method', 400);
    }

    // Require an authenticated user (adjust to your auth system)
    if (empty($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Not authenticated.']);
        exit;
    }
    $user_id = (int) $_SESSION['user_id'];

    // Optional client-sent fields (lat/lng/note)
    $lat = isset($_POST['lat']) && $_POST['lat'] !== '' ? (float) $_POST['lat'] : null;
    $lng = isset($_POST['lng']) && $_POST['lng'] !== '' ? (float) $_POST['lng'] : null;
    $note = isset($_POST['note']) ? trim($_POST['note']) : null;

    $ip = getClientIp();
    $agent = getUserAgent();

    // Prevent double clock-in: check today's record for this user with clock_in but no clock_out or already clocked-in today.
    $stmt = $pdo->prepare("
        SELECT id, clock_in_at, clock_out_at
        FROM attendance
        WHERE user_id = ? 
        ORDER BY id DESC
        LIMIT 1
    ");
    $stmt->execute([$user_id]);
    $last = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($last && $last['clock_in_at'] && !$last['clock_out_at']) {
        echo json_encode(['success' => false, 'message' => 'You are already clocked in. Please clock out before clocking in again.']);
        exit;
    }

    // Insert new attendance row with clock_in only
    $insert = $pdo->prepare("
        INSERT INTO attendance (user_id, clock_in_at, clock_in_ip, clock_in_agent, clock_in_lat, clock_in_lng, clock_in_note)
        VALUES (NOW() /* user_id? */, ?, ?, ?, ?, ?, ?)
    ");

    // Correction: we need to pass user_id first. Let's use proper placeholders:
    $insert = $pdo->prepare("
        INSERT INTO attendance (user_id, clock_in_at, clock_in_ip, clock_in_agent, clock_in_lat, clock_in_lng, clock_in_note)
        VALUES (?, NOW(), ?, ?, ?, ?, ?)
    ");
    $insert->execute([$user_id, $ip, $agent, $lat, $lng, $note]);

    echo json_encode(['success' => true, 'message' => 'Clock-in recorded.', 'timestamp' => date('c')]);
    exit;

} catch (Throwable $e) {
    error_log("Clock In error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server error.']);
    exit;
}