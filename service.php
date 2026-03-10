<?php
session_start();
require_once 'config/database.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Prestation introuvable.');
}

$serviceId = (int) $_GET['id'];

$sql = "SELECT id, title, description, duration FROM services WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $serviceId]);

$service = $stmt->fetch(PDO::FETCH_ASSOC);

$serviceExtras = [
    1 => [
        'benefits_title' => 'Ce que vous obtenez',
        'benefits' => [
            'Analyse des points forts / faibles',
            'Recommandations priorisées',
            'Mini plan d’actions réalisables'
        ]
    ],
    2 => [
        'benefits_title' => 'Ce que vous obtenez',
        'benefits' => [
            'Analyse rapide de votre projet ou de votre présence en ligne',
            'Conseils personnalisés adaptés à vos objectifs',
            'Pistes d’amélioration et prochaines actions à mettre en place'
        ]
    ],
    3 => [
        'benefits_title' => 'Ce que vous obtenez',
        'benefits' => [
            'Compréhension des bases du fonctionnement d’un site web',
            'Découverte des technologies essentielles (HTML, CSS, outils web)',
            'Premières manipulations et conseils pour progresser'
        ]
    ]
];

$extra = $serviceExtras[$serviceId] ?? null;

/* Génération dynamique des créneaux selon la durée */

$slotDuration = (int) $service['duration'];
$buffer = 30; // temps tampon entre deux prestations
$totalSlotTime = $slotDuration + $buffer;

$availableSlots = [];

function generateSlots($start, $end, $slotDuration, $buffer)
{
    $slots = [];

    $current = new DateTime($start);
    $endTime = new DateTime($end);

    while (true) {
        $slotStart = clone $current;
        $slotEnd = clone $slotStart;
        $slotEnd->modify("+{$slotDuration} minutes");

        if ($slotEnd > $endTime) {
            break;
        }

        $slots[] = $slotStart->format('H:i');

        $current->modify("+" . ($slotDuration + $buffer) . " minutes");
    }

    return $slots;
}

$morningSlots = generateSlots('09:00', '12:00', $slotDuration, $buffer);
$afternoonSlots = generateSlots('13:30', '18:30', $slotDuration, $buffer);

$availableSlots = array_merge($morningSlots, $afternoonSlots);

if (!$service) {
    die('Prestation introuvable.');
}
?>

<?php include 'includes/header.php'; ?>

<section class="page-service">
    <div class="service-grid container1">

        <div class="service-content">
            <p class="breadcrumb">
                <a href="index.php">Accueil</a> >
                <strong><?php echo htmlspecialchars($service['title']); ?></strong>
            </p>

            <h1><?php echo htmlspecialchars($service['title']); ?></h1>

            <p><strong>Durée :</strong> <?php echo htmlspecialchars($service['duration']); ?> min</p>

            <p><?php echo htmlspecialchars($service['description']); ?></p>

            <?php if ($extra): ?>
                <h2><?php echo htmlspecialchars($extra['benefits_title']); ?></h2>

                <ul class="checklist">
                    <?php foreach ($extra['benefits'] as $benefit): ?>
                        <li><?php echo htmlspecialchars($benefit); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="author-card">
                <img src="assets/images/nicolas-lestrez.webp" alt="Nicolas Lestrez">
                <div class="author-info">
                    <h4>Nicolas Lestrez</h4>
                    <p>Consultant numérique indépendant</p>
                </div>
            </div>

            <a href="index.php" class="btn btn--secondary">Retour accueil</a>
        </div>

        <aside class="service-side">
            <?php if (isset($_SESSION['user'])): ?>
                <?php include 'partials/booking-auth.php'; ?>
            <?php else: ?>
                <?php include 'partials/booking-guest.php'; ?>
            <?php endif; ?>
        </aside>

    </div>
</section>

<?php include 'includes/footer.php'; ?>