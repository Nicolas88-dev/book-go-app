<?php include 'includes/header.php'; ?>

<section class="dashboard">

    <div class="dashboard-container">

        <?php include 'partials/dashboard-sidebar.php'; ?>

        <div class="dashboard-content">

            <h1>Mes réservations</h1>

            <div class="next-booking-card">

                <h3>PROCHAIN RENDEZ-VOUS</h3>

                <p class="booking-title">Audit de site web</p>

                <p class="booking-date">10 mars 2026 à 10:30</p>

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

                        <tr>
                            <td>10 mars 2026</td>
                            <td>10:30</td>
                            <td>Audit de site web</td>
                            <td><span class="status confirmed">Confirmé</span></td>
                        </tr>

                        <tr>
                            <td>17 février 2026</td>
                            <td>15:00</td>
                            <td>Accompagnement digital</td>
                            <td><span class="status done">Terminée</span></td>
                        </tr>

                        <tr>
                            <td>5 février 2026</td>
                            <td>10:30</td>
                            <td>Atelier initiation web</td>
                            <td><span class="status done">Terminée</span></td>
                        </tr>

                        <tr>
                            <td>21 janvier 2026</td>
                            <td>13:30</td>
                            <td>Audit de site web</td>
                            <td><span class="status cancelled">Annulée</span></td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</section>

<?php include 'includes/footer.php'; ?>