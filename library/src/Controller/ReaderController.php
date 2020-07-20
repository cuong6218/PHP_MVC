<?php

namespace App\Controller;

use App\Model\Reader;
use App\Model\ReaderManager;

class ReaderController
{
    private $readerManager;
    function __construct()
    {
        $this->readerManager = new ReaderManager();
    }
    function viewReader()
    {
        $readers = $this->readerManager->getAll();
        include_once('src/View/reader_view/list-reader.php');
    }
    function addReader()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
            include_once('src/View/reader_view/add-reader.php');
        else {
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $reader = new Reader($name, $age, $phone, $email);
            $this->readerManager->add($reader);
            header('location:index.php?page=list-reader');
        }
    }
    function deleteReader()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->readerManager->delete($id);
            header('location:index.php?page=list-reader');
        }
    }
    function updateReader(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_REQUEST['id'];
            $reader = $this->readerManager->getReaderById($id);
            include_once('src/View/reader_view/update-reader.php');
        } else {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $phone = $_REQUEST['phone'];
            $email = $_REQUEST['email'];
            $reader = new Reader($name, $age, $phone, $email);
            $this->readerManager->update($reader);
            header('location:index.php?page=list-reader');
        }
    }
}
