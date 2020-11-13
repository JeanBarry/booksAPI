<?php 

    class Book{
        private $conn;
        private $table = 'books';

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){

            $query = "SELECT * FROM {$this->table}";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
            
        }
    }

?>