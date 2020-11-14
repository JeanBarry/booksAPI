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

            $query = "INSERT INTO {$this->table} VALUES (null, :title, :author, :category);";
            

            $stmt = $this->conn->prepare($query);

            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category = htmlspecialchars(strip_tags($this->category));

            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":author", $this->author);
            $stmt->bindParam(":category", $this->category);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        public function update(){

            $query = "UPDATE {$this->table} SET title = :title, author = :author, category = :category WHERE book_id = :book_id";

            $stmt = $this->conn->prepare($query);

            $this->book_id = htmlspecialchars(strip_tags($this->book_id));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category = htmlspecialchars(strip_tags($this->category));

            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":author", $this->author);
            $stmt->bindParam(":category", $this->category);
            $stmt->bindParam(":book_id", $this->book_id);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %S.\n", $stmt->error);

            return false;
        }

        public function delete(){

            $query = "DELETE FROM {$this->table} WHERE book_id = :book_id";

            $stmt = $this->conn->prepare($query);

            $this->book_id = htmlspecialchars(strip_tags($this->book_id));

            $stmt->bindParam(":book_id", $this->book_id);

            if($stmt->execute()){
                return true;
            }

            printf("Error: %S.\n", $stmt->error);

            return false;
        }
    }

?>