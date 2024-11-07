<?php
class Signup  {
use Controller;
    public function index() {
    
        $test=new Test;
        if($test->validate($_POST)){    $test->insert($_POST);} 
        $test->insert($_POST);
        redirect('home');


show($_POST);
$this->view('signup'); 
}

}