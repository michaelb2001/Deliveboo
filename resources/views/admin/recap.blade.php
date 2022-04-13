
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
                    benvenuto {{Auth::user()->name}}! <br>
                    Questi sono i tuoi dati : 
                    {{ __(' You are logged in!')}}
                        <ul>
                            <li>profile : 
                                <img src="{{ asset("storage/".$LoggedUser->img) }}">
                            </li>
                            <li>
                                name: {{$LoggedUser->name}};
                            </li>

                            <li>
                                email: {{$LoggedUser->email}};
                            </li>

                            <li>
                                activity : {{$LoggedUser->activity}}
                            </li>
                            <li>
                                p. iva: {{$LoggedUser->p_iva}};
                            </li>
                            <li>
                                address: {{$LoggedUser->address}};
                            </li>
                            <div>
                                Le tue categorie:
                            </div>
                            @foreach ($LoggedUser->types as $type)
                                <li>
                                    {{$type['name']}}
                                </li>
                                
                            @endforeach    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
