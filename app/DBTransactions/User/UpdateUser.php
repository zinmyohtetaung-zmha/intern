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
class UpdateUser 
{
          public function update($request,$id){
                    
                    DB::beginTransaction();
                    try {
                        User::where('id',$id)->update(['name'=>$request->name]);
                        DB::commit();
                        return['sucess'=>true];
                    } catch(\Exception $e) {
                        DB::rollBack();
                        return['sucess'=>false];
                    }   
          }

}