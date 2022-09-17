<?php

namespace Models;

class User
{
  private string $name;
  private string $lastname;
  private string $password;

  function __construct($name, $lastname, $password)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->password = $password;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setLastname($lastname)
  {
    $this->lastname = $lastname;
  }

  public function getLastname()
  {
    return $this->lastname;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getPassword()
  {
    return $this->password;
  }
}
