<?php

function getPDO(): PDO
{
    $config = require __DIR__ . '/../config/db.php';

    $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    ];

    return new PDO($dsn, $config['user'], $config['password'], $options);
}
