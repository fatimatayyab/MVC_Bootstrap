<?php

class UpdateOrder {
    use Controller;

    public function index() {
        $data = [];
        
        // Check if an ID is provided in the URL (e.g., /updateOrder?ID=5)
        if (isset($_GET['ID'])) {
            $orderModel = new Order();
            $orderId = $_GET['ID'];
            
            // Fetch order data by ID
            $orderData = $orderModel->first(['ID' => $orderId]);

            if ($orderData) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get updated data from POST request
                    $updatedData = [
                        'customer_id'  => $_POST['customer_id'],  // Assuming customer_id is provided and not editable by the user
                        'order_date'   => $_POST['order_date'],
                        'status'       => $_POST['status'],
                        'total_amount' => $_POST['total_amount']
                    ]; 

                    // Optionally, add validation here if needed
                    if ($this->validateOrderData($updatedData)) {
                        // Compare new data with old data
                        $changes = array_diff_assoc($updatedData, $orderData);
                        if (!empty($changes)) {
                            // Update only the changed fields
                            $orderModel->update($orderId, $changes);
                            $_SESSION['message'] = 'Order updated successfully';
                        } else {
                            $_SESSION['message'] = 'No changes made to update';
                        }
                        redirect('orders/read'); // Redirect to the orders page after successful update
                    } else {
                        // Pass errors and form data to the view if validation fails
                        $data['errors'] = 'Please fill all fields correctly';
                        $data['order'] = array_merge($orderData, $updatedData); // Keep form filled with entered data
                        $this->view('orders/edit', $data);
                        return;
                    }
                } else {
                    // If it's a GET request, pre-fill the form with existing order data
                    $data['order'] = $orderData;
                    $this->view('orders/edit', $data);  // Render the edit order view with existing data
                }
            } else {
                $_SESSION['message'] = 'No order ID specified';
                redirect('orders/read');  // Redirect if no order found
            }
        }
    }

    // Validation for order data (this can be expanded based on your requirements)
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
