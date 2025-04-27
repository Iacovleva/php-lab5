<?php
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Recipe Book</title>
</head>
<body>
    <header>
        <h1>🍴 Recipe Book</h1>
        <nav>
            <a href="/?page=index">Главная</a>
            <a href="/?page=create">Добавить рецепт</a>
        </nav>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <p>&copy; 2025 Recipe Book</p>
    </footer>
</body>
</html>
