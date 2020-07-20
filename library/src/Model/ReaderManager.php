<?php

namespace App\Model;

class ReaderManager
{
    private $database;
    function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }
    function getAll()
    {
        $sql = "SELECT * FROM readers";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $readers = [];
        foreach ($data as $person) {
            $reader = new Reader($person['name'], $person['age'], $person['phone'], $person['email']);
            $reader->setId($person['id']);
            array_push($readers, $reader);
        }
        return $readers;
    }
    function add($reader)
    {
        $sql = "INSERT INTO `readers`(`name`, `age`, `phone`, `email`) VALUES (:name, :age, :phone, :email)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $reader->getName());
        $stmt->bindParam(':age', $reader->getAge());
        $stmt->bindParam(':phone', $reader->getPhone());
        $stmt->bindParam(':email', $reader->getEmail());
        $stmt->execute();
    }
    function delete($id)
    {
        $sql = 'DELETE FROM `readers` WHERE `id` = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    function getReaderById($id)
    {
        $sql = "SELECT * FROM readers WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $reader = $stmt->fetch();
        return $reader;
    }
    function update($reader)
    {
        $sql = "UPDATE `readers` SET `name`=:name,`age`=:age,`phone`=:phone,`email`=:email WHERE `id` = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $reader->getId());
        $stmt->bindParam(':name', $reader->getName());
        $stmt->bindParam(':age', $reader->getAge());
        $stmt->bindParam(':phone', $reader->getPhone());
        $stmt->bindParam(':email', $reader->getEmail());
        $stmt->execute();
    }
}
