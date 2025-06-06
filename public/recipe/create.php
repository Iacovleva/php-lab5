<?php
require_once __DIR__ . '/../../src/db.php';

$pdo = getPDO();
$categories = $pdo->query("SELECT id, name FROM categories ORDER BY name")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление рецепта</title>
</head>
<body>
    <h1>Добавить рецепт</h1>
    <form method="post" action="/recipe-book/src/handlers/recipe/create.php">
        <label>Название:<br>
            <input type="text" name="title" required>
        </label><br><br>

        <label>Категория:<br>
            <select name="category" required>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat->id ?>"><?= htmlspecialchars($cat->name) ?></option>
                <?php endforeach; ?>
            </select>
        </label><br><br>

        <label>Ингредиенты:<br>
            <textarea name="ingredients" required></textarea>
        </label><br><br>

        <label>Описание:<br>
            <textarea name="description" required></textarea>
        </label><br><br>

        <label>Теги:<br>
            <select name="tags[]" multiple>
                <option value="вегетарианское">Вегетарианское</option>
                <option value="быстро">Быстро</option>
                <option value="острое">Острое</option>
            </select>
        </label><br><br>

        <label>Шаги приготовления:<br>
            <textarea name="steps"></textarea>
        </label><br><br>

        <button type="submit">Сохранить</button>
    </form>
</body>
</html>
