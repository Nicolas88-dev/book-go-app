<?php

require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Méthode non autorisée.');
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
    die('Tous les champs sont obligatoires.');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Adresse e-mail invalide.');
}

if ($password !== $confirmPassword) {
    die('Les mots de passe ne correspondent pas.');
}

if (strlen($password) < 8) {
    die('Le mot de passe doit contenir au moins 8 caractères.');
}

/* Vérifier si l'email existe déjà */
$checkSql = "SELECT id FROM users WHERE email = :email";
$checkStmt = $pdo->prepare($checkSql);
$checkStmt->execute(['email' => $email]);

if ($checkStmt->fetch()) {
    die('Cette adresse e-mail est déjà utilisée.');
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

header('Location: ../login.php');
exit;
