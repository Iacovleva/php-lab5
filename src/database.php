<?php
function getDatabaseConnection(): PDO {
    // Параметры подключения
    $host = 'localhost';
    $dbname = 'recipe_book'; // Убедись, что это имя твоей базы данных
    $username = 'root'; // Логин для доступа к MySQL (по умолчанию в XAMPP — 'root')
    $password = ''; // Пароль для MySQL (по умолчанию в XAMPP — пустой)

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $e) {
        die("Ошибка подключения к базе данных: " . $e->getMessage());
    }

    return $pdo;
}
