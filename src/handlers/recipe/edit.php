<?php
require_once __DIR__ . '/../../db.php';

$pdo = getDatabaseConnection();
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID рецепта обязателен!");
}

// Получение текущего рецепта для редактирования
$query = $pdo->prepare("SELECT * FROM recipes WHERE id = :id");
$query->execute(['id' => $id]);
$recipe = $query->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    if (empty($title) || empty($description)) {
        die("Название и описание обязательны!");
    }

    $stmt = $pdo->prepare("UPDATE recipes SET title = :title, description = :description WHERE id = :id");
    $stmt->execute(['title' => $title, 'description' => $description, 'id' => $id]);

    header("Location: /?page=index");
    exit;
}
