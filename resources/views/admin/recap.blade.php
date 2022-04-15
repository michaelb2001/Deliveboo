
@extends('layouts.navbar_admin')

@section('content')
<div class="container recap-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('I TUOI DATI') }}</div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <ul>
                                <img src="{{ asset("storage/".$LoggedUser->img) }}" class="img_profile">
                            <li>
                                nome: {{$LoggedUser->name}};
                            </li>

                            <li>
                                email: {{$LoggedUser->email}};
                            </li>

                            <li>
                                nome attività : {{$LoggedUser->activity}}
                            </li>
                            <li>
                                p. iva: {{$LoggedUser->p_iva}};
                            </li>
                            <li>
                                indirizzo: {{$LoggedUser->address}};
                            </li>
                            <div class="text-center">
                                LE TUE CATEGORIE
                            </div>
                            <div class="d-flex felx-wrap">
                                @foreach ($LoggedUser->types as $type)
                                <li>
                                    {{$type['name']}}
                                </li>
                                
                            @endforeach  
                            </div>
    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
