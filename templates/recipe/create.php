<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../src/db.php';

    $pdo = getDatabaseConnection();

    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    $stmt = $pdo->prepare("INSERT INTO recipes (title, description, category) VALUES (?, ?, 1)");
    $stmt->execute([$title, $description]);

    header("Location: /?page=index");
    exit;
}

ob_start();
?>
<h2>Добавить новый рецепт</h2>
<form method="post">
    <label for="title">Название</label>
    <input type="text" name="title" id="title" required>
    
    <label for="description">Описание</label>
    <textarea name="description" id="description" required></textarea>
    
    <button type="submit">Сохранить</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
