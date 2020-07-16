<?php

namespace App\Model;

include_once('DBConnect.php');
include_once('Student.php');
class StudentManager
{
    protected $database;
    function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }
    function getAll()
    {
        $sql = "SELECT * FROM students";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $human) {
            $student = new Student($human['name'], $human['class'], $human['phone'], $human['email']);
            $student->setId($human['id']);
            array_push($arr, $student);
        }
        return $arr;
    }
}
