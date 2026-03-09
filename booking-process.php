<?php

session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user'])) {
    die('Vous devez être connecté pour réserver.');
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Méthode non autorisée.');
}

$userId = $_SESSION['user']['id'];
$serviceId = $_POST['service_id'] ?? null;
$reservationDate = $_POST['reservation_date'] ?? null;
$reservationTime = $_POST['reservation_time'] ?? null;
$notes = trim($_POST['notes'] ?? '');

if (empty($serviceId) || empty($reservationDate) || empty($reservationTime)) {
    die('Tous les champs obligatoires doivent être remplis.');
}

$sql = "INSERT INTO reservations (user_id, service_id, reservation_date, reservation_time, notes)
        VALUES (:user_id, :service_id, :reservation_date, :reservation_time, :notes)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    'user_id' => $userId,
    'service_id' => $serviceId,
    'reservation_date' => $reservationDate,
    'reservation_time' => $reservationTime,
    'notes' => $notes
]);

$reservationId = $pdo->lastInsertId();

header("Location: confirmation.php?id=" . $reservationId);
exit;
