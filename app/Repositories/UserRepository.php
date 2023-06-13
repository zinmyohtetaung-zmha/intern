<?php

namespace App\Repositories;


use App\Models\User;
use App\Traits\ResponseAPI;
use App\Interfaces\UserInterface;



class UserRepository implements UserInterface
{
    // Use ResponseAPI Trait in this repository 
    use ResponseAPI;

    public function getAllUsers()
    {
        return $users = User::all()->toArray();
    }

    public function getUserById($id)
    {
       
        return $user = User::find($id);
        
    }
}