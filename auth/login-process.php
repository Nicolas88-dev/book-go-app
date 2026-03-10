<?php

session_start();
require_once '../config/database.php';
require_once '../includes/flash.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setFlash('error', 'Méthode non autorisée.');
    header('Location: ../login.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    setFlash('error', 'Tous les champs sont obligatoires.');
    header('Location: ../login.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('error', 'Adresse e-mail invalide.');
    header('Location: ../login.php');
    exit;
}

/* Rechercher l'utilisateur */
$sql = "SELECT id, firstname, lastname, email, password, role FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    setFlash('error', 'Identifiants incorrects.');
    header('Location: ../login.php');
    exit;
}

/* Vérifier le mot de passe */
if (!password_verify($password, $user['password'])) {
    setFlash('error', 'Identifiants incorrects.');
    header('Location: ../login.php');
    exit;
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
