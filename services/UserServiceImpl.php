<?php

namespace Services;

use Daos\User as DaosUser;
use Daos\UserImpl;
use Models\User;
use Services\UserService;

class UserServiceImpl implements UserService
{
  private $userDao;

  public function __construct(DaosUser $userDao)
  {
    $this->userDao = $userDao;
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
