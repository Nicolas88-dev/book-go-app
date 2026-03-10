<?php

session_start();
require_once '../config/database.php';
require_once '../includes/flash.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    setFlash('error', 'Méthode non autorisée.');
    header('Location: ../register.php');
    exit;
}

$lastname = trim($_POST['lastname'] ?? '');
$firstname = trim($_POST['firstname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if (
    empty($lastname) ||
    empty($firstname) ||
    empty($email) ||
    empty($password) ||
    empty($confirmPassword)
) {
    setFlash('error', 'Tous les champs sont obligatoires.');
    header('Location: ../register.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash('error', 'Adresse e-mail invalide.');
    header('Location: ../register.php');
    exit;
}

if ($password !== $confirmPassword) {
    setFlash('error', 'Les mots de passe ne correspondent pas.');
    header('Location: ../register.php');
    exit;
}

if (strlen($password) < 8) {
    setFlash('error', 'Le mot de passe doit contenir au moins 8 caractères.');
    header('Location: ../register.php');
    exit;
}

/* Vérifier si l'email existe déjà */
$checkSql = "SELECT id FROM users WHERE email = :email";
$checkStmt = $pdo->prepare($checkSql);
$checkStmt->execute(['email' => $email]);

if ($checkStmt->fetch()) {
    setFlash('error', 'Cette adresse e-mail est déjà utilisée.');
    header('Location: ../register.php');
    exit;
}

/* Hash du mot de passe */
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

/* Insertion utilisateur */
$sql = "INSERT INTO users (firstname, lastname, email, password)
        VALUES (:firstname, :lastname, :email, :password)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    'firstname' => $firstname,
    'lastname' => $lastname,
    'email' => $email,
    'password' => $hashedPassword
]);

setFlash('success', 'Compte créé avec succès. Vous pouvez maintenant vous connecter.');
header('Location: ../login.php');
exit;
