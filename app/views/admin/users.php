<?php
/** @var array<int, array<string, mixed>> $users */
ob_start();
?>

<h1 class="mb-4">Liste des utilisateurs</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Admin</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['nom']) ?></td>
            <td><?= htmlspecialchars($user['prenom']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['telephone']) ?></td>
            <td><?= $user['est_admin'] ? 'Oui' : 'Non' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/../layout.php';
?>