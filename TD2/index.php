<?php

require_once __DIR__ . '/vendor/autoload.php';
$entityManager = require_once __DIR__ . '/src/console/ORM_bootstrap.php';


$specialiteRepository = $entityManager->getRepository(iutnc\doctrine\src\core\domain\entities\Specialite::class);

echo '1';
