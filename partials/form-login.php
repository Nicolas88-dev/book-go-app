<form class="booking-form" action="auth/login-process.php" method="POST">
    <div class="form-group">
        <input type="email" name="email" id="email" placeholder="Votre e-mail" required>
    </div>
    <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
    </div>

    <button class="btn btn--secondary btn--full" type="submit">Se connecter</button>

    <p class="muted">Pas encore de compte ? <a class="tabs-link" href="register.php">Créer un compte</a></p>
</form>