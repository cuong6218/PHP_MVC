<?php

use App\Controller\BookController;
use App\Controller\BorrowCardController;
use App\Controller\ReaderController;

require __DIR__ . "/vendor/autoload.php";

$bookController = new BookController();
$readerController = new ReaderController();
$borrowController = new BorrowCardController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : "";
switch ($page) {
    case 'list-book':
        $bookController->viewBook();
        break;
    case 'add-book':
        $bookController->addBook();
        break;
    case 'delete-book':
        $bookController->deleteBook();
        break;
    case 'update-book':
        $bookController->updateBook();
        break;
    case 'search-book':
        $bookController->searchBook();
        break;
    case 'list-reader':
        $readerController->viewReader();
        break;
    case 'add-reader':
        $readerController->addReader();
        break;
    case 'delete-reader':
        $readerController->deleteReader();
        break;
    case 'update-reader':
        $readerController->updateReader();
        break;
    case 'list-borrow':
        $borrowController->viewBorrowCard();
        break;
    case 'add-borrow':
        $borrowController->addBorrowCard();
        break;
    default:
        $bookController->viewBook();
}
