<?php

namespace App\Repositories;

use App\Interfaces\StudentInterface;
use App\Models\Student;
use App\Traits\ResponseAPI;


class StudentRepository implements StudentInterface
{
    // Use ResponseAPI Trait in this repository 
    use ResponseAPI;

    public function getAllStudents()
    {
         $students = Student::all()->toArray();
         return $students;
    }

    public function getStudentById($id)
    {       
        return Student::find($id);        
    }

    public function joinTable()
    {
        $query = Student::join('classes', 'classes.id', '=', 'students.class_id')
                            ->join('schools', 'schools.id', '=', 'students.school_id')
                            ->join('teachers', 'teachers.school_id', '=', 'schools.id')
                            ->select('students.name as student_name', 'classes.class_name', 'schools.school_name',  'teachers.name as teacher_name')
                            ->get();

        return $query;
    }
}