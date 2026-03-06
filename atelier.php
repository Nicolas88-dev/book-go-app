<?php include 'includes/header.php'; ?>

<section class="page-service container">
    <div class="service-grid">

        <article class="service-content">
            <p class="breadcrumb">Accueil > <strong>Atelier initiation web</strong></p>

            <h1>Atelier initiation web</h1>
            <p class="meta">Durée : <strong>2h</strong></p>

            <p>
                Atelier pratique pour découvrir les bases du web et comprendre comment fonctionne un site internet. Cette session permet de se familiariser avec les notions essentielles comme le HTML, le CSS et les principaux outils numériques. L’objectif est de vous donner une première vision claire du fonctionnement du web et de vous permettre d’acquérir des bases solides pour démarrer.
            </p>

            <h2>Ce que vous obtenez</h2>
            <ul class="checklist">
                <li>Compréhension des bases du fonctionnement d’un site web</li>
                <li>Découverte des technologies essentielles (HTML, CSS, outils web)</li>
                <li>Premières manipulations et conseils pour progresser</li>
            </ul>
            <div class="author-card">
                <img src="./assets/images/nicolas-lestrez.webp" alt="Photo de Nicolas Lestrez">

                <div class="author-info">
                    <h4>Nicolas Lestrez</h4>
                    <p>Consultant numérique indépendant</p>
                </div>
            </div>

            <a class="btn btn--secondary" href="index.php">Retour accueil</a>
        </article>

        <aside class="service-side">
            <?php include 'partials/booking-guest.php'; ?>
            <?php include 'partials/booking-auth.php'; ?>
            <!-- Pour tester la version connecté, remplace par :
      -->
        </aside>

    </div>
</section>

<?php include 'includes/footer.php'; ?>