<?php
session_start();
require_once 'config/database.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SESSION['user']['role'] !== 'user' && $_SESSION['user']['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user']['id'];

/* Récupérer les réservations de l'utilisateur */
$sql = "SELECT reservations.*, services.title
        FROM reservations
        JOIN services ON reservations.service_id = services.id
        WHERE reservations.user_id = :user_id
        ORDER BY reservations.reservation_date ASC, reservations.reservation_time ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $userId]);

$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* Trouver le prochain rendez-vous */
$nextReservation = null;
$currentDateTime = date('Y-m-d H:i:s');

foreach ($reservations as $reservation) {
    $reservationDateTime = $reservation['reservation_date'] . ' ' . $reservation['reservation_time'];

    if ($reservationDateTime >= $currentDateTime) {
        $nextReservation = $reservation;
        break;
    }
}
?>

<?php include 'includes/header.php'; ?>

<section class="dashboard">

    <div class="dashboard-container">

        <?php include 'partials/dashboard-sidebar-user.php'; ?>

        <div class="dashboard-content">

            <h1>Mes réservations</h1>

            <div class="next-booking-card">
                <h3>PROCHAIN RENDEZ-VOUS</h3>

                <?php if ($nextReservation): ?>
                    <p class="booking-title">
                        <?php echo htmlspecialchars($nextReservation['title']); ?>
                    </p>

                    <p class="booking-date">
                        <?php echo htmlspecialchars($nextReservation['reservation_date']); ?>
                        à
                        <?php echo htmlspecialchars($nextReservation['reservation_time']); ?>
                    </p>
                <?php else: ?>
                    <p>Aucun rendez-vous à venir</p>
                <?php endif; ?>
            </div>

            <div class="history-card">

                <h3>HISTORIQUE DES RÉSERVATIONS</h3>

                <table class="dashboard-table">

                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Prestation</th>
                            <th>Statut</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($reservations)): ?>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reservation['reservation_date']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['reservation_time']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['title']); ?></td>
                                    <td>
                                        <?php
                                        $statusClass = '';

                                        if ($reservation['status'] === 'En attente') {
                                            $statusClass = 'pending';
                                        } elseif ($reservation['status'] === 'Confirmée') {
                                            $statusClass = 'confirmed';
                                        } elseif ($reservation['status'] === 'Terminée') {
                                            $statusClass = 'done';
                                        } elseif ($reservation['status'] === 'Annulée') {
                                            $statusClass = 'cancelled';
                                        }
                                        ?>

                                        <span class="status <?php echo $statusClass; ?>">
                                            <?php echo htmlspecialchars($reservation['status']); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">Aucune réservation pour le moment.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>

            </div>

        </div>
    </div>

</section>

<?php include 'includes/footer.php'; ?>