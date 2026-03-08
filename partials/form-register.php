<form class="booking-form" action="auth/register-process.php" method="POST">

    <div class="form-group">
        <input type="text" name="lastname" id="lastname" placeholder="Nom" required>
    </div>

    <div class="form-group">
        <input type="text" name="firstname" id="firstname" placeholder="Prénom" required>
    </div>

    <div class="form-group">
        <input type="email" name="email" id="email" placeholder="E-mail" required>
    </div>

    <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Mot de passe" required>
    </div>

    <div class="form-group">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirmer le mot de passe" required>
    </div>

    <button class="btn btn--secondary btn--full" type="submit">
        Créer mon compte
    </button>

    <p class="muted">
        Vous avez un compte ?
        <a class="tabs-link" href="login.php">Connectez-vous</a>
    </p>

</form>