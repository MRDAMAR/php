<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
    <nav>
        <a href="/">Головна</a>
        <a href="/login">Вхід</a>
    </nav>

    <h1>Авторизація</h1>
    <form method="post" action="#">
        <label>Логін:</label>
        <input type="text" name="username" required>
        <label>Пароль:</label>
        <input type="password" name="password" required>
        <button type="submit">Увійти</button>
    </form>
</body>
</html>
