<?php

class Database
{
    private static $conn = null;

    // 🔧 НАЛАШТУВАННЯ FIREBIRD
    private static $config = [
        'host'     => 'localhost',
        'db_path'  => 'D:\9320/Музеї.fdb', // шлях до .fdb
        'username' => 'SYSDBA',
        'password' => 'masterkey',
        'charset'  => 'UTF8'
    ];

    /**
     * Підключення до Firebird
     */
    public static function connect()
    {
        if (self::$conn !== null) {
            return self::$conn;
        }

        $c = self::$config;

        $dsn = sprintf(
            "firebird:dbname=%s:%s;charset=%s",
            $c['host'],
            $c['db_path'],
            $c['charset']
        );

        try {
            self::$conn = new PDO($dsn, $c['username'], $c['password']);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('❌ Помилка підключення до Firebird: ' . $e->getMessage());
        }

        return self::$conn;
    }

    /**
     * Авторизація
     */
    public static function login($email, $password)
    {
        $db = self::connect();

        $sql = "SELECT ID, NAME, EMAIL, PASSWORD
                FROM USERS
                WHERE EMAIL = :email";

        $stmt = $db->prepare($sql);
        $stmt->execute([':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['PASSWORD'])) {
            unset($user['PASSWORD']);
            return [
                'id'    => $user['ID'],
                'name'  => $user['NAME'],
                'email' => $user['EMAIL']
            ];
        }

        return false;
    }

    /**
     * Реєстрація
     */
    public static function register($name, $email, $password)
    {
        $db = self::connect();

        // Перевірка email
        $check = $db->prepare(
            "SELECT ID FROM USERS WHERE EMAIL = :email"
        );
        $check->execute([':email' => $email]);

        if ($check->fetch()) {
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO USERS (NAME, EMAIL, PASSWORD)
                VALUES (:name, :email, :password)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            ':name'     => $name,
            ':email'    => $email,
            ':password' => $hash
        ]);
    }

    /**
     * Закриття з'єднання
     */
    public static function close()
    {
        self::$conn = null;
    }
}
