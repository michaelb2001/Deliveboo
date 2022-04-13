@extends('layouts.navbar_admin')

@section('content')
        <div class="card">
            <img style="width: 100px" src="{{asset('storage/'.$plate->img)}}" alt="{{$plate->name}}">
            <h1> {{$plate->name}} </h1>
            <p> {{$plate->ingredients}} </p>
            <strong>price:</strong> 
            {{$plate->price}}
                @if($plate->visible)
                    <h3>Il piatto è visibile</h3>
                    @else
                        <h3>Il piatto NON è visibile</h3>
                @endif
        </div>
        <a href="/admin/plate">
            <h3 class="mt-2">Torna ai plate</h3>
        </a>
@endsection