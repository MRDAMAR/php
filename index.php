<?php
// Отримуємо шлях з URL
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Видаляємо початковий слеш, щоб зручно було порівнювати
$path = trim($request, '/');

// Масив доступних сторінок
$routes = [
    '' => 'home',
    'home' => 'home',
    'login' => 'login',
];

// Формуємо шлях до сторінки
$pageFile = __DIR__ . '/pages/' . ($routes[$path] ?? '404') . '.php';

// Динамічний заголовок
$titleMap = [
    'home' => 'Головна сторінка',
    'login' => 'Вхід на сайт',
    '404' => 'Сторінку не знайдено',
];
$title = $titleMap[$routes[$path] ?? '404'] ?? 'Сайт';

// Виводимо сторінку
include $pageFile;
