<?php

namespace App\Interfaces;

interface TeacherInterface
{
  
    public function getAllTeachers();

    public function getTeacherById($id);

}