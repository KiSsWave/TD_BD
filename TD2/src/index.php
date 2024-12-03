<?php


$entityManager = require_once __DIR__ . '/console/ORM_bootstrap.php';


$specialiteRepository = $entityManager->getRepository(iutnc\doktrine\core\domain\entities\Specialite::class);

