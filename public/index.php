<?php 

session_start();
require "../app/core/init.php";

(DEBUG) ? ini_set('display_errors', 1) :  ini_set('display_errors', 0);

$app= new App();  // Create a new instance of the App class
$app->loadController();  // Call the loadController method