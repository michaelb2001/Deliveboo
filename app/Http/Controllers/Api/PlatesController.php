<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class PlatesController extends Controller
{
    //
    public function index(){
        $plates =Plate::all();
        return response()->json($plates);
    }

    public function users(){
        $users = User::all();
        foreach($users as $user){
            $user->types;
            $user->plates;
        }
        return response()->json($users);
    }

    public function user($id = null){
        $user = User::all()->where('id',$id)->first();
        $user->types;
        $user->plates;
        return response()->json($user);
    }

    public function users_type($type_id = null){
        $type = Type::all()->where('id',$type_id)->first();
        $type->users;
        return response()->json($type);
    }
}
