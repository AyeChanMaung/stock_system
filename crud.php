<?php

    include_once 'config.php';

    class crud extends config
    {
        public function __construct()
        {
            parent:: __construct();
        }
        public function data($query)
        {
            $result = $this->connection->query($query);
            if($result == false){
                return false;
            }
            $rows = array();
            while ($rows = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        public function execute($query)
        {
            $result = $this->connection->query($query);
            if($result == false)
            {
                echo 'Error';
                return false;
            }else{
                return true;
            }
        }
        public function delete($id, $tbl)
        {
            $query = "DELETE FROM $tbl WHERE id = $id";
            $result = $this->connection->query($query);
            if($result == false){
                echo 'ERROR: cannot delete id ' . $id . ' from ' . $tbl ;
                return false;
            }else{
                return true;
            }
        }
        public function escape_string($value)
        {
            return $this->connection->real_escape_string($value);
        }
    }

?>