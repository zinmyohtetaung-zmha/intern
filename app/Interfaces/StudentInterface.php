<?php

namespace App\Interfaces;

interface StudentInterface
{
  
    public function getAllStudents();

    public function getStudentById($id);

    public function joinTable();

}