<?php

namespace App\DBTransactions\StdClass;

use App\Classes\DBTransaction;
use App\Models\Classes;

class DeleteClass extends DBTransaction
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function process()
    {
        $query = Classes::find($this->id);
        $query->delete();

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
