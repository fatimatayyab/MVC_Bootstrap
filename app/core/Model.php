<?php

Trait Model {

    use Database;
    
    protected $limit        =   10;    
    protected $offset       =   0;
    protected $order_type   =   'asc';
    protected $order_column =   'id';
    public $errors       =   [];
  


    public function first($data, $data_not=[]){
        $keys=array_keys($data);
        $keys_not=array_keys($data_not);
        $query= "select * from $this->table where ";
        foreach($keys as $key){
            $query.= $key." = :".$key." && ";
        }  foreach($keys_not as $key){
            $query.= $key." != :".$key." && ";
        }
        $query= trim($query, " && ");

       $query.= " limit $this->limit offset $this->offset"; 
       $data=array_merge($data, $data_not);
       $result= $this->query($query, $data);
        if($result)
            return $result[0];
        return false;
   
    }

    public function findAll(){
       

       $query= " select * from $this->table order by $this->order_column $this->order_type  limit $this->limit offset $this->offset"; 
    
         return $this->query($query);
   
    }
    public function where($data, $data_not=[]){
        $keys=array_keys($data);
        $keys_not=array_keys($data_not);
        $query= "select * from $this->table where ";
        foreach($keys as $key){
            $query.= $key." = :".$key." && ";
        }  foreach($keys_not as $key){
            $query.= $key." != :".$key." && ";
        }
        $query= trim($query, " && ");

       $query.= " limit $this->limit offset $this->offset"; 
       $data=array_merge($data, $data_not);

         return $this->query($query, $data);
   
    }
    public function insert($data) {
        if(!empty($this->allowedColumns)) {
            foreach($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        
        // Debug: Check the data being inserted
        error_log(print_r($data, true));
    
        // Hash the password before inserting
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(",", $keys) . ") VALUES (:" . implode(", :", $keys) . ")";
        
        // Execute query and check if it succeeded
        if ($this->query($query, $data)) {
            return true;
        }
        
        return false;  // Log failure here if needed
    }
        public function update($id, $data, $id_column='id')
    {  
        if(!empty($this->allowedColumns))
        foreach($data as $key=>$value){
            if(!in_array($key, $this->allowedColumns)){
                unset($data[$key]);     
            }
        }
        $keys=array_keys($data);
        $query= "update $this->table set ";  
        foreach($keys as $key){
            $query.= $key." = :".$key.", ";
        } 
        $query= trim($query, " , ");
        $query.= " where $id_column = :$id_column"; 
        $data [$id_column]=$id;

        $this->query($query, $data);
        return true; 


    }
    public function delete($id, $id_column='id'){
        $data[$id_column]=$id;
     
        $query= "delete from $this->table where $id_column = :$id_column";

        $this->query($query, $data);
    }
   


}