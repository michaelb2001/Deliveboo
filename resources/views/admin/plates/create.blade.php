@extends('layouts.navbar_admin')

@section('content')
    <div class="container ms_container_create">

        {{-- titolo --}}
        <h1 class="ms_title">Aggiungi un nuovo piatto</h1>
        <form action="{{route("admin.plate.store")}}" enctype="multipart/form-data" method="POST">
        @csrf

        {{-- nome del piatto --}}
        <div class="form-group">
            <label for="name" class="ms_title_plate">Nome del piatto</label>
            <input value="{{old("name")}}" type="text" class="form-control col-12 col-sm-9 col-md-5 col-lg-5 ms_form_plate @error('name') is-invalid @enderror " id="name" name="name" placeholder="Titolo">
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        {{-- ingredienti --}}
        <div class="form-group">
            <label for="ingredients" class="ms_title_ingredients">Ingredienti</label>
            <div class="form-floating">
                <textarea class="form-control col-12 col-sm-10 col-md-9 col-lg-6 ms_form_ingredients" id="ingredients" name="ingredients" placeholder="Descrizione" style="height: 100px">{{old('ingredients')}}</textarea>
            </div>
            @error('ingredients')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>

        {{-- prezzo --}}
        <div class="mb-3 form-group">
            <label for="price" class="ms_title_price">Prezzo</label>
            <input type="number" step="0.01" name="price" class="p-1 form-control col-3 col-md-1 col-lg-1 ms_form_price @error('price') is-invalid @enderror ">
        </div>
        @error('price')
        <div class="mt-0 alert alert-danger">
            {{$message}}
        </div>
        @enderror

        {{-- immagine --}}
        <div class="mb-0 form-group">
            <label for="img" class="ms_title_img">Aggiungi immagine del piatto</label>
            <input type="file" name="img" class="p-1 form-control col-9 col-sm-7 col-md-5 col-lg-4 ms_form_img @error('img') is-invalid @enderror ">
        </div>
        @error('img')
        <div class="mt-0 alert alert-danger">
            {{$message}}
        </div>
        @enderror

        {{-- scelta di pubblicazione --}}
        <div class="mt-4 mb-1 form-group">
            <label for="visible"> 
                <u>Pubblicare alla creazione?</u> 
            </label>
            <span class="ms_input_yes">SI 
                <input {{(old("visible") == "yes") ? "checked" : ""}} value="yes" type="radio" name="visible" id="visible">
            </span>
            <span class="ms_input_no">NO 
                <input {{(old("visible") == "no") ? "checked" : ""}} value="no" type="radio" name="visible" id="visible">
            </span>
            @error('visible')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        {{-- bottone per aggiungere il piatto --}}
        <button type="submit" class="btn ms_button_create">CREA</button>
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
    </div>
@endsection