<?php
// footer.php
?>

</main>

<footer class="site-footer">
    <div class="bloc--container">
        <div class="bloc">
            <img src="./assets/images/bookandgoblanc.webp" alt="logo book and go blanc">
            <p>La plateforme pour réserver vos prestations web et faire évoluer votre activité.</p>
            <a href="#" target="_blank" class="social-icon">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="#" target="_blank" class="social-icon">
                <i class="fa-brands fa-x-twitter"></i>
            </a>
            <a href="#" target="_blank" class="social-icon">
                <i class="fa-brands fa-linkedin-in"></i>
            </a>
            <a href="#" target="_blank" class="social-icon">
                <i class="fa-brands fa-instagram"></i>
            </a>
        </div>
        <div class="bloc">
            <h2>NOS PRESTATIONS</h2>
            <ul class="prestations">
                <li>
                    <a href="audit.php">Audit de site</a>
                </li>
                <li>
                    <a href="/accompagnement.php">Accompagnement digital</a>
                </li>
                <li>
                    <a href="atelier.php">Atelier initiation web</a>
                </li>
            </ul>
        </div>
        <div class="bloc">
            <h2>NEWSLETTER</h2>
            <p>
                Abonnez-vous pour recevoir des conseils concrets et faire évoluer votre activité digitale.
            </p>

            <form class="newsletter-form">
                <input type="email" placeholder="Votre e-mail" required>
                <button type="submit">
                    <i class="fa-solid fa-envelope"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> Book & Go | Tous droits réservés</p>
    </div>
</footer>


</body>

</html>