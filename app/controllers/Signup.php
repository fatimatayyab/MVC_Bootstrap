<?php
class Signup  {
use Controller;
    public function index() {
      
      $data=[];
       if($_SERVER['REQUEST_METHOD']=='POST')
       {
        $test=new Test;
        if($test->validate($_POST))
        {  
             $test->insert($_POST);
             redirect('login');
                } 
        $data['errors'] =$test->errors; 

       }
$this->view('signup', $data); 
}

}