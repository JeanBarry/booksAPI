<?php 

class Database{
    private $url;
    private $host;
    private $user;
    private $pass;
    private $port;
    private $database;
    private $conn;


    public function connect() {
      $this->conn = null;

      try { 
        $this->url = getenv('JAWSDB_URL');
        $this->dbstr = substr("$url", 8);
        $this->user = explode(":", $dbstr)[0];
        $this->pass = explode("@", explode(":", $dbstr)[1])[0];
        $this->host = explode("@", explode(":", $dbstr)[1])[1];
        $this->port = explode("/", explode(":", $dbstr)[2])[0];
        $this->database = explode("/", explode(":", $dbstr)[2])[1];

        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->url;
    }

}



?>