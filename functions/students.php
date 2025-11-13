<?php

declare(strict_types=1);

require_once __DIR__ . '/db.php';

/**
 * Retourne toutes les promotions.
 *
 * @return array<int, array<string, mixed>>
 */
function getPromotions(): array
{
    global $db;

    $query = $db->query('SELECT id_promotion, nom_promotion, faculte, departement FROM promotion ORDER BY nom_promotion ASC');
    return $query->fetchAll() ?: [];
}

/**
 * Crée un nouvel étudiant.
 */
function createStudent(string $nom, string $prenom, int $idPromotion, string $matricule, string $dateNaissance): bool
{
    global $db;

    $sql = 'INSERT INTO etudiant (nom_etudiant, prenom_etudiant, matricule_etudiant, date_naissance_etudiant, id_promotion, created)
            VALUES (:nom, :prenom, :matricule, :date_naissance, :id_promotion, NOW())';

    $statement = $db->prepare($sql);

    return $statement->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'matricule' => $matricule,
        'date_naissance' => $dateNaissance,
        'id_promotion' => $idPromotion,
    ]);
}

/**
 * Retourne la liste des étudiants avec leur promotion.
 *
 * @return array<int, array<string, mixed>>
 */
function getStudents(): array
{
    global $db;

    $sql = 'SELECT e.id_etudiant,
                   e.nom_etudiant,
                   e.prenom_etudiant,
                   e.matricule_etudiant,
                   e.date_naissance_etudiant,
                   p.nom_promotion,
                   p.faculte,
                   p.departement
            FROM etudiant e
            LEFT JOIN promotion p ON p.id_promotion = e.id_promotion
            ORDER BY e.created DESC';

    $statement = $db->query($sql);
    return $statement->fetchAll() ?: [];
}

/**
 * Retourne un étudiant en particulier.
 *
 * @return array<string, mixed>|null
 */
function getStudentById(int $id): ?array
{
    global $db;

    $sql = 'SELECT e.id_etudiant,
                   e.nom_etudiant,
                   e.prenom_etudiant,
                   e.matricule_etudiant,
                   e.date_naissance_etudiant,
                   e.id_promotion,
                   p.nom_promotion,
                   p.faculte,
                   p.departement
            FROM etudiant e
            LEFT JOIN promotion p ON p.id_promotion = e.id_promotion
            WHERE e.id_etudiant = :id';

    $statement = $db->prepare($sql);
    $statement->execute(['id' => $id]);
    $student = $statement->fetch();

    return $student ?: null;
}

/**
 * Met à jour un étudiant existant.
 */
function updateStudent(int $id, string $nom, string $prenom, int $idPromotion, string $matricule, string $dateNaissance): bool
{
    global $db;

    $sql = 'UPDATE etudiant
            SET nom_etudiant = :nom,
                prenom_etudiant = :prenom,
                id_promotion = :id_promotion,
                matricule_etudiant = :matricule,
                date_naissance_etudiant = :date_naissance,
                updated = NOW()
            WHERE id_etudiant = :id';

    $statement = $db->prepare($sql);

    return $statement->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'id_promotion' => $idPromotion,
        'matricule' => $matricule,
        'date_naissance' => $dateNaissance,
        'id' => $id,
    ]);
}

/**
 * Supprime un étudiant.
 */
function deleteStudent(int $id): bool
{
    global $db;

    $statement = $db->prepare('DELETE FROM etudiant WHERE id_etudiant = :id');
    return $statement->execute(['id' => $id]);
}

/**
 * Retourne le nombre d'étudiants.
 */
function getStudentCount(): int
{
    global $db;

    $statement = $db->query('SELECT COUNT(*) as total FROM etudiant');
    $result = $statement->fetch();

    return (int) ($result['total'] ?? 0);
}
