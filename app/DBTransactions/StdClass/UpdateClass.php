<?php

namespace App\DBTransactions\StdClass;

use App\Classes\DBTransaction;
use App\Models\Classes;

class UpdateClass extends DBTransaction
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
        $query = Classes::where('id', $this->id)->update(['class_name' => $this->request->class_name]);

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
