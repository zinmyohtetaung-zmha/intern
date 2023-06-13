<?php

namespace App\DBTransactions\School;

use App\Classes\DBTransaction;
use App\Models\School;

class UpdateSchool extends DBTransaction
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
        $query = School::where('id', $this->id)->update(['school_name' => $this->request->school_name]);

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
