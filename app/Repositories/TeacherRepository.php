<?php

namespace App\Repositories;

use App\Interfaces\TeacherInterface;
use App\Models\Teacher;
use App\Traits\ResponseAPI;


class TeacherRepository implements TeacherInterface
{
    // Use ResponseAPI Trait in this repository 
    use ResponseAPI;

    public function getAllTeachers()
    {
        return Teacher::all()->toArray();
    }

    public function getTeacherById($id)
    {
       
        return Teacher::find($id);
        
    }
}