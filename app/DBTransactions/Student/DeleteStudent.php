<?php

namespace App\DBTransactions\Student;

use App\Classes\DBTransaction;
use App\Models\Student;

class DeleteStudent extends DBTransaction
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function process()
    {
        $query = Student::find($this->id);
        $query->delete();

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
