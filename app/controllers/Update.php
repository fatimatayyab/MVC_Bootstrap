<?php

class Update {
    use Controller;

    public function index() {
        $data = [];
        
        // Check if an ID is provided in the URL (e.g., /update?ID=5)
        if (isset($_GET['ID'])) {
            $userModel = new User;
            $userId = $_GET['ID'];
            
            // Fetch user data by ID
            $userData = $userModel->first(['ID' => $userId]);
            
            if ($userData) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
                    $updatedData = [
                        'firstname' => $_POST['firstname'],
                        'lastname' => $_POST['lastname'],
                        'username' => $_POST['username'],
                        'password' => $_POST['password'],
                        'email' => $_POST['email'],
                        'gender' => $_POST['gender'],                   
                        'nationality' => $_POST['nationality'],
                        'nic' => $_POST['nic'],
                        'address' => $_POST['address']
                    ]; 
                    if ($userModel->validate($updatedData,true, $userId)) {
                        $changes = array_diff_assoc($updatedData, $userData);
                        if (!empty($changes)) {
                            // Update only the changed fields
                            $userModel->update($userId, $changes);
                            $_SESSION['message'] = 'User information updated successfully';
                        } else {
                            $_SESSION['message'] = 'No changes made to update';
                        }
                        redirect('read');
                    } else {
                        // Pass errors and form data to the view if validation fails
                        $data['errors'] = $userModel->errors;
                        $data['user'] = array_merge($userData, $updatedData); // Keep form filled with entered data
                        $this->view('add', $data);
                        return;
                    }
                } else {
                    
                    $data['user'] = $userData;
                    $this->view('add', $data);
                }
            } else {
            $_SESSION['message'] = 'No user ID specified';
            redirect('read');
        }

   
    }
} }