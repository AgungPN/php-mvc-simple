<?php

use App\Core\Application;

require_once __DIR__."/../app/config/config.php";
// use App\Config;
// in autoload use classmap, because not use namespaces
require_once __DIR__."/../vendor/autoload.php";
use App\Core\App; 
$app = new App;
var_dump($app);die;
