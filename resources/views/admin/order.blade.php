
@extends('layouts.navbar_admin')

@section('content')
    @foreach ($orders as $order)
    <h2>Prenotazione da {{$order->name}} {{$order->surname}}</h2>
        @foreach ($order->plates as $plate)
            <p>{{$plate->name}}</p>
        @endforeach
        <h2>All'indirizzo da {{$order->address}}</h2>
        <h2>telefono {{$order->phone}}</h2>
    @endforeach
@endsection