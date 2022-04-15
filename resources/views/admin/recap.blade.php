
@extends('layouts.navbar_admin')

@section('content')
<div class="container recap-container">
    <div class="row justify-content-center p-1">
        <div class="col-12 col-sm 12 col-md-8">
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
                                nome: {{$LoggedUser->name}}
                            </li>

                            <li>
                                email: {{$LoggedUser->email}}
                            </li>

                            <li>
                                nome attività : {{$LoggedUser->activity}}
                            </li>
                            <li>
                                p. iva: {{$LoggedUser->p_iva}}
                            </li>
                            <li>
                                indirizzo: {{$LoggedUser->address}}
                            </li>
                            <h3 class="mt-3 text-center">
                                LE TUE CATEGORIE
                            </h3>
                            @if(count($LoggedUser->types) > 0)
                                <div class="d-flex flex-wrap">
                                    @foreach ($LoggedUser->types as $type)
                                    <li>
                                        {{$type['name']}}
                                    </li>
                                    
                                @endforeach  
                                </div>
                            @else
                            <h3>Attualmente il tuo ristorante non ha categorie !</h3>
                                <h4><a href="types">Aggiungine almeno una</a></h4>
                            @endif
    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
