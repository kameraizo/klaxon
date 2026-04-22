<?php

/**
 * Contrôleur des trajets
 * Gère la création, modification et suppression des trajets
 */
class TrajetController
{
    /**
     * Affiche le formulaire de création d'un trajet
     * @return void
     */
    public function create(): void
    {
        // On vérifie que l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: /klaxon/public/index.php/login');
            exit;
        }

        // On récupère la liste des agences pour le formulaire
        $pdo = getDB();
        $agences = $pdo->query("SELECT * FROM agence ORDER BY nom ASC")->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../views/trajet_form.php';
    }

    /**
     * Traite le formulaire de création d'un trajet
     * @return void
     */
    public function store(): void
    {
        // On vérifie que l'utilisateur est connecté
        if (!isset($_SESSION['user'])) {
            header('Location: /klaxon/public/index.php/login');
            exit;
        }

        // On récupère les données du formulaire
        $agence_depart_id  = $_POST['agence_depart_id'] ?? '';
        $agence_arrivee_id = $_POST['agence_arrivee_id'] ?? '';
        $gdh_depart        = $_POST['gdh_depart'] ?? '';
        $gdh_arrivee       = $_POST['gdh_arrivee'] ?? '';
        $places_total      = $_POST['places_total'] ?? '';

        // Contrôles de cohérence
        $errors = [];

        if ($agence_depart_id === $agence_arrivee_id) {
            $errors[] = "L'agence de départ et d'arrivée doivent être différentes.";
        }

        if ($gdh_arrivee <= $gdh_depart) {
            $errors[] = "La date d'arrivée doit être après la date de départ.";
        }

        if ($places_total < 1) {
            $errors[] = "Le nombre de places doit être supérieur à 0.";
        }

        // Si erreurs on réaffiche le formulaire
        if (!empty($errors)) {
            $pdo = getDB();
            $agences = $pdo->query("SELECT * FROM agence ORDER BY nom ASC")->fetchAll(PDO::FETCH_ASSOC);
            require_once __DIR__ . '/../views/trajet_form.php';
            return;
        }

        // On insère le trajet en BDD
        $pdo = getDB();
        $stmt = $pdo->prepare("
            INSERT INTO trajet (agence_depart_id, agence_arrivee_id, utilisateur_id, gdh_depart, gdh_arrivee, places_total, places_dispo)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $agence_depart_id,
            $agence_arrivee_id,
            $_SESSION['user']['id'],
            $gdh_depart,
            $gdh_arrivee,
            $places_total,
            $places_total // Au départ toutes les places sont disponibles
        ]);

        // Message flash pour confirmer la création
        $_SESSION['flash'] = "Trajet créé avec succès !";
        header('Location: /klaxon/public/index.php');
        exit;
    }
}