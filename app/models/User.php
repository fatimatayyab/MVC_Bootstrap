<?php
class User
{
    use Model;
    protected $table='user';
    protected $allowedColumns = [
      'email', 'password', 'firstname', 'lastname', 'username',
      'address', 'nationality', 'nic', 'gender',  
  ];
public function validate($data, $isUpdate = false, $userId = null)
  {
      $this->errors = []; // Clear any previous errors
  
      // Validate email
      if (empty($data['email'])) {
          $this->errors['email'] = "Email is required";
      } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
          $this->errors['email'] = "Email is not valid";
      } elseif (!$isUpdate && $this->exists('email', $data['email'])) { // Check for existing email during insert
          $this->errors['email'] = "Email already exists";
      } elseif ($isUpdate && $this->exists('email', $data['email'], $userId)) { // Check for existing email during update
          $this->errors['email'] = "Email already exists for another user";
      }
  
      // Validate username
      if (empty($data['username'])) {
          $this->errors['username'] = "Username is required";
      } elseif (!$isUpdate && $this->exists('username', $data['username'])) { // Check for existing username during insert
          $this->errors['username'] = "Username already exists";
      } elseif ($isUpdate && $this->exists('username', $data['username'], $userId)) { // Check for existing username during update
          $this->errors['username'] = "Username already exists for another user";
      }
  
      // Validate NIC
      if (empty($data['nic'])) {
          $this->errors['nic'] = "NIC is required";
      } elseif (!$isUpdate && $this->exists('nic', $data['nic'])) { // Check for existing NIC during insert
          $this->errors['nic'] = "NIC already exists";
      } elseif ($isUpdate && $this->exists('nic', $data['nic'], $userId)) { // Check for existing NIC during update
          $this->errors['nic'] = "NIC already exists for another user";
      }
  
      // Validate password
      if (empty($data['password'])) {
          $this->errors['password'] = "Password is required";
      }
  
      return empty($this->errors); // Return true if no errors, false otherwise
  }
  
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