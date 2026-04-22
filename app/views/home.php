<?php
// On démarre le contenu de la page
ob_start();
?>

<h1 class="mb-4">Trajets disponibles</h1>

<?php if (empty($trajets)): ?>
    <!-- Si aucun trajet disponible on affiche un message -->
    <div class="alert alert-info">
        Aucun trajet disponible pour le moment.
    </div>
<?php else: ?>
    <!-- Sinon on affiche la liste des trajets -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Départ</th>
                    <th>Date de départ</th>
                    <th>Arrivée</th>
                    <th>Date d'arrivée</th>
                    <th>Places disponibles</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trajets as $trajet): ?>
                <tr>
                    <td><?= htmlspecialchars($trajet['agence_depart']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($trajet['gdh_depart'])) ?></td>
                    <td><?= htmlspecialchars($trajet['agence_arrivee']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($trajet['gdh_arrivee'])) ?></td>
                    <td><?= $trajet['places_dispo'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php
// On récupère le contenu et on l'injecte dans le layout
$content = ob_get_clean();
require_once __DIR__ . '/layout.php';
?>