<?php
// bootstrap.php - Configuration de Doctrine
$entityManager = require_once __DIR__ . '/console/ORM_bootstrap.php';

use iutnc\doctrine\src\core\domain\entities\Praticien;
use iutnc\doctrine\src\core\domain\entities\Specialite;
use iutnc\doctrine\src\core\domain\entities\Type_Groupement;

$specialiteRepository = $entityManager->getRepository(Specialite::class);


$specialite = $specialiteRepository->find(1);
echo "ID: " . $specialite->getId() . "\n";

