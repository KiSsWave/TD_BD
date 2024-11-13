<?php

require_once __DIR__ . '/vendor/autoload.php';

use iutnc\hellokant\database\ConnectionFactory;

$conf = parse_ini_file(__DIR__ . '/conf/db.conf.ini');
$pdo = ConnectionFactory::makeConnection($conf);


