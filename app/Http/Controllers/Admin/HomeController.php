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
        return view('admin.home',compact("types"));
    }

    public function form_checkbox(Request $request){
        
        $checked = $request->all();
        $LoggedUser = User::where('id',Auth::user()->id)->first();
        $LoggedUser->types()->sync($checked['check']);
        return view('admin.homepage',compact('checked','LoggedUser'));
    }
}
