<?php
// bootstrap.php - Configuration de Doctrine
require_once "../vendor/autoload.php";
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use iutnc\doktrine\core\domain\entities\Specialite;
use iutnc\doktrine\core\domain\entities\Type_Groupement;

// Charger les paramètres de connexion depuis le fichier ini
$configFile = parse_ini_file(__DIR__ . '/../conf_td2/db.conf.ini');


// Configuration de Doctrine
$isDevMode = true;
$entity_path = [__DIR__ . '/../core/domain/entities/'];
$config = Setup::createAttributeMetadataConfiguration($entity_path, $isDevMode);
$conn = [
    'dbname' => $configFile['dbname'],
    'user' => $configFile['username'],
    'password' => $configFile['password'],
    'host' => $configFile['host'],
    'driver' => 'pdo_' . $configFile['driver'],
    'port' => $configFile['port'],
];
$entityManager = EntityManager::create($conn, $config);

// Exercice 1 : Utilisation élémentaire

// 1. Afficher la spécialité d'identifiant 1
$specialite = $entityManager->find(Specialite::class, 1);
if ($specialite) {
    echo sprintf("ID: %s, Libellé: %s, Description: %s\n", $specialite->getId(), $specialite->getLibelle(), $specialite->getDescription());
} else {
    echo "Spécialité introuvable.\n";
}

// 2. Afficher le type de groupement n°1
$typeGroupement = $entityManager->find(Type_Groupement::class, 1);
if ($typeGroupement) {
    echo sprintf("ID: %s, Libellé: %s, Description: %s\n", $typeGroupement->getId(), $typeGroupement->getLibelle(), $typeGroupement->getDescription());
} else {
    echo "Type de groupement introuvable.\n";
}

// 3. Afficher le praticien avec un id spécifique
$praticienId = '8ae1400f-d46d-3b50-b356-269f776be532';
$praticien = $entityManager->find(Praticien::class, $praticienId);
if ($praticien) {
    echo sprintf(
        "ID: %s, Nom: %s, Prénom: %s, Ville: %s, Email: %s, Téléphone: %s\n",
        $praticien->getId(),
        $praticien->getNom(),
        $praticien->getPrenom(),
        $praticien->getVille(),
        $praticien->getEmail(),
        $praticien->getTelephone()
    );

    // 4. Compléter avec la spécialité et le groupement
    $specialite = $praticien->getSpecialite();
    $groupement = $praticien->getGroupement();
    echo sprintf(
        "Spécialité: %s (%s), Groupement: %s (%s)\n",
        $specialite->getLibelle(),
        $specialite->getDescription(),
        $groupement->getNom(),
        $groupement->getAdresse()
    );
} else {
    echo "Praticien introuvable.\n";
}

// 5. Créer un praticien
$specialitePediatrie = $entityManager->getRepository(Specialite::class)->findOneBy(['libelle' => 'pédiatrie']);
if ($specialitePediatrie) {
    $newPraticien = new Praticien();
    $newPraticien->setNom('Dupont');
    $newPraticien->setPrenom('Jean');
    $newPraticien->setVille('Nancy');
    $newPraticien->setEmail('jean.dupont@example.com');
    $newPraticien->setTelephone('0600000000');
    $newPraticien->setSpecialite($specialitePediatrie);

    $entityManager->persist($newPraticien);
    $entityManager->flush();
    echo "Praticien créé avec succès.\n";
} else {
    echo "Spécialité pédiatrie introuvable.\n";
}

// 6. Modifier le praticien
$groupementBigot = $entityManager->getRepository(Groupement::class)->findOneBy(['nom' => 'Bigot']);
if ($newPraticien && $groupementBigot) {
    $newPraticien->setGroupement($groupementBigot);
    $newPraticien->setVille('Paris');

    $entityManager->flush();
    echo "Praticien modifié avec succès.\n";
} else {
    echo "Erreur lors de la modification du praticien.\n";
}

// 7. Supprimer le praticien
if ($newPraticien) {
    $entityManager->remove($newPraticien);
    $entityManager->flush();
    echo "Praticien supprimé avec succès.\n";
} else {
    echo "Praticien introuvable pour suppression.\n";
}
