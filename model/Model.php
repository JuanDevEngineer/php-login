<?php

class Model {

    protected $con;

    public function __construct()
    {
        $this->con = new Database();
    }

    protected function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
    }

    protected function validarNombre($nombre) {

        try {
            $sql = "SELECT * FROM usuarios WHERE nombre = ?";
            $stmt = $this->con->getConnection()->prepare($sql);
            $stmt->bindParam(1, $nombre, PDO::PARAM_STR);

            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
        }
    }

    
}