<?php

namespace App\DBTransactions\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Classes\DBTransaction;

/**
 * 
 * 
 * @author  
 * @create  
 */
class SaveUser extends DBTransaction
{
          private $request;

          /**
           * Constructor to assign interface to variable
           */
          public function __construct($request)
          {
              $this->request = $request;
             
          }
      
          /**
                 * Delete Email Passcode
           *
           * @author  
           * @return  array
                 */
          public function process()
          {
                    $request = $this->request;
                    $user = new User;
                    $user->name = $request->name;
                    // Remove a whitespace and make to lowercase

                    $user->email = $request->email;
                    // I dont wanna to update the password, 
                    // Password must be fill only when creating a new user.
                    $user->password = $request->password;
                    // Save the user
                    $user->save();
                    if (!$user) { #this row is delete or not
                              return ['status' => false, 'error' => 'Failed!'];
                    }
                    return ['status' => true, 'error' => ''];
          }

          

}