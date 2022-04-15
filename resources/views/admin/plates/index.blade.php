
@extends('layouts.navbar_admin')

@section('content')
    <div class="container-fluid d-flex flex-wrap justify-content-around">
        <div class="col col-sm-12 col-md-10 col-lg-2 bordered text-center">
            <ul class="ul_style btn_color_add">

                <li>
                    <a href="{{route("admin.plate.create")}}"><button type="button" class="btn btn-primary m-3 make_view_category standard-button">Crea piatto</button></a>
                </li>

                <li>
                    <a href="{{route("admin.types")}}"><button type="button" class="btn btn-primary m-3 make_view_category standard-button">Visualizza categoria</button></a> 
                </li>

            </ul>
        </div>

        <div class="col col-sm-12 col-md-10 col-lg-8 p-3">
            @foreach($plates as $plate)
            <div class="container d-flex flex-column justify-content-between align-items-center border_edit_plate mb-5 p-2">
                <ul class="p-0 ul_style d-flex flex-wrap justify-content-between align-items-center w-100">
                    <div class="col-12 col-sm-6 col-md-6">
                        <h1>{{$plate->name}}</h1>
                        <?php
                            $temp = explode(',',$plate->ingredients);
                            for($i=0 ; $i<count($temp) ; $i++) {
                                $temp[$i] = trim($temp[$i], " ");
                                $temp[$i] = Str::ucfirst($temp[$i]);
                            }
                            $plate->ingredients = implode(',',$temp);
                        ?>
                        <div class="d-flex flex-wrap">
                            <strong>Ingredienti:</strong>
                            <ul class="d-sm-block d-md-block d-lg-none d-xl-none d-xxl-none d-flex align-item-start flex-wrap flex-column w-100">
                                @foreach($temp as $item)
                                <li class="li_ingredient">
                                    {{$item}}
                                </li>
                                @endforeach
                            </ul>
                            <li class="mx-2 d-none d-sm-none d-md-none d-lg-block li_ing_set">
                                {{$plate->ingredients}}
                            </li>
                        </div>
                        <div class="d-flex">
                            <strong>Prezzo:</strong> 
                            <li class="mx-2">
                                {{$plate->price}}
                            </li>
                        </div>
                        <li>
                            @if($plate->visible)
                                <h3>Il piatto è visibile</h3>
                                @else
                                    <h3>Il piatto NON è visibile</h3>
                            @endif
                        </li>
                    </div>
                    <div class="col-12 col-sm-8 col-md-6 d-flex justify-content-center">
                        @if(isset($plate->img))
                            <img src="{{asset('storage/'.$plate->img) }}" class="img_plate" alt="{{$plate->name}}">
                        @else
                            <div class="img_404"></div>
                        @endif
                    </div>
                </ul>

                <div class="d-flex flex-wrap btn_color">
                    <a href="{{route("admin.plate.show", $plate->id)}}"><button type="button" class="btn btn-primary m-3 view standard-button">Visualizza</button></a>  <!--con questo bottone richiamo la rotta plates/show dove show sarà il numero id del mio elemento.Quindi verrò indirizzato alla vista show.blade.php-->
                    <a href="{{route("admin.plate.edit", $plate->id)}}"><button type="button" class="btn btn-primary m-3 edit standard-button">Modifica</button></a>  <!--con questo bottone richiamo la rotta plates/edit dove potrò modificare il mio elemento.Quindi verrò indirizzato alla vista edit.blade.php-->
                    <form action="{{route("admin.plate.destroy", $plate->id)}}" method="POST" onsubmit="return confirm('sicuro?')">
                        @csrf
                        
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger m-3 delete standard-button">Elimina</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
  
    </div>
@endsection