@extends('layouts.navbar_admin')

@section('content')
        <div class="card">
            @if(isset($plate->img))
            <img src="{{asset('storage/'.$plate->img) }}" class="img_plate" alt="{{$plate->name}}">
            @else
            <div class="img_404"></div>
            @endif
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