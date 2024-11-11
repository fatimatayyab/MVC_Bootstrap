<?php
class Readorder {
    use Controller;

    public function index() {
        // Create an instance of the Order model
        $userOrder = new UserOrder;
        $customer_id = isset($_GET['ID']) ? $_GET['ID'] : null;

        // Fetch all orders from the database
        if ($customer_id) {
            $userOrders = $userOrder->where(['customer_id' => $customer_id]); // Use where query to filter by customer_id
        } else {
            // If no customer_id is passed, fetch all orders (optional fallback)
            $userOrders = $userOrder->findAll();
        }  // This calls the `findAll()` method from your model

        // Check if data is retrieved
        if ($userOrders) {
            // Pass the users' data to the view
            $data['userOrders'] = $userOrders;
        } else {
            // Handle case where no data is found
            $data['userOrders'] = [];
        }

        // Load the view (which will render the user data)
        $this->view('userorder', $data);
    }
}