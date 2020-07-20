<?php

namespace App\Controller;

use App\Model\BookManager;
use App\Model\Book;

class BookController
{
    private $bookManager;
    function __construct()
    {
        $this->bookManager = new BookManager();
    }
    function viewBook()
    {
        $books = $this->bookManager->getAll();
        include_once('src/View/book_view/list-book.php');
    }
    function addBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            include_once('src/View/book_view/add-book.php');
        else {
            $name = $_REQUEST['name'];
            $author = $_REQUEST['author'];
            $status = $_REQUEST['status'];
            $book = new Book($name, $author, $status, $image);
            $this->bookManager->add($book);
            header('location:index.php?page=list-book');
        }
    }
    function deleteBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->bookManager->delete($id);
            header('location:index.php?page=list-book');
        }
    }
    function updateBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $book = $this->bookManager->getBookById($id);
            include_once('src/View/book_view/update-book.php');
        } else {
            $file = $_FILES['image-file']['tmp_name'];
            $path = "uploads/" . $_FILES['image-file']['name'];
            if (move_uploaded_file($file, $path)) {
                echo "Success upload file";
            } else echo "Fail to upload file";
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $author = $_REQUEST['author'];
            $status = $_REQUEST['status'];
            $book = new Book($name, $author, $status, $image);
            $book->setId($id);
            $this->bookManager->update($book);
            header('location:index.php?page=list-book');
        }
    }
    function searchBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $keyword = $_REQUEST['keyword'];
            $books = $this->bookManager->search($keyword);
            include_once('src/View/book_view/list-book.php');
        }
    }
}
