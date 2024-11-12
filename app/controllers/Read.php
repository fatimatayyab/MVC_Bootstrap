<?php
// phpinfo();
class Read {
    use Controller;
    
    public function index() {
   
        $user = new User;
        $users = $user->findAll();
          
         foreach ($users as &$user) {
            $userOrder = new UserOrder;
            // Fetch total orders for the user and assign it to the 'totalorders' column
            $user['totalorders'] = $userOrder->countOrdersByUser($user['ID']);
        }

      
        if ($users) {
        
            $data['users'] = $users;
        } else {
         
            $data['users'] = [];
        }

        $this->view('read', $data);
    }
}