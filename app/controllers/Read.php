<?php

class Read {
    use Controller;
    
    public function index() {
   
        $user = new User;

        
        $users = $user->findAll();  
       

      
        if ($users) {
        
            $data['users'] = $users;
        } else {
         
            $data['users'] = [];
        }

        $this->view('read', $data);
    }
}