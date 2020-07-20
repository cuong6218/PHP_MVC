<?php

namespace App\Controller;

use App\Model\BorrowCard;
use App\Model\BorrowCardManager;

class BorrowCardController
{
    private $borrowCardManager;
    function __construct()
    {
        $this->borrowCardManager = new BorrowCardManager();
    }
    function viewBorrowCard()
    {
        $borrowCards = $this->borrowCardManager->getAll();
        include_once('src/View/borrowCard_view/list-borrow.php');
    }
    function addBorrowCard()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            include_once('src/View/borrowCard_view/add-borrow.php');
        else {
            $borrowDate = $_REQUEST['borrow_date'];
            $returnDate = $_REQUEST['return_date'];
            $readerId = $_REQUEST['reader_id'];
            $borrowCard = new BorrowCard($borrowDate, $returnDate, $readerId);
            $this->borrowCardManager->add($borrowCard);
            header('location:index.php?page=list-borrow');
        }
    }
}
