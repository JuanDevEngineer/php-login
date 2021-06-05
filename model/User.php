<?php

require_once 'Model.php';

class User extends Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function login($nombre, $apellido) {
        $response = array();
        try {
            //validamos el usuario
            $sql  = "SELECT * FROM usuarios WHERE nombre = ? AND apellido = ? ";
            // preparamos la sentencia
            $stmt = $this->con->getConnection()->prepare($sql);
            // pasamos los parametros
            $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(2, $apellido, PDO::PARAM_STR);

            // ejecutamos la consulta
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    $response['data'] = $data;
                    $response['status'] = "success";
                    return $response;
                } else {
                    $response['error'] = "Verifique la informacion!";
                    $response['status'] = "error";
                    return $response;
                }
            }
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
          }
    }

    public function registrar($nombre, $apellido, $password) {
        $response = array();
        try {
            if (!$this->validarNombre($nombre)) {
                // encritamos la contraseña
                $password_hash = $this->hashPassword($password);
                
                // realizamos el sql de insercion
                $sql = "INSERT INTO `usuarios` (nombre, apellido, password) 
                        VALUES('$nombre', '$apellido', '$password_hash')";

                // preparamos la consulta
                $stmt = $this->con->getConnection()->prepare($sql);

                // validar la ejecucion
                if ($stmt->execute()) {
                    $response['message'] = "usuario registrado correctamente!";
                    $response['status'] = "success";
                    return $response;
                }
            } else {
                $response['message'] = "El usuaio ya existe, intenta con otro diferente!";
                $response['status'] = "error";
                return $response;
                }
        } catch (PDOException $e) {
            echo "error" . $e->getMessage();
        }       
    }


}

// $model = new User();
// $res = $model->registrar("carlos", "cuadros", "123");

// var_dump($res);