<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    public function createUser(Request $request){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase/firebase.json');
        $database = $factory->createDatabase();

        $reference = $database->getReference('users')->orderByChild('email')->equalTo($request["email"])->getSnapshot();

        if($reference->getValue()==null){
            $user = new User($request["email"], $request["name"], 0, $request["birthday"], $request["phone"]);
            $user->password = $request["password"];
            $reference = $database->getReference('users')->push($user->exportToJson());
            $responseData = new \stdClass();
            $responseData->message = "Usuario registrado con éxito";
            $responseData->code = 0;
            $responseData->body = $reference->getKey();
            return json_encode($responseData);
        }else{
            $responseData = new \stdClass();
            $responseData->message = "El usuario ya existe.";
            $responseData->code = 1;
            $responseData->body = null;
            return json_encode($responseData);
        }
    }

    public function loginUser(Request $request){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase/firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('users')->orderByChild('email')->equalTo($request["email"])->getSnapshot();
        if($reference->getValue()!=null){
            $keys = array_keys($reference->getValue());
            $obj = $reference->getValue()[$keys[0]];
            $user = new User($obj["email"], $obj["name"], $obj["role"], $obj["birthday"], $obj["phone"]);
            $user->password = $obj["password"];
            $user->id = $keys[0];
            if($user->password==$request["password"]){
                $responseData = new \stdClass();
                $responseData->message = "Usuario encontrado";
                $responseData->code = 0;
                $responseData->body = $user->exportToJson();
                return json_encode($responseData);
            }else{
                $responseData = new \stdClass();
                $responseData->message = "Contraseña incorrecta";
                $responseData->code = 1;
                $responseData->body = null;
                return json_encode($responseData);
            }
        }else{
            $responseData = new \stdClass();
            $responseData->message = "Usuario no encontrado";
            $responseData->code = 2;
            $responseData->body = null;
            return json_encode($responseData);
        }
    }
}
