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

    public function searchTypes($input = null){
        if($input != null){
            $new_str = preg_replace("/\s+/", "*", $input);
            $input = $new_str;
            $types = Type::whereRaw("REPLACE(name, ' ' ,'') LIKE ?", $input.'%')->get();
            foreach($types as $type){
                $type['users'] = $type->users;
            }
        }
        return response()->json($types);
    }

    public function searchUsers($input = null){
        if($input != null){
            $new_str = preg_replace("/\s+/", "*", $input);
            $input = $new_str;
            $users = User::whereRaw("REPLACE(activity, ' ' ,'') LIKE ?", $input.'%')->get();
        }
        return response()->json($users);
    }

    public function getAllTypes(){
        $types = Type::all();
        return response()->json($types);
    }

    public function getUser($activity = null){
        $user = User::all()->where('activity',$activity)->first();
        $user->plates;
        $user->types;
        return response()->json($user);
    }

    public function getUserFromType($typeArr = null){
        $typeArr = explode(',',$typeArr);

        foreach($typeArr as $type)
            $convert[] = (int)$type;
        
        foreach($convert as $type_id)
            $users[] = Type::all()->where('id',$type_id)->first()->users;

       foreach($users as $index=>$user)
            if(count($user) <= 0)
                unset($users[$index]);

        if(count($users) <= 0)
            return response()->json([]);

        foreach($users as $index=>$user)
            foreach($user as $controlId)
                $control[] = $controlId->id;

       $control = array_unique($control);

        $finalArray = [];

        foreach($control as $toPush){
            $pushed = false;
            foreach($users as $user){
                foreach($user as $test){
                    if($toPush == $test->id){
                        $test->plates;
                        $test->types;
                        $finalArray[] = $test;
                        $pushed = true;
                    }
                }
                if($pushed)
                break;
            }
        }
        
        return response()->json($finalArray);
    }
}
