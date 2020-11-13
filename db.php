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
        $newuri = $this->url = getenv('CLEARDB_DATABASE_URL');
        $parsed = parse_url($newuri);
        $dbname = ltrim($parsed['path']. '/'); // PATH has prepended / at the beginning, it needs to be removed
        // Connecting to the database
        $this->conn = new PDO("{$parsed['scheme']}:host={$parsed};$dbname={$dbname};charset=utf8mb4", $parsed['user'], $parsed['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }

}



?>