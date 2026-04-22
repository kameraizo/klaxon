<?php

/**
 * Contrôleur d'authentification
 * Gère la connexion et la déconnexion des utilisateurs
 */
class AuthController
{
    /**
     * Affiche le formulaire de connexion
     * @return void
     */
    public function loginForm(): void
    {
        require_once __DIR__ . '/../views/login.php';
    }

    /**
     * Traite le formulaire de connexion
     * Vérifie les identifiants et crée la session
     * @return void
     */
    public function login(): void
    {
        // On récupère les données du formulaire envoyées en POST
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // On cherche l'utilisateur par son email en BDD
        $pdo = getDB();
        $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // On vérifie que l'utilisateur existe et que le mot de passe est correct
        if ($user && password_verify($password, $user['mot_de_passe'])) {
            // On démarre la session et on stocke les infos de l'utilisateur
            session_start();
            $_SESSION['user'] = $user;

            // On redirige vers la page d'accueil
            header('Location: /klaxon/public/index.php');
            exit;
        }

        // Si les identifiants sont incorrects on réaffiche le formulaire avec une erreur
        $error = 'Email ou mot de passe incorrect';
        require_once __DIR__ . '/../views/login.php';
    }

    /**
     * Déconnecte l'utilisateur et détruit la session
     * @return void
     */
    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /klaxon/public/index.php');
        exit;
    }
}