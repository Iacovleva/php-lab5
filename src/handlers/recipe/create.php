<?php

declare(strict_types=1);
require_once __DIR__ . '/../../db.php';

$pdo = getPDO();

$data = [
    'title' => trim($_POST['title'] ?? ''),
    'category' => (int) ($_POST['category'] ?? 0),
    'ingredients' => trim($_POST['ingredients'] ?? ''),
    'description' => trim($_POST['description'] ?? ''),
    'tags' => isset($_POST['tags']) ? implode(',', $_POST['tags']) : '',
    'steps' => trim($_POST['steps'] ?? ''),
];

$errors = [];

if ($data['title'] === '') {
    $errors['title'] = 'Название обязательно';
}
if ($data['ingredients'] === '') {
    $errors['ingredients'] = 'Ингредиенты обязательны';
}
if ($data['description'] === '') {
    $errors['description'] = 'Описание обязательно';
}

if ($errors) {
    echo "<h2>Ошибки:</h2><ul>";
    foreach ($errors as $e) {
        echo "<li>$e</li>";
    }
    echo "</ul><a href='/recipe-book/public/recipe/create.php'>Назад</a>";
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO recipes (title, category, ingredients, description, tags, steps)
    VALUES (:title, :category, :ingredients, :description, :tags, :steps)
");

$stmt->execute([
    ':title' => $data['title'],
    ':category' => $data['category'],
    ':ingredients' => $data['ingredients'],
    ':description' => $data['description'],
    ':tags' => $data['tags'],
    ':steps' => $data['steps'],
]);

echo "✅ Рецепт добавлен! <a href='/recipe-book/public/recipe/create.php'>Добавить ещё</a>";
