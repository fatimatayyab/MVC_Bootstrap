<?php
class User
{
    use Model;
    protected $table='user';
    protected $allowedColumns = [
      'email', 'password', 'firstname', 'lastname', 'username',
      'address', 'nationality', 'nic', 'gender',  // Add 'city' here if needed
  ];
   // Validate function
   public function validate($data, $isUpdate = false)
   {
       $this->errors = []; // Clear any previous errors
       
       // Validate email
       if (empty($data['email'])) {
           $this->errors['email'] = "Email is required";
       } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
           $this->errors['email'] = "Email is not valid";
       } elseif (!$isUpdate && $this->exists('email', $data['email'])) { // Check for existing email during insert
           $this->errors['email'] = "Email already exists";
       }

       // Validate username
       if (empty($data['username'])) {
           $this->errors['username'] = "Username is required";
       } elseif (!$isUpdate && $this->exists('username', $data['username'])) { // Check for existing username during insert
           $this->errors['username'] = "Username already exists";
       }

       // Validate NIC
       if (empty($data['nic'])) {
           $this->errors['nic'] = "NIC is required";
       } elseif ($this->exists('nic', $data['nic'], $isUpdate ? $data['ID'] : null)) { // Check for existing NIC during add/update
           $this->errors['nic'] = "NIC already exists";
       }

       // Validate password
       if (empty($data['password'])) {
           $this->errors['password'] = "Password is required";
       }

       // Validate terms acceptance
       if (empty($data['terms'])) {
           $this->errors['terms'] = "Please accept the terms and conditions";
       }

       return empty($this->errors); // Return true if no errors, false otherwise
   }

   // Check if a value already exists in the database
   public function exists($column, $value, $excludeId = null)
   {
       $query = "SELECT COUNT(*) FROM $this->table WHERE $column = :value";
       if ($excludeId) {
           $query .= " AND ID != :excludeId"; // Exclude the current user's ID if updating
       }
       $stmt = $this->connect()->prepare($query);
       $stmt->bindParam(':value', $value);
       if ($excludeId) {
           $stmt->bindParam(':excludeId', $excludeId);
       }
       $stmt->execute();
       return $stmt->fetchColumn() > 0; // Return true if the value exists
   }
}