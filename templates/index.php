<?php

// Подключение файла database.php
require_once 'C:/xampp/htdocs/recipe-book/src/database.php';

// Получаем подключение к базе данных
$pdo = getDatabaseConnection();

// Выполняем запрос для получения списка рецептов
$query = $pdo->query("SELECT * FROM recipes ORDER BY created_at DESC LIMIT 5");
$recipes = $query->fetchAll();

// Начинаем буферизацию вывода для создания HTML-шаблона
ob_start();
?>
<h2>Последние рецепты</h2>
<ul>
    <?php foreach ($recipes as $recipe): ?>
        <li>
            <h3><?= htmlspecialchars($recipe['title']) ?></h3>
            <p><?= htmlspecialchars($recipe['description']) ?></p>
            <a href="/?page=recipe&id=<?= $recipe['id'] ?>">Подробнее</a>
        </li>
    <?php endforeach; ?>
</ul>
<?php
// Завершаем буферизацию и сохраняем вывод в переменной $content
$content = ob_get_clean();

// Подключаем общий шаблон layout.php, чтобы вывести всю страницу
require_once 'C:/xampp/htdocs/recipe-book/templates/layout.php';
