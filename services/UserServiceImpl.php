<?php

namespace Services;

use Daos\UserImpl;
use Models\User;
use Services\UserService;

class UserServiceImpl implements UserService
{
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = new UserImpl();
  }

  public function login($name, $lastname)
  {
    return $this->userRepository->login($name, $lastname);
  }

  public function register(User $user)
  {
    return $this->userRepository->register($user);
  }
}
