<?php 
class Delete {
    use Controller;
    
    public function deleteUser() {
        // Check if the form was submitted and the ID is present
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ID'])) {
            $id = $_POST['ID'];
            
            // Create an instance of the User model
            $user = new User;

            // Call the delete method in the model
            if ($user->delete($id)) {
                // Set a success message if deletion is successful
                $_SESSION['message'] = 'User deleted successfully!';
            } else {
                // Set an error message if deletion fails
                $_SESSION['message'] = 'Failed to delete user.';
            }
        }

        // Redirect back to the read page

        exit();
    }
}
