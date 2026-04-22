<?php

/**
 * Contrôleur de la page d'accueil
 * Gère l'affichage de la liste des trajets disponibles
 */
class HomeController
{
    /**
     * Affiche la page d'accueil avec la liste des trajets
     * @return void
     */
    public function index(): void
    {
        // On récupère la connexion à la base de données
        $pdo = getDB();

        // On récupère uniquement les trajets futurs avec des places disponibles
        // triés par date de départ croissante comme demandé dans le brief
        $stmt = $pdo->query("
            SELECT t.*, 
                   a1.nom AS agence_depart, 
                   a2.nom AS agence_arrivee
            FROM trajet t
            JOIN agence a1 ON t.agence_depart_id = a1.id
            JOIN agence a2 ON t.agence_arrivee_id = a2.id
            WHERE t.places_dispo > 0
            AND t.gdh_depart > NOW()
            ORDER BY t.gdh_depart ASC
        ");

        $trajets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // On passe les trajets à la vue pour les afficher
        require_once __DIR__ . '/../views/home.php';
    }
}