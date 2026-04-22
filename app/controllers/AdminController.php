<?php

/**
 * Contrôleur du tableau de bord administrateur
 * Gère les utilisateurs, agences et trajets
 */
class AdminController
{
    /**
     * Vérifie que l'utilisateur est bien un admin
     * Redirige vers l'accueil si ce n'est pas le cas
     * @return void
     */
    private function checkAdmin(): void
    {
        if (!isset($_SESSION['user']) || !$_SESSION['user']['est_admin']) {
            header('Location: /klaxon/public/index.php');
            exit;
        }
    }

    /**
     * Liste tous les utilisateurs
     * @return void
     */
    public function users(): void
    {
        $this->checkAdmin();
        $pdo = getDB();
        $users = $pdo->query("SELECT * FROM utilisateur ORDER BY nom ASC")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/admin/users.php';
    }

    /**
     * Liste toutes les agences
     * @return void
     */
    public function agences(): void
    {
        $this->checkAdmin();
        $pdo = getDB();
        $agences = $pdo->query("SELECT * FROM agence ORDER BY nom ASC")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/admin/agences.php';
    }

    /**
     * Crée une nouvelle agence
     * @return void
     */
    public function agenceStore(): void
    {
        $this->checkAdmin();
        $nom = $_POST['nom'] ?? '';

        if (!empty($nom)) {
            $pdo = getDB();
            $stmt = $pdo->prepare("INSERT INTO agence (nom) VALUES (?)");
            $stmt->execute([$nom]);
            $_SESSION['flash'] = "Agence créée avec succès !";
        }

        header('Location: /klaxon/public/index.php/admin/agences');
        exit;
    }

    /**
     * Modifie une agence
     * @param int $id
     * @return void
     */
    public function agenceUpdate(int $id): void
    {
        $this->checkAdmin();
        $nom = $_POST['nom'] ?? '';

        if (!empty($nom)) {
            $pdo = getDB();
            $stmt = $pdo->prepare("UPDATE agence SET nom = ? WHERE id = ?");
            $stmt->execute([$nom, $id]);
            $_SESSION['flash'] = "Agence modifiée avec succès !";
        }

        header('Location: /klaxon/public/index.php/admin/agences');
        exit;
    }

    /**
     * Supprime une agence
     * @param int $id
     * @return void
     */
    public function agenceDelete(int $id): void
    {
        $this->checkAdmin();
        $pdo = getDB();
        $stmt = $pdo->prepare("DELETE FROM agence WHERE id = ?");
        $stmt->execute([$id]);
        $_SESSION['flash'] = "Agence supprimée avec succès !";
        header('Location: /klaxon/public/index.php/admin/agences');
        exit;
    }

    /**
     * Liste tous les trajets
     * @return void
     */
    public function trajets(): void
    {
        $this->checkAdmin();
        $pdo = getDB();
        $trajets = $pdo->query("
            SELECT t.*, 
                   a1.nom AS agence_depart, 
                   a2.nom AS agence_arrivee,
                   u.nom AS conducteur_nom,
                   u.prenom AS conducteur_prenom
            FROM trajet t
            JOIN agence a1 ON t.agence_depart_id = a1.id
            JOIN agence a2 ON t.agence_arrivee_id = a2.id
            JOIN utilisateur u ON t.utilisateur_id = u.id
            ORDER BY t.gdh_depart ASC
        ")->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../views/admin/trajets.php';
    }

    /**
     * Supprime un trajet (admin)
     * @param int $id
     * @return void
     */
    public function trajetDelete(int $id): void
    {
        $this->checkAdmin();
        $pdo = getDB();
        $stmt = $pdo->prepare("DELETE FROM trajet WHERE id = ?");
        $stmt->execute([$id]);
        $_SESSION['flash'] = "Trajet supprimé avec succès !";
        header('Location: /klaxon/public/index.php/admin/trajets');
        exit;
    }
}