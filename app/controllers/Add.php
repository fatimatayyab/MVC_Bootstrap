<?php 
class Add {
    use Controller;

    public function index() {

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the POST data
            $data = [
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'gender' => $_POST['gender'],
                'nationality' => $_POST['nationality'],
                'nic' => $_POST['nic'],
                'address' => $_POST['address']
                
            ];
            $userModel = new User;
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if ($userModel->validate($data)) {        
                $userModel->insert($data);
                $_SESSION['message'] = 'User added successfully!';
                redirect('read');
            } else {
          
                $data['errors'] = $userModel->errors;
  
            }
            $this->view('add', $data); 
        } else {

            $this->view('add');
        }
    }
}
