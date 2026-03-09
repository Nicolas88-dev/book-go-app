<section class="side-card">
    <h2>Réservez cette prestation</h2>

    <form class="booking-form" action="booking-process.php" method="POST">

        <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">

        <div class="form-group">
            <label for="reservation_date">Date souhaitée</label>
            <input type="date" id="reservation_date" name="reservation_date" required>
        </div>

        <div class="form-group">
            <label for="reservation_time">Créneau horaire</label>
            <select id="reservation_time" name="reservation_time" required>
                <option value="">Choisir…</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
            </select>
        </div>

        <div class="form-group">
            <label for="notes">Informations complémentaires</label>
            <textarea id="notes" name="notes" rows="5" placeholder="Ex : objectif du rendez-vous, contexte…"></textarea>
        </div>

        <button class="btn btn--secondary btn--full" type="submit">
            Réserver ce créneau
        </button>

        <p class="muted">Paiement hors plateforme</p>
    </form>
</section>