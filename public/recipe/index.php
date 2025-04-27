<?php
// Читаем данные из файла с рецептами
$recipesFile = __DIR__ . '/../../storage/recipes.txt';
if (!file_exists($recipesFile)) {
    die('Файл с рецептами не найден.');
}

// Преобразуем строки JSON в массив рецептов
$recipes = array_map('json_decode', file($recipesFile, FILE_IGNORE_NEW_LINES));

// Начинаем буферизацию вывода для шаблона
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список рецептов</title>
</head>
<body>
    <h1>Все рецепты</h1>
    <ul>
        <?php foreach ($recipes as $recipe): ?>
            <li>
                <h2><?= htmlspecialchars($recipe->title) ?></h2>
                <p><?= htmlspecialchars($recipe->description) ?></p>
                <p><strong>Категория:</strong> <?= htmlspecialchars($recipe->category) ?></p>
                <a href="/public/recipe/show.php?id=<?= urlencode($recipe->id) ?>">Подробнее</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php
// Завершаем буферизацию и выводим содержимое
ob_end_flush();
