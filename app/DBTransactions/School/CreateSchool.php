<?php

namespace App\DBTransactions\School;

use App\Classes\DBTransaction;
use App\Models\School;

class CreateSchool extends DBTransaction
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

        $school = new School();
        $school->school_name = $request->school_name;
        $school->school_address = $request->school_address;
        $school->save();

        if (!$school) return ['status' => false, 'error' => 'Failed!'];

        return ['status' => true, 'error' => ''];
    }
}
