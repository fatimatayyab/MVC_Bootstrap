<?php

spl_autoload_register(function($classname){
    // Correct way to require the file based on the class name
    require_once "../app/models/" . ucfirst($classname) . ".php";
});


require "config.php";
require "functions.php";
require "Database.php";
require "Model.php";
require "Controller.php";
require "App.php";   
require_once "../app/utils/DatabaseUtils.php"; 