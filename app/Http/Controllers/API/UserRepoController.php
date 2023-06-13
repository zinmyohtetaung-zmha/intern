<?php

namespace App\Http\Controllers\API;

use App\DBTransactions\User\DeleteUser;
use App\Models\User;
use App\Traits\ResponseAPI;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DBTransactions\User\SaveUser;
use App\DBTransactions\User\UpdateUser;

class UserRepoController extends Controller
{
    use ResponseAPI;

    protected $userInterface;

    /**
     * Create a new constructor for this controller
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $usersData = $this->userInterface->getAllUsers();
            // Check the user
            if(!$usersData) return $this->error("No user Data", 404);
            return $this->success("All Users", $usersData);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
           
            $save = new SaveUser($request);

            $save = $save->executeProcess();

            if ($save) {
                return $this->success("success",$save);
            }else{
                return $this->error("error", 404);
            }
        } catch(\Exception $e) {
            return $this->error("error", 404);
        }
    }
       

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = $this->userInterface->getUserById($id);
            // Check the user
            if(!$user) return $this->error("No user with ID $id", 404);
            return $this->success("User Detail", $user);
        } catch(\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = $this->userInterface->getUserById($id);
            // Check the user
            if(!$user) return $this->error("No user Data", 404);
            $update = new UpdateUser();
            $update =  $update->update($request,$id);
            
            if ($update['sucess']==true) {
                return $this->success("success",$update);
            }else{
                return $this->error("error", 404);
            }
        } catch(\Exception $e) {
            return $this->error("error", 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = $this->userInterface->getUserById($id);
            // Check the user
            if(!$user) return $this->error("No user Data", 404);
            $delete = new DeleteUser();
            $delete =  $delete->update($id);
            
            if ($delete['sucess']==true) {
                return $this->success("success",$delete);
            }else{
                return $this->error("error", 404);
            }
        } catch(\Exception $e) {
            return $this->error("error", 404);
        }
    }
}
