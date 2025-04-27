<?php
// Основной код маршрутизации
require_once 'C:/xampp/htdocs/recipe-book/src/database.php';


$page = $_GET['page'] ?? 'index';

switch ($page) {
    case 'index':
        require __DIR__ . '/../templates/index.php';
        break;
    case 'create':
        require __DIR__ . '/../templates/recipe/create.php';
        break;
    case 'recipe':
        require __DIR__ . '/../templates/recipe/show.php';
        break;
    default:
        echo "404 - Страница не найдена!";
        break;
}
