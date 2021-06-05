<?php

class DataBase {
    
    private $host = "localhost";
    private $db_name = "prueba-admin";
    private $db_user = "root";
    private $db_pass = "";
    private $conn;

    public function getConnection()
    {
        try {
            $this->conn = new PDO("mysql:dbname=" . $this->db_name . ";host=" . $this->host . ";port=33065", $this->db_user, $this->db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error en la conexion: " . $e->getMessage();
        }

        return $this->conn;
    }

} 