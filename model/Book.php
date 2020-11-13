<?php 

    class Book{
        private $conn;
        private $table = 'books';

        public $id;
        public $title;
        public $author;
        public $category;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){

            $query = "SELECT * from {$this->table}";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
            
        }
    }

?>