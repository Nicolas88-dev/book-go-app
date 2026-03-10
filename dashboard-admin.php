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

/* Récupérer toutes les réservations */
$sql = "SELECT reservations.*, users.firstname, users.lastname, users.email, services.title
        FROM reservations
        JOIN users ON reservations.user_id = users.id
        JOIN services ON reservations.service_id = services.id
        ORDER BY reservations.reservation_date ASC, reservations.reservation_time ASC";

$stmt = $pdo->query($sql);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'includes/header.php'; ?>

<section class="dashboard">
    <div class="dashboard-container">

        <?php include 'partials/dashboard-sidebar-admin.php'; ?>

        <div class="dashboard-content">
            <h1>Tableau de bord administrateur</h1>

            <p>Bienvenue sur l’espace administrateur</p>
            <p>Gérer les réservations et prestations en toute simplicité</p>

            <div class="history-card">
                <h3>HISTORIQUE DES RÉSERVATIONS</h3>

                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Utilisateur</th>
                            <th>Prestation</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($reservations)): ?>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reservation['id']); ?></td>

                                    <td><?php echo htmlspecialchars($reservation['reservation_date']); ?></td>

                                    <td><?php echo htmlspecialchars($reservation['reservation_time']); ?></td>

                                    <td>
                                        <?php echo htmlspecialchars($reservation['firstname'] . ' ' . $reservation['lastname']); ?><br>
                                        <small><?php echo htmlspecialchars($reservation['email']); ?></small>
                                    </td>

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

                                    <td>
                                        <div class="table-actions">
                                            <a class="btn-table" href="update-reservation-status.php?id=<?php echo $reservation['id']; ?>&status=Confirmée">Confirmer</a>
                                            <a class="btn-table" href="update-reservation-status.php?id=<?php echo $reservation['id']; ?>&status=Terminée">Terminée</a>
                                            <a class="btn-table btn-table--danger" href="update-reservation-status.php?id=<?php echo $reservation['id']; ?>&status=Annulée">Annuler</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6">Aucune réservation enregistrée.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>