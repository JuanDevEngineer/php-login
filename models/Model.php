<?php

namespace Models;

use \Config\DataBase;
use PDO;
use PDOException;

class Model
{
  protected $con;

  public function __construct()
  {
    $this->con = DataBase::getInstance();
  }

  protected function hashPassword($password)
  {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
  }

  protected function verifyPassword($passwordLogin, $currentPassword)
  {
    return password_verify($passwordLogin, $currentPassword);
  }

  protected function validateName($name)
  {
    try {
      $sql = "SELECT * FROM usuarios WHERE nombre  = ?";
      $stmt = $this->con->getConnection()->prepare($sql);
      $stmt->bindParam(1, $name, PDO::PARAM_STR);

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
