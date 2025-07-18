<?php

class Database {
    private static $instance = null;
    private $connection;
    private $config;

    private function __construct() {

        $this->config = require __DIR__ . '/../config/database.php';

        $host = $this->config['DB_HOST'];
        $user = $this->config['DB_USER'];
        $pass = $this->config['DB_PASS'];
        $db_name = $this->config['DB_NAME'];


        $this->connection = new mysqli($host, $user, $pass, $db_name);

        if ($this->connection->connect_error) {

            die("Database connection failed: " . $this->connection->connect_error);
        }


        $this->connection->set_charset("utf8mb4");
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }


    public function getConnection() {
        return $this->connection;
    }


    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }
}

?>