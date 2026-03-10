<?php

session_start();
require_once 'config/database.php';
require_once 'includes/flash.php';

if (!isset($_SESSION['user'])) {
    setFlash('error', 'Vous devez être connecté pour réserver.');
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setFlash('error', 'Méthode non autorisée.');
    header('Location: index.php');
    exit;
}

$userId = $_SESSION['user']['id'];
$serviceId = $_POST['service_id'] ?? null;
$reservationDate = $_POST['reservation_date'] ?? null;
$reservationTime = $_POST['reservation_time'] ?? null;
$notes = trim($_POST['notes'] ?? '');

if (empty($serviceId) || empty($reservationDate) || empty($reservationTime)) {
    setFlash('error', 'Tous les champs obligatoires doivent être remplis.');
    header('Location: service.php?id=' . $serviceId);
    exit;
}

/* Vérifier que la date n'est pas dans le passé */
$today = date('Y-m-d');

if ($reservationDate < $today) {
    setFlash('error', 'Impossible de réserver une date passée.');
    header('Location: service.php?id=' . $serviceId);
    exit;
}

/* Vérifier l'heure si la réservation est aujourd'hui */
$currentTime = date('H:i');

if ($reservationDate === $today && $reservationTime < $currentTime) {
    setFlash('error', 'Ce créneau est déjà passé.');
    header('Location: service.php?id=' . $serviceId);
    exit;
}

/* Vérifier si le créneau est déjà réservé */
$checkSql = "SELECT id FROM reservations
             WHERE service_id = :service_id
             AND reservation_date = :reservation_date
             AND reservation_time = :reservation_time";

$checkStmt = $pdo->prepare($checkSql);
$checkStmt->execute([
    'service_id' => $serviceId,
    'reservation_date' => $reservationDate,
    'reservation_time' => $reservationTime
]);

if ($checkStmt->fetch()) {
    setFlash('error', 'Ce créneau est déjà réservé. Veuillez en choisir un autre.');
    header('Location: service.php?id=' . $serviceId);
    exit;
}

/* Insérer la réservation */
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
