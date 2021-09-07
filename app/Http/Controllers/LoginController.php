<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class LoginController extends Controller
{
    public $successStatus = 200;

    /*
    * * login
    ** Funcion que realiza el logueo de un usuario
    */
    public function login(Request $request){
        // $credentials -> almacena el email y password del request
        $credentials = $request->only('email', 'password');
        // attempt, Para validar si existe el usuario con las credencials del request
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            // $dataResponse, almacena un array del token de acceso
            $dataResponse = array(
                'token' => $user->createToken('prueba')->accessToken,
                'status' => $this->successStatus
            );
            return response()->json(['success' => $dataResponse], $this->successStatus);
        // en caso de no encontrar al usuario
        }else{
            $this->successStatus = 401;
            return response()->json(['error'=>'Unauthorised', 'status' => $this->successStatus],  $this->successStatus);
        }
    }

    /*
    * * register
    ** Funcion que realiza el rejistro de un nuevo usuario
    */
    public function register(Request $request){
        // $validator, Se encarga de validar nuestros variables del request
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        // Condicion, Que valida los errores
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        // Si pasa la validacion se realiza el registro
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('prueba')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
}
