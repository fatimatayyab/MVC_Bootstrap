<?php

class UserOrder
{
    use Model;

    protected $table = 'user_order';
    protected $allowedColumns = [
       'order_date', 'status', 'price', 'quantity', 'product' ,'customer_id'
    ];

    public function countOrdersByUser($userId)
    {
        return $this->count(['customer_id' => $userId]);
    }
  
    // Method to validate order data
    public function validate($data)
    {
        $this->errors = []; // Clear previous errors

    

       
        if (empty($data['product'])) {
            $this->errors['product'] = "Product Name is required";
        }
        if (empty($data['status'])) {
            $this->errors['status'] = "Order status is required";
        }
    
        if (empty($data['quantity'])) {
            $this->errors['quantity'] = "Quantity of Product is required";
        } 
        elseif (!is_numeric($data['quantity']) || $data['quantity'] < 0) {
            $this->errors['quantity'] = "Quantity must be a positive number";
        }
        if (empty($data['price'])) {
            $this->errors['price'] = "Price  of Product is required";
        } 
        elseif (!is_numeric($data['price']) || $data['price'] < 0) {
            $this->errors['price'] = "price must be a positive number";
        }

        return empty($this->errors); 
    }
    
    
}
