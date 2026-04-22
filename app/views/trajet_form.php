<?php
/** @var array<int, array<string, mixed>> $agences */
ob_start();
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="mb-4">Proposer un trajet</h1>

        <!-- Affichage des erreurs de validation -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="/klaxon/public/index.php/trajets/store">

            <!-- Infos conducteur pré-remplies et non modifiables comme demandé dans le brief -->
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['user']['nom']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['user']['prenom']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['user']['email']) ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Téléphone</label>
                <input type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['user']['telephone']) ?>" disabled>
            </div>

            <!-- Agence de départ -->
            <div class="mb-3">
                <label for="agence_depart_id" class="form-label">Agence de départ</label>
                <select class="form-select" name="agence_depart_id" id="agence_depart_id" required>
                    <option value="">Choisir une agence</option>
                    <?php foreach ($agences as $agence): ?>
                        <option value="<?= $agence['id'] ?>"><?= htmlspecialchars($agence['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Agence d'arrivée -->
            <div class="mb-3">
                <label for="agence_arrivee_id" class="form-label">Agence d'arrivée</label>
                <select class="form-select" name="agence_arrivee_id" id="agence_arrivee_id" required>
                    <option value="">Choisir une agence</option>
                    <?php foreach ($agences as $agence): ?>
                        <option value="<?= $agence['id'] ?>"><?= htmlspecialchars($agence['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Date et heure de départ -->
            <div class="mb-3">
                <label for="gdh_depart" class="form-label">Date et heure de départ</label>
                <input type="datetime-local" class="form-control" name="gdh_depart" id="gdh_depart" required>
            </div>

            <!-- Date et heure d'arrivée -->
            <div class="mb-3">
                <label for="gdh_arrivee" class="form-label">Date et heure d'arrivée</label>
                <input type="datetime-local" class="form-control" name="gdh_arrivee" id="gdh_arrivee" required>
            </div>

            <!-- Nombre de places -->
            <div class="mb-3">
                <label for="places_total" class="form-label">Nombre de places</label>
                <input type="number" class="form-control" name="places_total" id="places_total" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Créer le trajet</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layout.php';
?>