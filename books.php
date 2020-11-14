<?php 

    $read_url = "https://booksapi-jeanbarry.herokuapp.com/api/read.php";
    $books = json_decode(file_get_contents($read_url));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BooksAPI</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-item"><a href="index.php">Home</a></li>
                <li class="nav-item"><a href="books.php">Books</a></li>
            </ul>
        </nav>
    </header>
    <main class="main-section-books">
        <h1 class="main-title-books">BooksAPI</h1>
        <div class="main-book-container">
            <?php 

                if(count($books) > 0){
                    foreach($books as $book){
                        echo "<div class='book-container'>";
                        foreach($book as $item => $value){
                            switch($item){
                                case "book_id":
                                    echo "<p class='book-id'>Book Id : $value</p>";
                                break;

                                case "title":
                                    echo "<p class='book-info'>$value</p>";
                                break;

                                case "author":
                                    echo "<p class='book-info'>$value</p>";
                                break;

                                case "category":
                                    echo "<p class='book-info'>$value</p>";
                                break;

                            }
                                
                        }
                        echo "</div>";
                    }
                        
                }else{
                    echo '
                        <div class="book-container">
                            <p class="error-message">No books found</p>
                        </div>
                    ';
                }
            
            ?>
        </div>
    </main>

</body>

</html>