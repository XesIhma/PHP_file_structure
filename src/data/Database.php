<?php
namespace App\Data;

class Database {
    private $db;
    public function __construct($db) {
        $this->db = $db;
      echo "Created DB";
    }
}