@extends('layouts.navbar_admin')

@section('content')
    <form class="form-edit-box" action="{{route("admin.plate.update" , $plate->id)}}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <h1>
        Stai modificando <strong>{{$plate->name}}</strong>
    </h1>
    
    <div class="main-box">
        <div class="main-form-box">
            <div class="form-group">
                <label for="name">Nome Piatto</label>
                <input value="{{old("name") ? old("name") : $plate->name}}" type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" placeholder="titolo">
            </div>
        
            <div class="form-group">
                <label for="ingredients">Ingredienti</label>
                <div class="form-floating">
                    <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" placeholder="Descrizione" style="height: 50px">{{old("ingredients") ? old("ingredients") : $plate->ingredients}}</textarea>
                </div>
            </div>
        
            <div class="mb-0 form-group">
                <label for="price">Prezzo</label>
                <input type="number" step="0.01" name="price" class="p-1 form-control @error('price') is-invalid @enderror  " 
                value="{{old("price") ? old("price") : $plate->price}}">
            </div>
        
            <div class="mt-4 mb-1 form-group">
                <label for="visible"> <u>Rendere visibile alla creazione ?</u> </label><br>
                SI <input {{(old("visible") == "yes") ? "checked" : ""}} value="yes" type="radio" name="visible" id="visible">
                NO <input {{(!old("visible") || old("visible") == "no")  ? "checked" : ""}} value="no" type="radio" name="visible" id="visible">
            </div>
        
            <button type="submit" class="btn">Modifica!</button>
            
        </div>

        <div class="form-image-box mb-0">
            <div class="image-preview">
                @if(isset($plate->img))
                <img src="{{asset('storage/'.$plate->img) }}" class="" alt="{{$plate->name}}">
                @else
                <div class="img_404"></div>
                @endif
                <h2>Modifica Immagine</h2>
                <input type="file" name="img" class="p-1 form-control @error('img') is-invalid @enderror ">
            </div>
        </div>
        @error('img')
        <div class="mt-0 alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection