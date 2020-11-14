# BooksAPI

A simple REST API made in PHP to interact with books from a mysql database.

It uses HTTP requests with JSON arguments and JSON responses.



## CREATE

To add a book to the database, a POST HTTP request is created, with a JSON body including all the details for a book

The request is made to the endpoint `https://booksapi-jeanbarry.herokuapp.com/api/create.php`

with a request body including **title**, **author** and **category**, similar to:

```json
{
  "title" : "Book Thief",
  "author" : "Markus Zusak",
  "category" : "Novel"
}
```

If a book was created, a JSON `"message": "Book added"`

If no book was found, a JSON `"message": "Book not added"` will be received.



## READ

To get the books you can request the full list of books or a single book with a GET HTTP request:

A simple GET request to `https://booksapi-jeanbarry.herokuapp.com/api/read.php` without any parameters will return a list of all books.

A GET request to `https://booksapi-jeanbarry.herokuapp.com/api/readsingle.php` with a **book_id** parameter would return only the corresponding book:

`https://booksapi-jeanbarry.herokuapp.com/api/readsingle.php?book_id=21`:

It would return a JSON object of the corresponding book:

```json
{
    "book_id": "21",
    "title": "Historia de dos ciudades",
    "author": "Charles Dickens",
    "category": "Novel"
}
```

If no book was found, a JSON `"message": "No books found"` will be received.



## UPDATE

To update a book a PUT HTTP request has to be made with a JSON body to `https://booksapi-jeanbarry.herokuapp.com/api/update.php` including the **book_id** of the book to update:

```json
{
    "book_id": "21",
    "title": "El hobbit",
    "author": "J. R. R. Tolkien",
    "category": "Novel"
}
```

If update was successful, a JSON `"message": "Book updated"` will be received.

If update was not successful, a JSON `"message": "Book not updated"` will be received.



## DELETE

To delete a book a DELETE HTTP request has to be made with a JSON body to `https://booksapi-jeanbarry.herokuapp.com/api/delete.php` including the book_id of the book to delete:

```json
{
    "book_id": "21"
}
```

If a book was deleted successfully, a JSON `"message": "Book was deleted"` will be received.

If no book was deleted, a JSON `"message": "Book was not deleted"` will be received.