<?php

namespace App\Model;

class BorrowManager
{
    private $database;
    function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }
    function getAll()
    {
        $sql = "SELECT * FROM borrow_cards";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $borrow_cards = [];
        foreach ($data as $item) {
            $borrow_card = new BorrowCard($item['borrow_date'], $item['return_date'], $item['reader_id']);
            $borrow_card->setId($item['id']);
            array_push($borrow_cards, $borrow_card);
        }
        return $borrow_cards;
    }
    function add($borrowCard)
    {
        $sql = "INSERT INTO `borrow_cards`(`borrow_date`, `return_date`, `reader_id`) VALUES (:borrow_date, :return_date, :reader_id)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':borrow_date', $borrowCard->getBorrow_date());
        $stmt->bindParam(':return_date', $borrowCard->getReturn_date());
        $stmt->bindParam(':reader_id', $borrowCard->getReader_id());
        $stmt->execute();
    }
}
