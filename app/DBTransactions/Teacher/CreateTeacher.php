<?php

namespace App\DBTransactions\Teacher;

use App\Classes\DBTransaction;
use App\Models\Teacher;

class CreateTeacher extends DBTransaction
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function process() 
    {
        $request = $this->request;

        $teacher = new Teacher();
        $teacher->school_id = $request->school_id;
        $teacher->class_id = $request->class_id;
        $teacher->name = $request->name;
        $teacher->age = $request->age;
        $teacher->address = $request->address;
        $teacher->gender = $request->gender;
        $teacher->save();

        if(!$teacher) return ['status'=> false, 'error'=>'fail'];

        return ['status' => true, 'error' => ''];       

    }
}
