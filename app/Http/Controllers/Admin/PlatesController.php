<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlatesController extends Controller
{
    protected $validation = [
        "name" => "required",
        "ingredients" => "required",
        "visible" => "required",
        "price" => "min : 1",
        "img" => "image",
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::where("user_id",Auth::user()->id)->get();
        return view('admin.plates.index',compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);
        $data = $request->all();

        $new_plate = new Plate();
        if(isset($data['img'])){
            $path = Storage::put('uploads' , $data['img']);
            $new_plate->img = $path;
        }

        if($data["visible"] == 'no')
            $new_plate->visible = false;

        $new_plate->user_id = Auth::user()->id;

        $new_plate->fill($data);
        $new_plate->save();

        return redirect()->Route('admin.plate.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        if($plate->user_id != Auth::user()->id){
            $plates = Plate::where("user_id",Auth::user()->id)->get();
            echo '<script>alert("piatto non disponibile. Ecco i tuoi piatti")</script>';
            return view('admin.plates.index',compact('plates'));
            
        }else{
            return view('admin.plates.show' , compact('plate'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();
        return redirect()->route('admin.plate.index');
    }
}
