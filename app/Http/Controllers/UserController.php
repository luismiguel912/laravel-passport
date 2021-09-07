<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
