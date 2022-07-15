<?php 
require __DIR__ . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', TRUE);
ini_set('display_errors', FALSE);
ini_set('log_errors',TRUE);
ini_set('error_log','log/php_error.log');
session_start();
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();
require "app/lib/routes.php";
?>