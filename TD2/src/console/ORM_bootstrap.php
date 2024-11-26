<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;


$entity_path = [__DIR__ . '/../core/domain/entities/'];
$isDevMode=false;

$dbParams = parse_ini_file(__DIR__ . '/../../conf_td2/db.conf.ini');

$config = ORMSetup::createAttributeMetadataConfiguration($entity_path, $isDevMode);
$connection = DriverManager::getConnection($dbParams,$config);
$entityManager = new EntityManager($connection,$config);


return $entityManager;