<?php


use iutnc\hellokant\database\ConnectionFactory;

$conf = parse_ini_file('conf/db.conf.ini');


ConnectionFactory::makeConnection($conf);


$pdo = ConnectionFactory::getConnection();
