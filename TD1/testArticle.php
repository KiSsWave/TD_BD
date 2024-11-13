<?php

require_once __DIR__ . '/vendor/autoload.php';

use iutnc\hellokant\database\ConnectionFactory;
use iutnc\hellokant\model\Article;

$conf = parse_ini_file(__DIR__ . '/conf/db.conf.ini');
$pdo = ConnectionFactory::makeConnection($conf);


$article = new Article([
    'nom' => 'Monopoly',
    'descr' => 'Jeu de société en famille',
    'tarif' => 49.99,
    'id_categ' => 1
]);


$article->delete();
echo "Article supprimé avec l'ID : " . $article->id . "\n";

$article->insert();
echo "Article inséré avec l'ID : " . $article->id . "\n";
