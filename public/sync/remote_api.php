<?php
// remote_api.php (remote server)
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    exit;
}

// Connect to remote DB
$conn = new mysqli('localhost', 'remote_user', 'remote_pass', 'remote_db');
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'DB connection failed']));
}

// Check if record already exists (using id)
$id = intval($data['id']);
$res = $conn->query("SELECT id FROM tbl_registration WHERE id = $id");

$student_name = $conn->real_escape_string($data['student_name']);
$payment_amount = floatval($data['payment_amount']);
$payment_date = $conn->real_escape_string($data['payment_date']);

if ($res->num_rows > 0) {
    // Update existing record
    $sql = "UPDATE tbl_registration SET 
              student_name='$student_name',
              payment_amount=$payment_amount,
              payment_date='$payment_date'
            WHERE id=$id";
} else {
    // Insert new record
    $sql = "INSERT INTO tbl_registration (id, student_name, payment_amount, payment_date) VALUES 
            ($id, '$student_name', $payment_amount, '$payment_date')";
}

if ($conn->query($sql) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Record saved']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to save']);
}

$conn->close();
?>
