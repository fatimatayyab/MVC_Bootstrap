<?php
class User
{
    use Model;
    protected $table='user';
    protected $allowedColumns = [
      'email', 'password', 'firstname', 'lastname', 'username',
      'address', 'nationality', 'nic', 'gender',  // Add 'city' here if needed
  ];

    public function validate($data)
    {
      $this->errors=[];
      if(empty($data['email']))
      {
        $this->errors['email']="Email is required";
      }
       else 
      if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
      {
        $this->errors['email']="Email is not valid";
    }
    if(empty($data['password']))
    {
      $this->errors['password']="Password is required";
    } if(empty($data['terms']))
    {
      $this->errors['terms']="Please accept the terms and conditions";
    }
        
    error_log(print_r($this->errors, true));
      if(empty($this->errors))
      {
        return true;
      }
      return false;
    }
}