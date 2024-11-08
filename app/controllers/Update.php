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
                        'email' => $_POST['email'],
                        'gender' => $_POST['gender'],
                        'city' => $_POST['city'],
                        'nationality' => $_POST['nationality'],
                        'nic' => $_POST['nic'],
                        'address' => $_POST['address']
                    ];
                    $changes = array_diff_assoc($updatedData, $userData);
                    if (!empty($changes)) {
                        // Update only the changed fields
                        $userModel->update($userId, $changes);
                        $_SESSION['message'] = 'User information updated successfully';
                    } else {
                        $_SESSION['message'] = 'No changes made to update';
                    }
                    redirect('read');
                }
                $data['user'] = $userData; // Pass user data to the view
            } else {
                $_SESSION['message'] = 'User not found';
                redirect('read');
            }
        } else {
            $_SESSION['message'] = 'No user ID specified';
            redirect('read');
        }

        $this->view('add', $data);
    }
}