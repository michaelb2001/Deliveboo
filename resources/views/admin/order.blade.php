
@extends('layouts.navbar_admin')

@section('content')
<div class="d-flex flex-row flex-wrap justify-content-around">
    @foreach ($orders as $order)
    <div class="box-order">
        <span class="order-from">Prenotazione da: <br> <h4>{{$order->name}} {{$order->surname}}</h4></span>
            <h3>Piatto: </h3>
            <div class="order-plate">
                @foreach ($order->plates as $plate)
                    <span class="plate"><h4>{{$plate->name}}</h4></span>
                @endforeach
            </div>
            <span class="order-address">All'indirizzo: <br>  <h4>{{$order->address}}</h4></span>
            <span class="phone">Numero di telefono: <br> <h4>{{$order->phone}}</h4></span>
    </div>
@endforeach

</div>

@endsection