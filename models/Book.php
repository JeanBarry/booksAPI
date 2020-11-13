<?php 

    class Book{
        private $conn;
        private $table = 'books';

        public $book_id;
        public $title;
        public $author;
        public $category;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){

            $query = "SELECT * FROM {$this->table};";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();

            return $stmt;
            
        }

        public function readSingle(){

            $query = "SELECT * FROM {$this->table} WHERE book_id = ? LIMIT 0,1;";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(1, $this->book_id);

            $stmt->execute();

            return $stmt;
        }
    }

?>