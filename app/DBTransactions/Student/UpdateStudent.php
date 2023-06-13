<?php

namespace App\DBTransactions\Student;

use App\Classes\DBTransaction;
use App\Models\Student;

class UpdateStudent extends DBTransaction
{

    private $request;
    private $id;

    public function __construct($request, $id)
    {
        $this->request = $request;
        $this->id = $id;
    }

    public function process()
    {
        $query = Student::where('id', $this->id)->update(['name' => $this->request->name]);

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
