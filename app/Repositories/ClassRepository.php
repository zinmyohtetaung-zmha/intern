<?php

namespace App\Repositories;

use App\Interfaces\ClassInterface;
use App\Models\Classes;
use App\Traits\ResponseAPI;

class ClassRepository implements ClassInterface
{
    // Use ResponseAPI Trait in this repository 
    use ResponseAPI;

    public function getAllClasses()
    {
        return Classes::all()->toArray();
    }

    public function getClassById($id)
    {
       
        return Classes::find($id);
        
    }
}