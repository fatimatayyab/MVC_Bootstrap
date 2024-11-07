<?php
class Login  {
use Controller;
    public function index() {

        $data= [];
        if($_SERVER['REQUEST_METHOD']=='POST')
        { 
            $test=new Test;      
            $arr['email']=$_POST['email'];
           $row= $test->first($arr);
           if($row){
            if($row->password === $_POST['password'])
            {
                $_SESSION['USER'] = $row;
                redirect('home');
            }
            
           }
        $test->errors['email']="Email or password is incorrect";
        $data['errors'] =$test->errors; 
        }

    $this->view('login', $data);     
}

}