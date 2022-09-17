<?php

namespace Daos;

use Models\User as UserModel;

interface User
{
  public function login($name, $lastname);

  public function register(UserModel $user);
}
