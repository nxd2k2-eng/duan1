<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config.php';
require_once 'Models/Database.php';

$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$connection = $db->connect();
var_dump($db);

require_once 'router.php';

$db->disconnect();