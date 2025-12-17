<?php
require 'Database.php';

echo "=== Тест реєстрації ===\n";

if (Database::register('Ivan', 'ivan@mail.com', '123456')) {
    echo "✓ Користувач успішно зареєстрований\n";
} else {
    echo "✗ Помилка реєстрації (можливо, існує)\n";
}

echo "\n=== Тест авторизації ===\n";

$user = Database::login('ivan@mail.com', '123456');

if ($user) {
    echo "✓ Успішна авторизація!\n";
    echo "ID: {$user['id']}, Ім'я: {$user['name']}, Email: {$user['email']}\n";
} else {
    echo "✗ Невірний email або пароль\n";
}

echo "\n=== Тест з невірним паролем ===\n";

if (Database::login('ivan@mail.com', 'wrong')) {
    echo "✗ ПОМИЛКА\n";
} else {
    echo "✓ Очікувано: невірний пароль\n";
}

Database::close();
