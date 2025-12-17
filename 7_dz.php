<?php
require __DIR__ . '/vendor/autoload.php';

// --------------------------
// XSS-фільтр (ввід з форми)
// --------------------------
function clean(string $value): string
{
    return trim(strip_tags($value));
}

// --------------------------
// PDO: параметризований запит
// --------------------------
function saveUser(string $email, string $passwordHash): void
{
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=test;charset=utf8mb4',
            'myuser',        // ← ВКАЖИ СВІЙ ЛОГІН
            'mypassword',    // ← ВКАЖИ СВІЙ ПАРОЛЬ
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

        $stmt = $pdo->prepare(
            'INSERT INTO users (email, password)
             VALUES (:email, :password)'
        );

        $stmt->execute([
            ':email'    => $email,
            ':password' => $passwordHash
        ]);

    } catch (PDOException $e) {
        // Для навчального прикладу — не валимо додаток
        // error_log($e->getMessage());
    }
}

// --------------------------
// Обробка форми
// --------------------------
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = clean($_POST['email'] ?? '');
    $password = clean($_POST['password'] ?? '');

    // bcrypt-хешування пароля
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Демонстрація збереження (PDO)
    saveUser($email, $passwordHash);

    $message = 'Дані оброблено без зміни php.ini';
}

// --------------------------
// Дані для шаблону
// --------------------------
$title = 'Авторизація <script>alert(1)</script>';
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>7 dz</title>
</head>
<body>

<!-- XSS-захист у шаблоні -->
<h1><?= htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></h1>

<form method="post">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Надіслати</button>
</form>

<p><?= htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>

</body>
</html>
