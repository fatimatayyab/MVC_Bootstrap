<?php
class AddOrder {
    use Controller;

    public function index() {
        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the POST data
            $data = [
                'customer_id'  => $_POST['customer_id'],  // Assuming customer ID is passed from a logged-in user
                'order_date'   => $_POST['order_date'],
                'status'       => $_POST['status'],
                'total_amount' => $_POST['total_amount']
            ];
            
            $orderModel = new Order;

            // Optionally, add validation (for example, checking if total_amount is a valid number)
            if ($this->validateOrderData($data)) {
                // If validation passes, insert the order data
                if ($orderModel->insert($data)) {
                    $_SESSION['message'] = 'Order added successfully!';
                    redirect('readorder'); // Redirect to the orders page after successful insert
                } else {
                    $_SESSION['error'] = 'Error adding order!';
                }
            } else {
                // If validation fails, pass the errors to the view
                $data['errors'] = 'Please fill all fields correctly.';
            }

            // Show the form with errors or success message
            $this->view('addorder', $data);
        } else {
            // If no form is submitted, load the form page
            $this->view('addorder');
        }
    }

    // Validation for order data (can be expanded)
    private function validateOrderData($data) {
        $errors = [];

        if (empty($data['customer_id'])) {
            $errors['customer_id'] = 'Customer ID is required';
        }

        if (empty($data['order_date'])) {
            $errors['order_date'] = 'Order date is required';
        }

        if (empty($data['total_amount']) || !is_numeric($data['total_amount'])) {
            $errors['total_amount'] = 'Valid total amount is required';
        }

        return empty($errors); // Return true if no errors, false otherwise
    }
}
