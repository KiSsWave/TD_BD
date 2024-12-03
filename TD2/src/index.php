<?php


$entityManager = require_once __DIR__ . '/console/ORM_bootstrap.php';


$specialiteRepository = $entityManager->getRepository(core\domain\entities\Specialite::class);