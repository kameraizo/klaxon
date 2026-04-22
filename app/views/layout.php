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

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- Nom de l'application à gauche -->
            <a class="navbar-brand" href="/klaxon/public/index.php">Touche Pas Au Klaxon</a>
            <div class="ms-auto">
                <!-- Bouton connexion à droite pour les visiteurs -->
                <a href="/klaxon/public/index.php/login" class="btn btn-light">Se connecter</a>
            </div>
        </div>
    </nav>

    <!-- Contenu de la page, sera remplacé par chaque vue -->
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