<?php 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once('../../config/Database.php');
    include_once('../../models/Book.php');

    $database = new Database();
    $db = $database->connect();

    $book = new Book($db);

    $data = json_decode(file_get_contents("php://input"));

    $book->book_id = $data->book_id;

    if($book->delete()){
        echo json_encode(
            array('message'=>'Book was deleted')
        );
    }else{
        echo json_encode(
            array('message'=>'Book was not deleted')
        );
    }
?>