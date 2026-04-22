<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touche Pas Au Klaxon</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Header qui change selon le rôle de l'utilisateur -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Nom de l'application à gauche -->
            <a class="navbar-brand" href="/klaxon/public/index.php">Touche Pas Au Klaxon</a>
            <div class="ms-auto">
                <?php if (isset($_SESSION['user'])): ?>
                    <?php if ($_SESSION['user']['est_admin']): ?>
                        <!-- Menu admin -->
                        <a href="/klaxon/public/index.php/admin/users" class="btn btn-light me-2">Utilisateurs</a>
                        <a href="/klaxon/public/index.php/admin/agences" class="btn btn-light me-2">Agences</a>
                        <a href="/klaxon/public/index.php/admin/trajets" class="btn btn-light me-2">Trajets</a>
                    <?php else: ?>
                        <!-- Menu employé connecté -->
                        <a href="/klaxon/public/index.php/trajets/create" class="btn btn-light me-2">Proposer un trajet</a>
                        <span class="text-white me-2"><?= htmlspecialchars($_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']) ?></span>
                    <?php endif; ?>
                    <!-- Bouton déconnexion pour tous les utilisateurs connectés -->
                    <a href="/klaxon/public/index.php/logout" class="btn btn-danger">Se déconnecter</a>
                <?php else: ?>
                    <!-- Visiteur non connecté -->
                    <a href="/klaxon/public/index.php/login" class="btn btn-light">Se connecter</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Contenu de la page -->
    <main class="container mt-4">
        <?= $content ?>
    </main>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 bg-dark text-white">
        <p>Touche Pas Au Klaxon &copy; <?= date('Y') ?></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>