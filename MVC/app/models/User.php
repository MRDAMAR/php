<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = ibase_prepare($this->db, $query);
        return ibase_execute($stmt, $name, $email, $hash);
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = ibase_prepare($this->db, $query);
        $res = ibase_execute($stmt, $email);
        return ibase_fetch_assoc($res);
    }
}
