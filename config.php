<?php

    class config
    {
        private $host = 'localhost';
        private $username = 'root';
        private $password = '123456';
        private $database = 'text';
        
        //protected $connection;

        public function __construct()
        {   
           
            if(!isset($this->connection)){
                 try
             {
                $conn= new PDO("mysql:host=$this->host;database=$this->database", $this->username,
                $this->password);
                $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                $this->connection=$conn;
             }
             catch(PDOExeception $Exception){
                die("Fail to connect Database Server " . $Exception->getmessage());
              }
            //     $this->connection = new mysqli($this->host, $this->username, 
            //     $this->password, $this->database);
            //     if (!$this->connection){
            //         echo 'Error: Cannot connect to database server';
            //         exit; 
            //     }
            // }
            // return $this->connection;
            }
        }
    }
?>
