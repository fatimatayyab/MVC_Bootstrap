<?php 
class FilterOrder {
    use Controller;

    public function index() {
        if(isset($_GET['ID'])){
            $customer_id = $_GET['ID'];
      
        }
        else{
            $customer_id = null;
        
        }
       
      
        // Create an instance of the User model
        $userOrder = new UserOrder;
  
        // Get the filter parameters
        $filterBy = isset($_GET['filterBy']) ? $_GET['filterBy'] : null;
        $filterValue = isset($_GET['filterValue']) ? $_GET['filterValue'] : null;
    

        if ($customer_id) {
    
            // If filter parameters are provided, apply them
            if ($filterBy && $filterValue) {
              
                // Modify the query to filter by the specific user and filter condition
                $userOrders = $userOrder->where([
                    'customer_id' => $customer_id,  // Filter by specific user ID
                    $filterBy => $filterValue  // Apply filter condition
                ]);
             
            } 
        } else {
            // If no user ID is provided, you can return a message or handle as needed
            $userOrders = [];  // Or handle with an error message
        }

        // Pass the filtered or all user orders to the view
        $data['user_order'] = $userOrders;
    

        // Load the view with the data
        $this->view('userorder', $data);
    }
}
