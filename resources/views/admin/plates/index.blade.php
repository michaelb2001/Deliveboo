
@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex">
        <div class="col-2 bordered">
            <ul>
                <li>
                    <i class="fa-solid fa-house"></i>
                    <a href="{{route('admin.types')}}">categories</a> 
                </li>
            </ul>
        </div>

        <div class="col-8 p-3 bordered">
            @foreach($plates as $plate)
            <div class="container d-flex flex-column align-items-start">
            <h1>{{$plate->name}}</h1>
            <ul class="p-0">
                <strong>ingredients:</strong> 
                <li>
                    {{$plate->ingredients}}
                </li>
                <strong>price:</strong> 
                <li>
                    {{$plate->price}}
                </li>
                <img src="{{asset('storage/'.$plate->img)}}" alt="{{$plate->name}}">
            </ul>
            <div class="d-flex">
                <a href="{{route("admin.plate.show", $plate->id)}}"><button type="button" class="btn btn-primary m-3">See More</button></a>  <!--con questo bottone richiamo la rotta plates/show dove show sarà il numero id del mio elemento.Quindi verrò indirizzato alla vista show.blade.php-->
                <a href="{{route("admin.plate.edit", $plate->id)}}"><button type="button" class="btn btn-primary m-3">Edit</button></a>  <!--con questo bottone richiamo la rotta plates/edit dove potrò modificare il mio elemento.Quindi verrò indirizzato alla vista edit.blade.php-->
                <form action="{{route("admin.plate.destroy", $plate->id)}}" method="POST" onsubmit="return confirm('sicuro?')">
                    @csrf
                    
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger m-3">Delete</button>
                </form>
            </div>
        </div>
        <hr>

        </div>
        @endforeach
    </div>
@endsection