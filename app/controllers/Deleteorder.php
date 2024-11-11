<?php 
class DeleteOrder {
    use Controller;

    public function index() {
        if (isset($_GET['order_id']) ) {
            $id = $_GET['order_id'];
            $customer_id = $_GET['customer_id']; 
            $userOrder = new UserOrder;

           
            $userOrder->delete($id, 'order_id'); 
            $_SESSION['message']= "Order deleted successfully!";
          
            redirect("readorder/?ID={$customer_id}");
          
        } else {
            $_SESSION['message'] = 'No order Id specified for deletion';
            redirect('userorder');
        }
    }
}