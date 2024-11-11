<?php

class UpdateOrder {
    use Controller;

    public function index() {
        echo "UpdateOrder controller called";
        $data = [];
        
        // Check if an ID is provided in the URL (e.g., /updateOrder?ID=5)
        if (isset($_GET['order_id']) && isset($_GET['customer_id'])) {
            $userOrder = new UserOrder;
            $orderId = $_GET['order_id'];
            $customerId =$_GET['customer_id'] ;
            
            // Fetch order data by ID
            $orderData = $userOrder->first(['order_id' => $orderId]);

            if ($orderData) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo "POST method called";
                   
                    $updatedData = [                     
                    
                        'status'       => $_POST['status'],
                        'price' => $_POST['price'],
                        'quantity' => $_POST['quantity'],
                        'product' => $_POST['product'],
                    ]; 
echo "updated data is updated";
                 
                    if ($userOrder->validate($updatedData)) {
                        echo "validation is done";
                        $changes = array_diff_assoc($updatedData, $orderData);
                
                        if (!empty($changes)) {
                            echo "changes occured";
                            // Update only the changed fields
                            $userOrder->update($orderId, $changes, 'order_id');
                            $_SESSION['message'] = 'Order updated successfully';
                        }
                        else {
                        $_SESSION['message'] = 'No changes made to update';
                        }
                        redirect("readorder/?ID={$customerId}");
                    } else {
                      
                        $data['errors'] = $userOrder->errors;
                        $data['user_order'] = array_merge($orderData, $updatedData); 
                        $this->view('addorder', $data);
                        return;
                    }
                } else {
                    
                    $data['user_order'] = $orderData;
                    $this->view('addorder', $data);  
                }
            } else {
                $_SESSION['message'] = 'No order ID specified';
                redirect('readorder/?ID={$customer_id}');  
            }
        }
    }
}
