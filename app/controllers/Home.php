<?php
class Home extends Controller {
    public function index($a = '', $b = '', $c = '') {
        // Example of using the Test model
        $test = new Test();  // Create an instance of the Test model

        // Inserting data into the "test" table
        $arr = [
            'Name' => 'Anas Tayyab',
            'Age' => 20
        ];
        $arr2 = [
            'Name' => 'Muaz Tayyab',
            'Age' => 25
        ];
        $arr3 = [
            'Name' => 'Umar',
            'Age' => 21
        ];
        $test->insert($arr);  
        // Insert a new record
        
        $test->insert($arr2);  
        
        $test->insert($arr3);  

        // Finding all records in the "test" table
        $result = $test->findAll();  // Get all records
        show($result);  // Display the result (this is a custom function)

        // Example of a "where" condition
        $result = $test->where(['Name' => 'MuazTayyab']);  // Find records where Name is "MuazTayyab"
        show($result);

        // Example of an "update" operation
        $update_data = [
            'Age' => 21
        ];
        $test->update(1, $update_data);  // Update the record with ID 1

        // Example of a "delete" operation
        $test->delete(3);  

        echo "This is Home Controller";  // Just an echo statement
        $this->view('home');  // Load the 'home' view
    }
}