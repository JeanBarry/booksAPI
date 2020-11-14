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

        public function create(){

            $query = "INSERT INTO {$this->table} VALUES (null, '?', '?', '?');";
            

            $stmt = $this->conn->prepare($query);

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category = htmlspecialchars(strip_tags($this->category));

            $stmt->bindParam(1, $this->title);
            $stmt->bindParam(2, $this->author);
            $stmt->bindParam(3, $this->category);

            echo $query;

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }
    }

?>