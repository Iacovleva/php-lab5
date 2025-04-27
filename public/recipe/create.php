<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить рецепт</title>
</head>
<body>
    <h1>Добавить рецепт</h1>
    <form action="/src/handlers/recipe/create.php" method="POST">
        <!-- Название рецепта -->
        <label for="title">Название рецепта:</label>
        <input type="text" id="title" name="title" required>
        <br><br>

        <!-- Категория рецепта -->
        <label for="category">Категория:</label>
        <select id="category" name="category" required>
            <option value="Завтрак">Завтрак</option>
            <option value="Обед">Обед</option>
            <option value="Ужин">Ужин</option>
            <option value="Десерт">Десерт</option>
        </select>
        <br><br>

        <!-- Ингредиенты -->
        <label for="ingredients">Ингредиенты:</label>
        <textarea id="ingredients" name="ingredients" rows="5" required></textarea>
        <br><br>

        <!-- Описание -->
        <label for="description">Описание рецепта:</label>
        <textarea id="description" name="description" rows="5" required></textarea>
        <br><br>

        <!-- Тэги -->
        <label for="tags">Тэги:</label>
        <select id="tags" name="tags[]" multiple>
            <option value="Вегетарианское">Вегетарианское</option>
            <option value="Диетическое">Диетическое</option>
            <option value="Сладкое">Сладкое</option>
            <option value="Острое">Острое</option>
        </select>
        <br><br>

        <!-- Шаги приготовления -->
        <label for="steps">Шаги приготовления:</label>
        <textarea id="steps" name="steps" rows="5" required></textarea>
        <br><br>

        <!-- Кнопка отправки -->
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
