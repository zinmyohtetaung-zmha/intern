<?php

namespace App\DBTransactions\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;

/**
 * 
 * 
 * @author  
 * @create  
 */
class DeleteUser 
{
          public function update($id){
                    
                    DB::beginTransaction();
                    try {
                        User::where('id',$id)->delete();
                        DB::commit();
                        return['sucess'=>true];
                    } catch(\Exception $e) {
                        DB::rollBack();
                        return['sucess'=>false];
                    }   
          }

}