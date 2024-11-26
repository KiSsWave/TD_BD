<?php

function convertMySQLtoPostgreSQL($mysqlFile, $postgresFile) {
    // Lire le fichier MySQL
    $mysqlSQL = file_get_contents($mysqlFile);

    // Remplacer les parties spécifiques à MySQL par celles de PostgreSQL
    $postgresSQL = $mysqlSQL;

    // Supprimer `ENGINE=InnoDB` et autres directives spécifiques à MySQL
    $postgresSQL = preg_replace('/ENGINE=InnoDB/', '', $postgresSQL);

    // Remplacer les backticks (`) par rien, PostgreSQL ne les utilise pas
    $postgresSQL = preg_replace('/`/', '', $postgresSQL);

    // Remplacer SERIAL=151 par SERIAL tout court (les séquences sont automatiques en PostgreSQL)
    $postgresSQL = preg_replace('/SERIAL=\d+/', 'SERIAL', $postgresSQL);

    // Remplacer les types de données
    $postgresSQL = preg_replace('/int\((\d+)\)/', 'INTEGER', $postgresSQL);
    $postgresSQL = preg_replace('/tinyint/', 'SMALLINT', $postgresSQL);
    $postgresSQL = preg_replace('/datetime/', 'TIMESTAMP', $postgresSQL);
    $postgresSQL = preg_replace('/text/', 'TEXT', $postgresSQL);
    $postgresSQL = preg_replace('/varchar\((\d+)\)/', 'TEXT', $postgresSQL);  // PostgreSQL n'a pas de taille fixe pour VARCHAR
    $postgresSQL = preg_replace('/decimal\((\d+),(\d+)\)/', 'NUMERIC($1, $2)', $postgresSQL);

    // Corriger les apostrophes malformées dans les INSERT INTO
    $postgresSQL = preg_replace_callback('/\'([^\']*?)(?<!\\\\)\'/', function($matches) {
        // Échapper les apostrophes dans les valeurs insérées
        return "'" . addslashes($matches[0]) . "'";
    }, $postgresSQL);

    // Corriger les chaînes de texte en rajoutant les guillemets simples correctement dans les INSERT
    $postgresSQL = preg_replace_callback('/\'([^\']*)\'/', function($matches) {
        // Remplacer les chaînes de texte qui contiennent des guillemets mal placés
        return "'" . str_replace("'", "''", $matches[0]) . "'";
    }, $postgresSQL);

    // Sauvegarder le fichier PostgreSQL
    file_put_contents($postgresFile, $postgresSQL);

    echo "Conversion terminée. Fichier PostgreSQL sauvegardé dans $postgresFile";
}

// Usage
$mysqlFile = 'commande.sql';  // Chemin du fichier MySQL
$postgresFile = 'postgres_dump.sql';  // Chemin de sortie pour PostgreSQL

convertMySQLtoPostgreSQL($mysqlFile, $postgresFile);
