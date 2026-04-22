<?php ob_start(); ?>

<h1 class="mb-4">Gestion des agences</h1>

<!-- Formulaire d'ajout d'agence -->
<form method="POST" action="/klaxon/public/index.php/admin/agences/store" class="mb-4">
    <div class="input-group">
        <input type="text" class="form-control" name="nom" placeholder="Nom de la nouvelle agence" required>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agences as $agence): ?>
        <tr>
            <td><?= htmlspecialchars($agence['nom']) ?></td>
            <td>
                <!-- Formulaire de modification inline -->
                <form method="POST" action="/klaxon/public/index.php/admin/agences/update/<?= $agence['id'] ?>" class="d-inline">
                    <input type="text" name="nom" value="<?= htmlspecialchars($agence['nom']) ?>" class="form-control d-inline w-auto">
                    <button type="submit" class="btn btn-sm btn-warning">Modifier</button>
                </form>
                <!-- Lien de suppression -->
                <a href="/klaxon/public/index.php/admin/agences/delete/<?= $agence['id'] ?>" 
                   class="btn btn-sm btn-danger"
                   onclick="return confirm('Supprimer cette agence ?')">
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