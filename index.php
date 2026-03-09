<?php
require_once 'config/database.php';

$sql = "SELECT id, title, description, duration FROM services ORDER BY id ASC";
$stmt = $pdo->query($sql);
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include 'includes/header.php'; ?>

<section class="hero">
    <div class="container">
        <div class="hero-text">
            <div class="hero-title">
                <h1>Réservez votre prestation web en quelques clics</h1>
                <h2>Choisissez - Réservez - Avancer</h2>
                <p>Book & Go vous permet de réserver simplement des prestations adaptées aux artisans et entreprises locales : analyse de votre site, accompagnement stratégique ou ateliers concrets pour développer votre visibilité en ligne.</p>
            </div>
            <div class="hero-actions">
                <a href="service.php?id=1" class="btn btn--secondary">Audit de site</a>
                <a href="service.php?id=2" class="btn btn--secondary">Accompagnement digital</a>
                <a href="service.php?id=3" class="btn btn--secondary">Atelier découverte</a>
            </div>
        </div>
    </div>
</section>
<section class="cards">
    <?php foreach ($services as $service): ?>
        <div class="card">
            <div class="header--presta">
                <img src="./assets/images/logo-bookandgo.webp" alt="logo book and go">
                <h3><?php echo htmlspecialchars(strtoupper($service['title'])); ?></h3>
            </div>
            <p>Durée : <?php echo htmlspecialchars($service['duration']); ?> min</p>
            <p><?php echo htmlspecialchars($service['description']); ?></p>
            <a href="service.php?id=<?php echo $service['id']; ?>" class="btn btn--secondary">En savoir plus</a>
        </div>
    <?php endforeach; ?>

</section>

<?php include 'includes/footer.php'; ?>