<?php

namespace App\DBTransactions\Student;

use App\Classes\DBTransaction;
use App\Models\Student;


class CreateStudent extends DBTransaction
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function process() 
    {
        $request = $this->request;

        $student = new Student();
        $student->school_id = $request->school_id;
        $student->class_id = $request->class_id;
        $student->name = $request->name;
        $student->age = $request->age;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->save();

        if(!$student) return ['status'=> false, 'error'=>'fail'];

        return ['status' => true, 'error' => ''];       

    }
}
