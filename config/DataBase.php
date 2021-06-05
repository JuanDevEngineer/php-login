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