<?php

class Read {
    use Controller;
    
    public function index() {
        // Create an instance of the User model
        $user = new User;

        // Fetch all users from the database
        $users = $user->findAll();  // This calls the `findAll()` method from your model

        // Check if data is retrieved
        if ($users) {
            // Pass the users' data to the view
            $data['users'] = $users;
        } else {
            // Handle case where no data is found
            $data['users'] = [];
        }

        // Load the view (which will render the user data)
        $this->view('read', $data);
    }
}