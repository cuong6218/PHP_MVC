<?php

namespace App\Controller;

use App\Model\StudentManager;

class StudentController
{
    protected $studentManager;
    function __construct()
    {
        $this->studentManager = new StudentManager();
    }
    function show()
    {
        $listStudent = $this->studentManager->getAll();
        include_once('src/View/student_view/listStudent.php');
    }
}
