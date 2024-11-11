<?php
class AddOrder {
    use Controller;

    public function index() {
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo 'Customer ID: ' . $_POST['customer_id'];
       
            $data = [
                'customer_id' => $_POST['customer_id'],
                'product' => $_POST['product'],
                'quantity' => $_POST['quantity'],
                'price' => $_POST['price'],
                'status' => $_POST['status'],
                'order_date' => date('Y-m-d H:i:s'), 
            ];
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            $user = new User;  // Assuming you have a User model or object
            $existingUser = $user->findAll($data['customer_id']);  // Find user by customer_id

            if (!$existingUser) {
                echo 'No user found with customer_id: ' . $data['customer_id'];
            } else {
                echo 'User exists: ' . $existingUser['firstname'] . ' ' . $existingUser['lastname'];
            }

            

            $userOrder = new UserOrder;

            if ($userOrder->validate($data)) {
                $userOrder->insert($data);
                $_SESSION['message'] = 'Order added successfully!';       
                $customer_id = $_POST['customer_id'];  // Get the customer ID from the form
                redirect("readorder/?ID={$customer_id}");
            } else {              
                $data['error'] = "Failed to add order.";
                $this->view('addorder', $data); 
            }
            $this->view('addorder', $data); 
        }

        else {

            $this->view('addorder');
        }
    }
}
