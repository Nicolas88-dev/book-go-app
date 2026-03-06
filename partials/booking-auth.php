<section class="side-card">
    <h2>Réservez cette prestation</h2>

    <form class="booking-form">
        <div class="form-group">
            <label for="date">Date souhaitée</label>
            <input type="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="horaire">Créneau horaire</label>
            <select required>
                <option value="">Choisir…</option>
                <option>09:00</option>
                <option>10:00</option>
                <option>11:00</option>
                <option>14:00</option>
                <option>15:00</option>
            </select>
        </div>
        <div class="form-group">
            <label for="info">Informations complémentaires</label>
            <textarea rows="5" placeholder="Ex : objectif du rendez-vous, contexte…"></textarea>
        </div>

        <button class="btn btn--secondary btn--full" type="submit">Réserver ce créneau</button>
        <p class="muted">Paiement hors plateforme</p>
    </form>
</section>