
@extends('layouts.navbar_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    benvenuto {{Auth::user()->name}}!
                    {{ __(' You are logged in!')}}
                    <form method="GET" class="form_box" action="{{route('admin.types')}}">
                        @csrf

                        <ul>
                            <div>
                                Le tue categorie:
                            </div>
                            @foreach ($typeChoice as $type)
                                <li>
                                    {{$type['name']}}
                                </li>
                                
                            @endforeach

                            
                        </ul>

                        Aggiungi categoria ristorante:
                        <div class="checkbox_list">
                        @foreach ($types as $type)
                            <div class="d-flex flex-column my-2 ms-1"> 
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" class="btn-check" name="check[]" value="{{$type->id}}" id="{{$type->name}}">
                                    <label for="{{$type->name}}">{{$type->name}}</label>
                                </div>
                            </div> 
                        @endforeach
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onsubmit="aggiungiCategoria()" class="btn btn-primary">
                                    {{ __('submit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
