<?php
require_once __DIR__ . '/../../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if (!$id) {
        die("ID рецепта обязателен для удаления!");
    }

    $pdo = getDatabaseConnection();
    $stmt = $pdo->prepare("DELETE FROM recipes WHERE id = :id");
    $stmt->execute(['id' => $id]);

    header("Location: /?page=index");
    exit;
}
