<?php
namespace App\Models;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class Database{
    private static $instance = null;
    private $connection;

    private function __construct(){
        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $db = $_ENV['DB_NAME'];

        try{
            $this->connection = new \mysqli($host, $user, $pass, $db);
            $this->connection->set_charset("utf8mb4");
        }catch(\mysqli_sql_exception $e){
            error_log('Database connection failed: ' . $e->getMessage());
            die('Database connection failed. Please try again later.');
        }
    }

    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }

    public function closeConnection(){
        if ($this->connection){
            $this->connection->close();
        }
    }
}

