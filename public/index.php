<?php
require_once __DIR__ . '/../src/db.php';

$pdo = getPDO();

$query = "
SELECT recipes.*, categories.name AS category_name
FROM recipes
JOIN categories ON recipes.category = categories.id
ORDER BY created_at DESC
LIMIT 10
";

$recipes = $pdo->query($query)->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Каталог рецептов</title>
</head>
<body>
    <h1>Последние рецепты</h1>

    <?php if (empty($recipes)): ?>
        <p>Нет рецептов.</p>
    <?php else: ?>
        <?php foreach ($recipes as $recipe): ?>
            <div style="border:1px solid #ccc; padding:15px; margin-bottom:10px;">
                <h2><?= htmlspecialchars($recipe->title) ?></h2>
                <strong>Категория:</strong> <?= htmlspecialchars($recipe->category_name) ?><br>
                <strong>Ингредиенты:</strong> <?= nl2br(htmlspecialchars($recipe->ingredients)) ?><br>
                <strong>Описание:</strong> <?= nl2br(htmlspecialchars($recipe->description)) ?><br>
                <strong>Теги:</strong> <?= htmlspecialchars($recipe->tags) ?><br>
                <strong>Шаги:</strong> <?= nl2br(htmlspecialchars($recipe->steps)) ?><br>
                <small>Добавлен: <?= $recipe->created_at ?></small>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
