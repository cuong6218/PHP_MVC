<?php

namespace App\Model;

class BookManager
{
    private $database;
    function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }
    function getAll()
    {
        $sql = "SELECT * FROM books";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $books = [];
        foreach ($data as $item) {
            $book = new Book($item['name'], $item['author'], $item['status'], $item['image']);
            $book->setId($item['id']);
            array_push($books, $book);
        }
        return $books;
    }
    function add($book)
    {
        $sql = "INSERT INTO `books`(`name`, `author`, `status`,`image`) VALUES (:name, :author, :status, :image)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $book->getName());
        $stmt->bindParam(':author', $book->getAuthor());
        $stmt->bindParam(':status', $book->getStatus());
        $stmt->bindParam(':image', $book->getImage());
        $stmt->execute();
    }
    function delete($id)
    {
        $sql = "DELETE FROM `books` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    function getBookById($id)
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $book = $stmt->fetch();
        return $book;
    }
    function update($book)
    {
        $sql = "UPDATE `books` SET `name`=:name,`author`=:author,`status`=:status, `image`=:image WHERE `id` = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $book->getId());
        $stmt->bindParam(':name', $book->getName());
        $stmt->bindParam(':author', $book->getAuthor());
        $stmt->bindParam(':status', $book->getStatus());
        $stmt->bindParam(':image', $book->getImage());
        $stmt->execute();
    }
    function search($keyword)
    {
        $sql = "SELECT * FROM books WHERE name LIKE :keyword";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $books = [];
        foreach ($data as $item) {
            $book = new Book($item['name'], $item['author'], $item['status'], $item['image']);
            $book->setId($item['id']);
            array_push($books, $book);
        }
        return $books;
    }
}
