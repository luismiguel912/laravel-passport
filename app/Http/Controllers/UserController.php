<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource as UserResource;

class UserController extends Controller
{
    public $successStatus = 200;

    /*
    * * all
    ** Funcion que consulta todos los usuarios
    */
    public function all(){
        return response()->json(['status'=>true, 'data' => User::all()],  $this->successStatus);
    }

    public function getUser($user_id){
        $user = User::find($user_id);
        // return response()->json(['status'=>true, 'data' => $user],  $this->successStatus);
        return response()->json(['status'=>true, 'data' => new UserResource($user)],  $this->successStatus);
    }
}
