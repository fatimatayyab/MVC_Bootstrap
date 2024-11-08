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

            if ($userModel->validate($data)) {
                // If validation passes, insert the user data
                $userModel->insert($data);
                $_SESSION['message'] = 'User added successfully!';
                redirect('read'); // Redirect to a page after successful insert
            } else {
                // If validation fails, pass the errors to the view
                $data['errors'] = $userModel->errors;
  
            }
            $this->view('add', $data); // Show the form with errors
        } else {
            // If no form is submitted, load the form page
            $this->view('add');
        }
    }
}
