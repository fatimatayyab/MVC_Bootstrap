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
                'city' => $_POST['city'],
                'nationality' => $_POST['nationality'],
                'nic' => $_POST['nic'],
                'address' => $_POST['address']
            ];

            // If you want to insert the data into the database, call the insert method
            $userModel = new User;
            $userModel->insert($data);

            // Pass the data to the view to display
            $this->view('add', $data);
        } else {
            // If no form is submitted, load the form page
            $this->view('add');
        }
    }
}
