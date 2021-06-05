<?php

require_once __DIR__ . "/autoload.php";
require_once './core/MainController.php';
require_once './config/Config.php';
require_once './config/DataBase.php';

$app = new MainController();
$app->App();