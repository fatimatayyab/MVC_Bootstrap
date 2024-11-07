<?php

Trait Controller{
    public function view($name, $data=[]){

        if(!empty($data))
        extract($data);
        $filename = "../app/views/".$name.".view.php";  // Use the first part of URL to determine the controller
        
        // Check if the controller file exists
        if (file_exists($filename)) {
            require $filename;  // Include the  controller file
        } else {
            // If the controller doesn't exist, load the 404 controller
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}