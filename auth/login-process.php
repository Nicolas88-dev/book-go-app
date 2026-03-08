<?php

session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Méthode non autorisée.');
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    die('Tous les champs sont obligatoires.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Adresse e-mail invalide.');
}

/* Rechercher l'utilisateur */
$sql = "SELECT id, firstname, lastname, email, password, role FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die('Identifiants incorrects.');
}

/* Vérifier le mot de passe */
if (!password_verify($password, $user['password'])) {
    die('Identifiants incorrects.');
}

/* Créer la session */
$_SESSION['user'] = [
    'id' => $user['id'],
    'firstname' => $user['firstname'],
    'lastname' => $user['lastname'],
    'email' => $user['email'],
    'role' => $user['role']
];

/* Redirection selon le rôle */
if ($user['role'] === 'admin') {
    header('Location: ../dashboard-admin.php');
    exit;
}

header('Location: ../dashboard-user.php');
exit;
