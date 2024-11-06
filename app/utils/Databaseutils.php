<?php
class DatabaseUtils {
    
    use Database;

    public function createTable($table_name, $columns) {
        // Build the query to create the table
        $query = "CREATE TABLE IF NOT EXISTS $table_name (";

        // Loop through the columns array to create the column definitions
        $column_defs = [];
        foreach ($columns as $column_name => $column_details) {
            $column_defs[] = "$column_name $column_details";
        }

        // Join column definitions with commas
        $query .= implode(", ", $column_defs);
        $query .= ")";


        return $this->query($query);
    }

       public function addColumns($table_name, $columns) {
        $column_defs = [];
        foreach ($columns as $column_name => $column_definition) {
            $column_defs[] = "ADD COLUMN $column_name $column_definition";
        }
    
        // Combine the ADD COLUMN definitions into a single query
        $query = "ALTER TABLE $table_name " . implode(", ", $column_defs);
    
        // Execute the query
        return $this->query($query);
    }

    public function generateModelFile($table_name, $columns)
    {
        // Convert table name to PascalCase for the class name (e.g. "users" -> "Users")
        $class_name = ucfirst($table_name);
    
        // Prepare the allowed columns array (capitalize column names)
        $allowed_columns = array_map('ucfirst', array_keys($columns));
    
        // Define the model class template with just the table and allowed columns
        $model_code = "<?php\n\n";
        $model_code .= "class $class_name\n";
        $model_code .= "{\n";
        $model_code .= "    use Model;\n\n"; // Include the Model trait
    
        // Define table name and allowed columns
        $model_code .= "    protected \$table = '$table_name';\n\n";
        $model_code .= "    protected \$allowedColumns = " . var_export($allowed_columns, true) . ";\n";
    
        // Close the class definition
        $model_code .= "}\n";
    
        // Set the file path where the model file will be saved
        $file_path = "../app/models/$class_name.php";
    
        // Check if the file already exists
        if (file_exists($file_path)) {
            echo "Model file for table '$table_name' already exists at '$file_path'.\n";
            return;
        }
    
        // Create the model file and write the class code to it
        file_put_contents($file_path, $model_code);
    
        echo "Model file for table '$table_name' has been created at '$file_path'.\n";
    }
}