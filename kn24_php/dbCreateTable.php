<?php   

try {
    // Підключення до бази даних SQLite
    $myPDO = new PDO('sqlite:mydatabase.db');
    $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Створення таблиці, якщо її немає
    $sql = "
        CREATE TABLE IF NOT EXISTS User (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            login TEXT NOT NULL UNIQUE,
            password TEXT
        );
    ";

    $myPDO->exec($sql);

    echo "Таблиця User створена (або вже існувала)";

} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}