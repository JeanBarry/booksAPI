<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include_once('../config/Database.php');
    include_once('../models/Book.php');

    $database = new Database();
    $db = $database->connect();

    $book = new Book($db);
    $book->book_id = isset($_GET['book_id']) ? $_GET['book_id'] : die();

    $result = $book->readSingle();

    $num = $result->rowCount();

    if($num > 0){
        $row = $result->fetch(PDO::FETCH_ASSOC);

        extract($row);
        
        $book_item = array(
            'book_id' => $book_id,
            'title' => $title,
            'author' => $author,
            'category' => $category
        );
        
        echo json_encode($book_item);

    }else{

        echo json_encode(array('message' => "No books found"));

    }

?>