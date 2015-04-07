<?php
// to create a class, you put classs then you put the name of the classs afterwards.
// the class I am creating is going to take repeated code and make our code easier to read. A class is an object. A class can have variables inside. Classes store information so you can call it later. 
class Database
{
    private $connection;
    private $host;
    private $password;
    private $username;
    private $database;
    public $error;
    public function __construct($host, $username, $password, $database)
    {
        $this->host     = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        
        
        $this->connection = new mysqli($host, $username, $password);
        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
        // checks to see if the database exists
        $exists = $this->connection->select_db($database);
        // kills the program if there is a connection error.
        if (!$exists) {
            // sending commands to the Database
            $query = $this->connection->query("CREATE DATABASE $database");
            if ($query) {
                echo "Successfully created database: " . $database . "</p>";
            }
        } else {
            echo "<p>database already exists.<p>";
            // since a datebase exists already, this else statent runs
            
            
        }
    }
    // this mysqli checks if the connection works, if it doesnt, then the program dies.
    public function openConnection()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->connection->connect_error) {
            die("<p>Error: " . $this->connection->connect_error . "</p>");
        }
    }
    public function closeConnection()
    {
        // this if statemnet checks to see if we able open up a connection. The isset checks to see if theres something inside the variable. If there is not isset then isset returns no
        if (isset($this->connection)) {
            $this->connection->close();
        }
    }
    
    public function query($string)
    {
        $this->openConnection();
        // querys the  database
        $query = $this->connection->query($string);
        
        if (!$query) {
            $this->error = $this->connection->error;
        }
        
        $this->closeConnection();
        
        return $query;
    }
    
}



?>