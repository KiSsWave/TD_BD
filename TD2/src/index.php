<?php


$entityManager = require_once __DIR__ . '/console/ORM_bootstrap.php';


$specialiteRepository = $entityManager->getRepository(iutnc\doktrine\core\domain\entities\Specialite::class);



if ($specialite) {
    // Afficher les informations de la spécialité
    echo "ID: " . $specialite->getId() . "\n";
    echo "Libellé: " . $specialite->getLibelle() . "\n";
    echo "Description: " . $specialite->getDescription() . "\n";
} else {
    echo "Spécialité avec l'ID 1 non trouvée.\n";
}