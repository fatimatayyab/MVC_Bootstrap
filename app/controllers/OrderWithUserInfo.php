<?php

class OrderWithUserInfo {
    use Controller;
    
    public function index() {
        // Create an instance of the UserOrder model
        $userOrder = new UserOrder;

        // Define the join condition
        $joinCondition = 'user_order.customer_id = user.ID';  // This is the condition for the join
        $joinTable = 'user';  // The table to join with

        // Fetch the data by calling the join method
        $ordersWithUserInfo = $userOrder->join($joinTable, $joinCondition, 'INNER JOIN', 'user_order.order_id, user_order.product, user_order.quantity, user_order.price, user_order.status, user.username  , user.firstname,user.lastname, user.address,user.nationality,user.gender');

        // Check if data is retrieved
        if ($ordersWithUserInfo) {
            $data['ordersWithUserInfo'] = $ordersWithUserInfo;
        } else {
            $data['ordersWithUserInfo'] = [];
        }

        // Load the view (which will render the joined order data)
        $this->view('userswithorders', $data);
    }
}
