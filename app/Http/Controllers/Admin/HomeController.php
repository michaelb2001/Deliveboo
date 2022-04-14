<?php

namespace App\Http\Controllers\Admin;
use App\Type;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\type;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $types = Type::all();
        $LoggedUser = User::where('id',Auth::user()->id)->first();
        $typeChoice = $LoggedUser->types;
        return view('admin.types',compact("types","typeChoice"));
    }

    public function form_checkbox(Request $request){
        
        $types = Type::all();
        $LoggedUser = User::where('id',Auth::user()->id)->first();
        $typeChoice = $LoggedUser->types;
        $checked = $request->all();
        if(isset($checked['check'])){
            $checked = $checked['check'];
            $LoggedUser = User::where('id',Auth::user()->id)->first();
            $typeChoice = $LoggedUser->types->toArray();
                    
            if(isset($checked)){
                
                foreach($typeChoice as $type){
                    array_push($checked,$type['id']);
                }
                //$checked = array_merge($checked,$typeChoice);
                $LoggedUser->types()->sync($checked);

                
            }
            $LoggedUser = User::where('id',Auth::user()->id)->first();
            return view('admin.recap',compact("LoggedUser"));
            
        }else{
            
            return view('admin.types',compact("types","typeChoice"));
            echo '<script>alert("inserire almeno una categoria")</script>';
        }
        
    }

}
