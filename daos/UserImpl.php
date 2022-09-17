<?php

namespace Daos;

use PDO;
use PDOException;

use Daos\User;
use Models\Model;
use Models\User as UserModel;

class UserImpl extends Model implements User
{
  function __construct()
  {
    parent::__construct();
  }

  public function login($name, $lastname)
  {
    $response = array();
    try {
      //validamos el usuario
      $sql  = "SELECT * FROM usuarios WHERE nombre = ? AND apellido = ? ";

      // preparamos la sentencia
      $stmt = $this->con->getConnection()->prepare($sql);

      // pasamos los parametros
      $stmt->bindParam(1, $name, PDO::PARAM_STR);
      $stmt->bindParam(2, $lastname, PDO::PARAM_STR);

      // ejecutamos la consulta
      if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
          $data = $stmt->fetch();
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

  public function register(UserModel $user)
  {
    $response = array();
    try {
      if (!$this->validateName($user->getName())) {
        // encritamos la contraseña
        $password_hash = $this->hashPassword($user->getPassword());

        // realizamos el sql de insercion
        $sql = "INSERT INTO `usuarios` (nombre, apellido, password) 
                        VALUES('{$user->getName()}', '{$user->getLastname()}', '$password_hash')";

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
