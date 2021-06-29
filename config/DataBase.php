<?php
/* mysql://
b625916cadc8fd
:
75953fad
@
us-cdbr-east-04.cleardb.com/heroku_d2cacec073d6a6a?reconnect=true
*/
class DataBase {
    
    private $host = "us-cdbr-east-04.cleardb.com";
    private $db_name = "heroku_d2cacec073d6a6a";
    private $db_user = "b625916cadc8fd";
    private $db_pass = "75953fad";
    private $conn;

    public function getConnection()
    {
        try {
            $this->conn = new PDO("mysql:dbname=" . $this->db_name . ";host=" . $this->host . ";port=3306", $this->db_user, $this->db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }

        return $this->conn;
    }

} 

/*
class DataBase {
    private $host = "localhost";
    private $db = "demoproject";
    private $user = "root";
    private $pass = "";
    private $charset = NULL;
    private $opt = NULL;
    private $dsn = NULL;
    private $connection = NULL;
    private static $database = NULL;
    
    /* Private construct that can only be accessed from within this class
    private function __construct() {
        $this->createConnection();
    }
    
    private function createConnection():void {
        $this->charset = "utf8mb4";
        $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->connection = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
    }
    
    /* A static method that will create an object instance once and after that it will reuse the same instance for all other requests
    public static function getInstance():Database {
        if (NULL == self::$database) {
            self::$database = new Database();
        }
        return self::$database;
    }
    
    /* A little getter function to access the connection object 
    public function getConnection():PDO {
        return $this->connection;
    }
}
*/
