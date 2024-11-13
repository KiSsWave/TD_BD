<?php

namespace iutnc\hellokant\database;

use PDO;
use PDOException;

class ConnectionFactory
{
    private static ?PDO $pdo = null;


    public static function makeConnection(array $conf): PDO
    {
        if (self::$pdo === null) {
            try {
                $dsn = "{$conf['driver']}:host={$conf['host']};dbname={$conf['dbname']};";
                self::$pdo = new PDO($dsn, $conf['username'], $conf['password']);
            } catch (PDOException $e) {
                throw new PDOException("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }


    public static function getConnection(): ?PDO
    {
        return self::$pdo;
    }
}

