<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Symfony\Component\VarDumper\VarDumper;
use Carbon\Carbon;

// Monolog: налаштовуємо логер, який пише в файл app.log
$log = new Logger('app');
$log->pushHandler(new StreamHandler(__DIR__ . '/app.log', Logger::DEBUG));

$log->info('Додаток стартував');
$log->warning('Тестове попередження');
$log->error('Тестова п лка');

// VarDumper: красиво виводимо масив у консоль
$user = [
    'name' => 'Oleh',
    'role' => 'student',
    'created_at' => date('Y-m-d H:i:s'),
];
VarDumper::dump($user);

// Carbon: робота з датами/часом
$now = Carbon::now();
$tomorrow = $now->copy()->addDay();
$nextWeek = $now->copy()->addWeek();

echo 'Зараз: ' . $now->toDateTimeString() . PHP_EOL;
echo 'Завтра: ' . $tomorrow->toDateTimeString() . PHP_EOL;
echo 'Через тиждень: ' . $nextWeek->toDateTimeString() . PHP_EOL;
