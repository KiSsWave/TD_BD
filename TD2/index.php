<?php

require_once __DIR__ . '/vendor/autoload.php';
$entityManager = require_once __DIR__ . '/src/console/ORM_bootstrap.php';


$specialiteRepository = $entityManager->getRepository(iutnc\doktrine\core\domain\entities\Specialite::class);

echo '1';
