<?php

namespace Services;

use Daos\UserImpl;
use Models\User;
use Services\UserService;

class UserServiceImpl implements UserService
{
  private $userDao;

  public function __construct()
  {
    $this->userDao = new UserImpl();
  }

  public function login($name, $lastname)
  {
    return $this->userDao->login($name, $lastname);
  }

  public function register(User $user)
  {
    return $this->userDao->register($user);
  }
}
