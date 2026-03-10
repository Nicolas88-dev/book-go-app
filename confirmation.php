<?php
session_start();
require_once 'config/database.php';
require_once 'includes/flash.php';

if (!isset($_SESSION['user'])) {
    setFlash('error', 'Vous devez être connecté pour accéder à cette page.');
    header('Location: login.php');
    exit;
}

$reservationId = $_GET['id'] ?? null;

$userId = $_SESSION['user']['id'];
$userRole = $_SESSION['user']['role'];

if (!$reservationId || !is_numeric($reservationId)) {
    setFlash('error', 'Réservation introuvable.');

    if ($userRole === 'admin') {
        header('Location: dashboard-admin.php');
    } else {
        header('Location: dashboard-user.php');
    }

    exit;
}

if ($userRole === 'admin') {
    $sql = "SELECT reservations.*, services.title
            FROM reservations
            JOIN services ON reservations.service_id = services.id
            WHERE reservations.id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $reservationId]);
} else {
    $sql = "SELECT reservations.*, services.title
            FROM reservations
            JOIN services ON reservations.service_id = services.id
            WHERE reservations.id = :id
            AND reservations.user_id = :user_id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $reservationId,
        'user_id' => $userId
    ]);
}

$reservation = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reservation) {
    setFlash('error', 'Vous ne pouvez pas accéder à cette réservation.');

    if ($userRole === 'admin') {
        header('Location: dashboard-admin.php');
    } else {
        header('Location: dashboard-user.php');
    }

    exit;
}
?>

<?php include 'includes/header.php'; ?>

<section class="hero confirm-hero">
    <div class="confirm-container">
        <div class="confirm-card">
            <div class="confirm-icon">
                <i class="fa-solid fa-check"></i>
            </div>

            <h2>Votre réservation est confirmée</h2>

            <p class="confirm-text">
                Tout est prêt. Votre réservation a bien été enregistrée avec tous les détails de votre rendez-vous.
            </p>

            <div class="confirm-details">
                <div class="detail-row">
                    <div class="detail-left">
                        <i class="fa-regular fa-file-lines"></i>
                        <span>Prestation</span>
                    </div>
                    <span class="detail-right"><?php echo htmlspecialchars($reservation['title']); ?></span>
                </div>

                <div class="detail-row">
                    <div class="detail-left">
                        <i class="fa-regular fa-calendar"></i>
                        <span>Date</span>
                    </div>
                    <span class="detail-right"><?php echo htmlspecialchars($reservation['reservation_date']); ?></span>
                </div>

                <div class="detail-row">
                    <div class="detail-left">
                        <i class="fa-regular fa-clock"></i>
                        <span>Heure</span>
                    </div>
                    <span class="detail-right"><?php echo htmlspecialchars($reservation['reservation_time']); ?></span>
                </div>
            </div>

            <div class="confirm-actions">
                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <a class="btn-confirm" href="dashboard-admin.php">VOIR LE DASHBOARD ADMIN</a>
                <?php else: ?>
                    <a class="btn-confirm" href="dashboard-user.php">VOIR MES RÉSERVATIONS</a>
                <?php endif; ?>

                <a class="btn-confirm" href="index.php">RETOUR À L’ACCUEIL</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>