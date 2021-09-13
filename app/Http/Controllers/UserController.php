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
        /*
        * *UserResource
        ** Se hace uso de api Resource para responder nuestras respuestas de nuestro API Route::GET('/{user_id}','UserController@getUser');
        ** Le mandamos una coleccion de tipo User, Y manipulamos la informacion de lado de UserResource
        */
        return response()->json(['status'=>true, 'data' => new UserResource($user)],  $this->successStatus);
    }
}
