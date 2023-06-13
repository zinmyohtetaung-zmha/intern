<?php

namespace App\DBTransactions\StdClass;

use App\Classes\DBTransaction;
use App\Models\Classes;

class CreateClass extends DBTransaction
{
    private $request;

    /**
     * Constructor to assign interface to variable
     */
    public function __construct($request)
    {
        $this->request = $request;
    }


    public function process()
    {
        $request = $this->request;

        $class  = new Classes();
        $class ->school_id = $request->school_id;
        $class ->class_name = $request->class_name;
        $class ->save();

        if (!$class) return ['status' => false, 'error' => 'Failed!'];

        return ['status' => true, 'error' => ''];
    }
}
