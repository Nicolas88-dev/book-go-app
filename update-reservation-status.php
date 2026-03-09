<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['user']['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? null;
$status = $_GET['status'] ?? null;

$allowedStatuses = ['Confirmée', 'Terminée', 'Annulée'];

if (!$id || !is_numeric($id) || !in_array($status, $allowedStatuses)) {
    die('Paramètres invalides.');
}

$sql = "UPDATE reservations SET status = :status WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'status' => $status,
    'id' => $id
]);

header('Location: dashboard-admin.php');
exit;
