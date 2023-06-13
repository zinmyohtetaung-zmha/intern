<?php

namespace App\DBTransactions\Teacher;

use App\Classes\DBTransaction;
use App\Models\Teacher;

class UpdateTeacher extends DBTransaction
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
        $query = Teacher::where('id', $this->id)->update(['name' => $this->request->name]);

        if (!$query) {
            return ['status' => false, 'error' => 404];
        }
        return ['status' => true, 'error' => ""];
    }
}
