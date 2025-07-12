<?php
// ----------------------
// sync.php using PDO
// ----------------------

// ✅ Function: Check general internet access
function isInternetAvailable(): bool {
    $connected = @fsockopen("8.8.8.8", 53, $errno, $errstr, 3);
    if ($connected) {
        fclose($connected);
        return true;
    }
    return false;
}

// ✅ Function: Check if remote API is reachable
function isRemoteReachable(string $url): bool {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_NOBODY         => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 3,
        CURLOPT_TIMEOUT        => 5
    ]);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($httpCode >= 200 && $httpCode < 400);
}

// ✅ Step 1: Check internet and API availability
$remote_url = 'https://remote-server.com/remote_api.php';

if (!isInternetAvailable()) {
    echo date('Y-m-d H:i:s') . " ⚠ No internet connection. Aborting sync.\n";
    exit;
}

if (!isRemoteReachable($remote_url)) {
    echo date('Y-m-d H:i:s') . " ⚠ Remote server unreachable. Aborting sync.\n";
    exit;
}

// ✅ Step 2: Connect to local database using PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=local_db;charset=utf8mb4', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// ✅ Step 3: Fetch unsynced records
$stmt = $pdo->prepare("SELECT * FROM tbl_registration WHERE synced = 0");
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($records)) {
    echo date('Y-m-d H:i:s') . " ✅ No new records to sync.\n";
    exit;
}

// ✅ Step 4: Loop through and send each record to the remote API
foreach ($records as $row) {
    $postData = json_encode([
        'id'             => $row['id'],
        'student_name'   => $row['student_name'],
        'payment_amount' => $row['payment_amount'],
        'payment_date'   => $row['payment_date']
    ]);

    $ch = curl_init($remote_url);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $postData,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT        => 10
    ]);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);

    if ($curlError) {
        echo "❌ Curl error on record ID {$row['id']}: $curlError\n";
        continue;
    }

    if ($responseData && ($responseData['status'] ?? '') === 'success') {
        // ✅ Mark record as synced
        $update = $pdo->prepare("UPDATE tbl_registration SET synced = 1 WHERE id = ?");
        $update->execute([$row['id']]);
        echo "✅ Synced record ID {$row['id']}\n";
    } else {
        echo "❌ Failed to sync record ID {$row['id']}. Response: $response\n";
    }
}

?>
