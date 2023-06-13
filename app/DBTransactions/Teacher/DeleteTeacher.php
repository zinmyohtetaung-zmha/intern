<?php

namespace App\DBTransactions\Teacher;

use App\Classes\DBTransaction;
use App\Models\Teacher;

class DeleteTeacher extends DBTransaction
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function process()
    {
        $query = Teacher::find($this->id);
        $query->delete();

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
