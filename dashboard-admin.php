<?php include 'includes/header.php'; ?>

<section class="dashboard">
    <div class="dashboard-container">

        <?php include 'partials/dashboard-sidebar.php'; ?>

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
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>15</td>
                            <td>10 mars 2026</td>
                            <td>10:30</td>
                            <td>
                                Nicolas Lestrez<br>
                                <small>nicolas.lestrez@orange.fr</small>
                            </td>
                            <td>Audit de site web</td>
                            <td>
                                <span class="status confirmed">Confirmée</span>
                                <span class="status done">Terminée</span>
                                <span class="status cancelled">Annulée</span>
                            </td>
                        </tr>

                        <tr>
                            <td>14</td>
                            <td>17 février 2026</td>
                            <td>15:00</td>
                            <td>
                                Nicolas Lestrez<br>
                                <small>nicolas.lestrez@orange.fr</small>
                            </td>
                            <td>Accompagnement digital</td>
                            <td>
                                <span class="status confirmed">Confirmée</span>
                                <span class="status done">Terminée</span>
                                <span class="status cancelled">Annulée</span>
                            </td>
                        </tr>

                        <tr>
                            <td>13</td>
                            <td>5 février 2026</td>
                            <td>10:30</td>
                            <td>
                                Nicolas Lestrez<br>
                                <small>nicolas.lestrez@orange.fr</small>
                            </td>
                            <td>Atelier initiation web</td>
                            <td>
                                <span class="status confirmed">Confirmée</span>
                                <span class="status done">Terminée</span>
                                <span class="status cancelled">Annulée</span>
                            </td>
                        </tr>

                        <tr>
                            <td>12</td>
                            <td>21 janvier 2026</td>
                            <td>13:30</td>
                            <td>
                                Nicolas Lestrez<br>
                                <small>nicolas.lestrez@orange.fr</small>
                            </td>
                            <td>Audit de site web</td>
                            <td>
                                <span class="status confirmed">Confirmée</span>
                                <span class="status done">Terminée</span>
                                <span class="status cancelled">Annulée</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>