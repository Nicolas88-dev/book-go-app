<?php

require_once 'config/database.php';

$reservationId = $_GET['id'] ?? null;

if (!$reservationId) {
    die('Réservation introuvable.');
}

$sql = "SELECT reservations.*, services.title
        FROM reservations
        JOIN services ON reservations.service_id = services.id
        WHERE reservations.id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $reservationId]);

$reservation = $stmt->fetch();

if (!$reservation) {
    die('Réservation introuvable.');
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
                Tout est prêt. Un email de confirmation vient de vous être envoyé
                avec tous les détails de votre rendez-vous.
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
                <a class="btn-confirm" href="dashboard-user.php">VOIR MES RÉSERVATIONS</a>
                <a class="btn-confirm" href="index.php">RETOUR À L’ACCUEIL</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>