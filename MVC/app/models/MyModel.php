<?php
require_once __DIR__ . '/../../config/database.php';

class MyModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = "SELECT * FROM content";
        $res = ibase_query($this->db, $query);
        $data = [];
        while ($row = ibase_fetch_assoc($res)) {
            $data[] = $row;
        }
        return $data;
    }

    public function create($title, $text) {
        $query = "INSERT INTO content (title, text) VALUES (?, ?)";
        $stmt = ibase_prepare($this->db, $query);
        return ibase_execute($stmt, $title, $text);
    }
}
