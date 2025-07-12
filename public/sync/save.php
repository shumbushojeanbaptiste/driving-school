<?php
// save.php (local server)
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
    exit;
}

// DB connection (adjust as needed)
$conn = new mysqli('localhost', 'root', '', 'local_db');
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'DB connection failed']));
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO tbl_registration (student_name, payment_amount, payment_date, synced) VALUES (?, ?, ?, 0)");
$stmt->bind_param("sds", $data['student_name'], $data['payment_amount'], $data['payment_date']);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Payment saved locally']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to save']);
}

$stmt->close();
$conn->close();
?>
