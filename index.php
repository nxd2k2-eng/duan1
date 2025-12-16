<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
require_once 'config.php';
require_once 'Models/Database.php';
require_once 'helper.php';

$database = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$connection = $database->connect();

require_once 'model.php';
require_once 'router.php';


$database->disconnect();