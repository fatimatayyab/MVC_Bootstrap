<?php

class Order
{
    use Model;

    // Define table name and allowed columns for mass-assignment protection
    protected $table = 'order';
    protected $allowedColumns = [
       'order_date', 'status', 'total_amount'
    ];


    public function getUser($customerId) {
        $userModel = new User();
        return $userModel->first(['ID' => $customerId]);
    }
    // Method to validate order data
    public function validate($data)
    {
        $this->errors = []; // Clear previous errors

        // Validate customer_id
        if (empty($data['customer_id'])) {
            $this->errors['customer_id'] = "Customer ID is required";
        }

        // Validate order_date
        if (empty($data['order_date'])) {
            $this->errors['order_date'] = "Order date is required";
        } elseif (!strtotime($data['order_date'])) { // Check if valid date format
            $this->errors['order_date'] = "Invalid date format";
        }

        // Validate status
        if (empty($data['status'])) {
            $this->errors['status'] = "Order status is required";
        }

        // Validate total_amount
        if (empty($data['total_amount'])) {
            $this->errors['total_amount'] = "Total amount is required";
        } elseif (!is_numeric($data['total_amount']) || $data['total_amount'] < 0) {
            $this->errors['total_amount'] = "Total amount must be a positive number";
        }

        return empty($this->errors); // Return true if no errors, false otherwise
    }

    // Create a new order
    public function createOrder($data)
    {
        if ($this->validate($data)) {
            return $this->insert($data); // Insert the validated data into the database
        }
        return false; // Validation failed
    }

    // Update an existing order by order_id
    public function updateOrder($orderId, $data)
    {
        if ($this->validate($data)) {
            return $this->update($orderId, $data, 'order_id');
        }
        return false;
    }

    // Retrieve a specific order by order_id
    public function getOrderById($orderId)
    {
        return $this->first(['order_id' => $orderId]);
    }

    // Retrieve all orders with optional limit and offset
    public function getAllOrders($limit = 10, $offset = 0)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        return $this->findAll();
    }

    // Delete an order by order_id
    public function deleteOrder($orderId)
    {
        return $this->delete($orderId, 'order_id');
    }
}
