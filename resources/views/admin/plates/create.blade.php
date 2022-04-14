@extends('layouts.navbar_admin')

@section('content')
    <h1>Crea un nuovo Piatto!</h1>
    <form action="{{route("admin.plate.store")}}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Titolo</label>
        <input value="{{old("name")}}" type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" placeholder="titolo">
        @error('name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="form-group">
        <label for="ingredients">Contenuto</label>
        <div class="form-floating">
            <textarea class="form-control" id="ingredients" name="ingredients" placeholder="Descrizione" style="height: 100px">{{old('ingredients')}}</textarea>
        </div>
        @error('ingredients')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
    </div>

    <div class="mb-0 form-group">
        <label for="price">price</label>
        <input type="number" step="0.01" name="price" class="p-1 form-control @error('price') is-invalid @enderror ">
    </div>
    @error('price')
    <div class="mt-0 alert alert-danger">
        {{$message}}
    </div>
    @enderror

    <div class="mb-0 form-group">
        <label for="img">Aggiungi Foto</label>
        <input type="file" name="img" class="p-1 form-control @error('img') is-invalid @enderror ">
    </div>
    @error('img')
    <div class="mt-0 alert alert-danger">
        {{$message}}
    </div>
    @enderror

    <div class="mt-4 mb-1 form-group">
        <label for="visible"> <u>Pubblicare alla creazione ?</u> </label>
        SI <input {{(old("visible") == "yes") ? "checked" : ""}} value="yes" type="radio" name="visible" id="visible">
        NO <input {{(old("visible") == "no") ? "checked" : ""}} value="no" type="radio" name="visible" id="visible">
        @error('visible')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">CREA</button>
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