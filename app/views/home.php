<?php ob_start(); ?>

<h1 class="mb-4">Trajets disponibles</h1>

<?php if (empty($trajets)): ?>
    <div class="alert alert-info">Aucun trajet disponible pour le moment.</div>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Départ</th>
                    <th>Date de départ</th>
                    <th>Arrivée</th>
                    <th>Date d'arrivée</th>
                    <th>Places disponibles</th>
                    <?php if (isset($_SESSION['user'])): ?>
                        <th>Actions</th>
                    <?php endif; ?>
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
                    <?php if (isset($_SESSION['user'])): ?>
                        <td>
                            <!-- Bouton qui ouvre la modale avec les détails du trajet -->
                            <button class="btn btn-sm btn-info" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modal-<?= $trajet['id'] ?>">
                                Détails
                            </button>

                            <?php if ($_SESSION['user']['id'] === $trajet['utilisateur_id']): ?>
                                <!-- Boutons modifier et supprimer uniquement si c'est son trajet -->
                                <a href="/klaxon/public/index.php/trajets/edit/<?= $trajet['id'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                                <a href="/klaxon/public/index.php/trajets/delete/<?= $trajet['id'] ?>" class="btn btn-sm btn-danger">Supprimer</a>
                            <?php endif; ?>
                        </td>
                    <?php endif; ?>
                </tr>

                <?php if (isset($_SESSION['user'])): ?>
                <!-- Modale de détails pour chaque trajet -->
                <div class="modal fade" id="modal-<?= $trajet['id'] ?>" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Détails du trajet</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Conducteur :</strong> <?= htmlspecialchars($trajet['conducteur_prenom'] . ' ' . $trajet['conducteur_nom']) ?></p>
                                <p><strong>Téléphone :</strong> <?= htmlspecialchars($trajet['conducteur_telephone']) ?></p>
                                <p><strong>Email :</strong> <?= htmlspecialchars($trajet['conducteur_email']) ?></p>
                                <p><strong>Places totales :</strong> <?= $trajet['places_total'] ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layout.php';
?>