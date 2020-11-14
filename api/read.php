<?php 

    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include_once('../config/Database.php');
    include_once('../models/Book.php');

    $database = new Database();
    $db = $database->connect();

    $book = new Book($db);

    $result = $book->read();

    $num = $result->rowCount();


    if($num > 0){
        $book_array = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $book_item = array(
                'book_id' => $book_id,
                'title' => $title,
                'author' => $author,
                'category' => $category
            );

            array_push($book_array, $book_item);
        }

        echo json_encode($book_array);
    }else{
        echo json_encode(array('message' => 'No books found'));
    }
?>