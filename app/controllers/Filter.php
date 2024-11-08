<?php 
class Filter {
    use Controller;

    public function index() {
     
        // Create an instance of the User model
        $user = new User;

        // Get the filter parameters
        $filterBy = isset($_GET['filterBy']) ? $_GET['filterBy'] : null;
        $filterValue = isset($_GET['filterValue']) ? $_GET['filterValue'] : null;

        // Fetch users based on filter conditions
        if ($filterBy && $filterValue) {
            $users = $user->where([$filterBy => $filterValue]);
        } else {
            // If no filter, fetch all users
            $users = $user->findAll();
        }

        // Pass the filtered or all users to the view
        $data['users'] = $users;

        // Load the view
        $this->view('read', $data);
    }
}
