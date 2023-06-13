<?php

namespace App\DBTransactions\School;

use App\Classes\DBTransaction;
use App\Models\School;

class DeleteSchool extends DBTransaction
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function process()
    {
        $query = School::find($this->id);
        $query->delete();

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
