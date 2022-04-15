@extends('layouts.navbar_admin')

@section('content')
        <div class="card_plate">
            @if(isset($plate->img))
            <img src="{{asset('storage/'.$plate->img) }}" class="img_single_plate" alt="{{$plate->name}}">
            @else
            <div class="img_404" id="no_image"></div>
            @endif
            <h1 class="name_plate"> {{$plate->name}} </h1>
            <?php
                $temp = explode(',',$plate->ingredients);
                for($i=0 ; $i<count($temp) ; $i++) {
                    $temp[$i] = trim($temp[$i], " ");
                    $temp[$i] = Str::ucfirst($temp[$i]);
                }
                $plate->ingredients = implode(',',$temp);
            ?>
            <p>{{$plate->ingredients}} </p>
            <p>{{$plate->price}} € 
                @if($plate->visible)
                    <h3 class="visible">Il piatto è visibile</h3>
                    @else
                    <h3 class="not_visible">Il piatto NON è visibile</h3>
                @endif
                <a href="{{route("admin.plate.edit", $plate->id)}}"><button type="button" class="btn btn-primary m-3 edit">Modifica</button></a> 
                <a href="{{route("admin.plate.index")}}"><button type="button" class="btn btn-primary m-3 edit">Torna ai piatti</button></a> 
            </p>
        </div>
       

@endsection