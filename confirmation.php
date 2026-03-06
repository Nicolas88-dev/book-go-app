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
                    <div class="detail-right">Audit de site web</div>
                </div>

                <div class="detail-row">
                    <div class="detail-left">
                        <i class="fa-regular fa-calendar"></i>
                        <span>Date</span>
                    </div>
                    <div class="detail-right">10 Mars 2026</div>
                </div>

                <div class="detail-row">
                    <div class="detail-left">
                        <i class="fa-regular fa-clock"></i>
                        <span>Heure</span>
                    </div>
                    <div class="detail-right">10h30</div>
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