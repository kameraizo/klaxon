<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../config/database.php';

/**
 * Tests unitaires pour les opérations d'écriture sur les trajets
 */
class TrajetTest extends TestCase
{
    private \PDO $pdo;

    /**
     * Initialisation avant chaque test
     * On récupère la connexion BDD
     */
    protected function setUp(): void
    {
        $this->pdo = getDB();
    }

    /**
     * Test de création d'un trajet en BDD
     */
    public function testCreerTrajet(): void
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO trajet (agence_depart_id, agence_arrivee_id, utilisateur_id, gdh_depart, gdh_arrivee, places_total, places_dispo)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        $result = $stmt->execute([1, 2, 1, '2026-12-01 08:00:00', '2026-12-01 10:00:00', 4, 4]);

        // On vérifie que l'insertion a réussi
        $this->assertTrue($result);

        // On récupère l'id du trajet créé pour le supprimer après le test
        $this->lastInsertId = $this->pdo->lastInsertId();
    }

    /**
     * Test de modification d'un trajet en BDD
     */
    public function testModifierTrajet(): void
    {
        // On crée d'abord un trajet
        $stmt = $this->pdo->prepare("
            INSERT INTO trajet (agence_depart_id, agence_arrivee_id, utilisateur_id, gdh_depart, gdh_arrivee, places_total, places_dispo)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([1, 2, 1, '2026-12-01 08:00:00', '2026-12-01 10:00:00', 4, 4]);
        $id = $this->pdo->lastInsertId();

        // On modifie le trajet
        $stmt = $this->pdo->prepare("UPDATE trajet SET places_total = ? WHERE id = ?");
        $result = $stmt->execute([3, $id]);

        // On vérifie que la modification a réussi
        $this->assertTrue($result);

        // Nettoyage
        $this->pdo->prepare("DELETE FROM trajet WHERE id = ?")->execute([$id]);
    }

    /**
     * Test de suppression d'un trajet en BDD
     */
    public function testSupprimerTrajet(): void
    {
        // On crée d'abord un trajet
        $stmt = $this->pdo->prepare("
            INSERT INTO trajet (agence_depart_id, agence_arrivee_id, utilisateur_id, gdh_depart, gdh_arrivee, places_total, places_dispo)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([1, 2, 1, '2026-12-01 08:00:00', '2026-12-01 10:00:00', 4, 4]);
        $id = $this->pdo->lastInsertId();

        // On supprime le trajet
        $stmt = $this->pdo->prepare("DELETE FROM trajet WHERE id = ?");
        $result = $stmt->execute([$id]);

        // On vérifie que la suppression a réussi
        $this->assertTrue($result);

        // On vérifie que le trajet n'existe plus
        $stmt = $this->pdo->prepare("SELECT * FROM trajet WHERE id = ?");
        $stmt->execute([$id]);
        $this->assertFalse($stmt->fetch());
    }
}
