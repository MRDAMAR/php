<?php
// Простий PHP-роутер

// Отримуємо URL без параметрів
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Видаляємо зайві / 
$request = trim($request, '/');

// Налаштування сторінок (маршрути + метадані)
// ключ масиву = частина URL після домену
// ''  -> головна сторінка (/, index)
// 'home' -> альтернативний шлях до головної (/home)
// 'login' -> сторінка логіну / реєстрації
$routes = [
    '' => [
        'file'  => 'home.php',
        'title' => 'Головна',
        'url'   => '/',
    ],
    'home' => [
        'file'  => 'home.php',
        'title' => 'Головна',
        'url'   => '/home',
    ],
    'login' => [
        'file'  => 'login.php',
        'title' => 'Логін / Реєстрація',
        'url'   => '/login',
    ],
];

// Поточний шлях (для підсвічування активного пункту меню)
$currentPath = $request === '' ? '/' : '/' . $request;

// Якщо сторінка існує в маршрутах
if (array_key_exists($request, $routes)) {
    $pageConfig = $routes[$request];

    $page       = $pageConfig['file'];
    $title      = $pageConfig['title'];
    $menuRoutes = $routes;

    include __DIR__ . "/pages/$page";
    exit;
}

// Якщо не знайдено — 404
http_response_code(404);
$title      = "404 — Сторінку не знайдено";
$menuRoutes = $routes;
include __DIR__ . "/pages/404.php";
exit;
