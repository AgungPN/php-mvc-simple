<?php
if(!session_id()) session_start();

require_once __DIR__."/../app/config/config.php";
require_once __DIR__."/../vendor/autoload.php";
use App\Core\App; 
$app = new App;
