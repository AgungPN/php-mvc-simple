<?php

require_once __DIR__ . "/../../vendor/autoload.php";
// dirname to access root directory or parent directory
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__) . '/../');
$dotenv->load();

// base URL
define('BASEURL', $_ENV["BASEURL"]);

// Database
define('DB_USERNAME', $_ENV["DB_USERNAME"]);
define('DB_PASSWORD', $_ENV["DB_PASSWORD"]);
define('DB_NAME', $_ENV["DB_NAME"]);
define('DB_HOST', $_ENV["DB_HOST"]);

// timezone
define('TIME_ZONE', $_ENV["TIME_ZONE"]);
