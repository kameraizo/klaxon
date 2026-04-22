<?php
/** @var array<int, array<string, mixed>> $trajets */
ob_start();
?>

<h1 class="mb-4">Gestion des trajets</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Conducteur</th>
            <th>Départ</th>
            <th>Date de départ</th>
            <th>Arrivée</th>
            <th>Date d'arrivée</th>
            <th>Places dispo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($trajets as $trajet): ?>
        <tr>
            <td><?= htmlspecialchars($trajet['conducteur_prenom'] . ' ' . $trajet['conducteur_nom']) ?></td>
            <td><?= htmlspecialchars($trajet['agence_depart']) ?></td>
            <td><?= date('d/m/Y H:i', strtotime($trajet['gdh_depart'])) ?></td>
            <td><?= htmlspecialchars($trajet['agence_arrivee']) ?></td>
            <td><?= date('d/m/Y H:i', strtotime($trajet['gdh_arrivee'])) ?></td>
            <td><?= $trajet['places_dispo'] ?></td>
            <td>
                <a href="/klaxon/public/index.php/admin/trajets/delete/<?= $trajet['id'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Supprimer ce trajet ?')">
                   Supprimer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layout.php';
?>