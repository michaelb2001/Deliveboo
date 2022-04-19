<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Plate;
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
        return response()->json($users);
    }
}
