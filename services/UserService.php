<?php

namespace Services;

use Models\User;

interface UserService
{
  public function login($name, $lastname);

  public function register(User $user);
}
