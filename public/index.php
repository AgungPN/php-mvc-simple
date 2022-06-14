<?php
if(!session_id()) session_start();

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../app/config/config.php";
require_once __DIR__."/../app/helpers/functions.php";

$app = new App\Core\App;
