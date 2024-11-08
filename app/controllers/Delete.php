<?php 
class Delete {
    use Controller;

    public function index() {
        // Check if ID is present in GET request
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];
            $user = new User;

            // Attempt deletion
            $user->delete($id, 'ID'); 
            redirect('read');
        } else {
            $_SESSION['message'] = 'No user ID specified for deletion';
            redirect('read');
        }
    }
}