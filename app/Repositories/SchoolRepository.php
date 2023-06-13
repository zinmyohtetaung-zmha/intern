<?php

namespace App\Repositories;

use App\Interfaces\SchoolInterface;
use App\Models\School;
use App\Traits\ResponseAPI;


class SchoolRepository implements SchoolInterface
{
    // Use ResponseAPI Trait in this repository 
    use ResponseAPI;

    public function getAllSchools()
    {
        $schools = School::all()->toArray();

        return $schools;

    }

    public function getSchoolById($id)
    {
       
        return $school = School::find($id);
        
    }
}