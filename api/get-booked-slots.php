<?php

require_once '../config/database.php';

$date = $_GET['date'] ?? null;
$serviceId = $_GET['service_id'] ?? null;

if (!$date || !$serviceId) {
    echo json_encode([]);
    exit;
}

$sql = "SELECT reservation_time 
        FROM reservations 
        WHERE reservation_date = :date 
        AND service_id = :service_id";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    'date' => $date,
    'service_id' => $serviceId
]);

$times = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($times);
