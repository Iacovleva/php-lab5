<?php
echo "Обработчик доступен!";

// Указываем путь к файлу хранения рецептов
$recipesFile = __DIR__ . '/../../../storage/recipes.txt';

// Проверяем, что запрос пришёл методом POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Неподдерживаемый метод запроса.');
}

// Получаем данные из формы
$title = trim($_POST['title']);
$category = trim($_POST['category']);
$ingredients = trim($_POST['ingredients']);
$description = trim($_POST['description']);
$tags = isset($_POST['tags']) ? $_POST['tags'] : [];
$steps = trim($_POST['steps']);

// Валидация данных
$errors = [];
if (empty($title)) $errors['title'] = 'Название рецепта обязательно.';
if (empty($category)) $errors['category'] = 'Категория обязательна.';
if (empty($ingredients)) $errors['ingredients'] = 'Ингредиенты обязательны.';
if (empty($description)) $errors['description'] = 'Описание обязательно.';
if (empty($steps)) $errors['steps'] = 'Шаги приготовления обязательны.';

// Если есть ошибки, возвращаем их обратно в форму
if (!empty($errors)) {
    session_start();
    $_SESSION['errors'] = $errors;
    header('Location: /public/recipe/create.php');
    exit;
}

// Формируем массив данных рецепта
$recipe = [
    'id' => uniqid(),
    'title' => $title,
    'category' => $category,
    'ingredients' => $ingredients,
    'description' => $description,
    'tags' => $tags,
    'steps' => $steps,
    'created_at' => date('Y-m-d H:i:s'),
];

// Сохраняем рецепт в файл
file_put_contents($recipesFile, json_encode($recipe) . PHP_EOL, FILE_APPEND);

// Перенаправляем на главную страницу после успешного сохранения
header('Location: /public/index.php');
exit;
