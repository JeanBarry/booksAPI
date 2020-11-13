<?php 

class Database{
    private $url;
    private $conn;


    public function connect() {
      $this->conn = null;

      try { 
        $this->url = getenv("CLEARDB_DATABASE_URL");

        $dbparts = parse_url($this->url);

        $hostname = $dbparts['host'];
        $username = $dbparts['user'];
        $password = $dbparts['pass'];
        $database = ltrim($dbparts['path'],'/');

        $this->conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }

}



?>