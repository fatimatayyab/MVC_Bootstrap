<?php

class ReadAllOrders {
    use Controller;
    
    public function index() {
        // Create an instance of the UserOrder model
        $userOrder = new UserOrder;

        // Fetch all orders from the database (no filtering by customer_id)
        $userOrders = $userOrder->findAll();  // This will retrieve all orders from the orders table

        // Check if data is retrieved
        if ($userOrders) {
            // Pass the orders' data to the view
            $data['userOrders'] = $userOrders;
        } else {
            // Handle case where no data is found
            $data['userOrders'] = [];
        }

        // Load the view (which will render the order data)
        $this->view('userorder', $data);
    }
}
