<h1>nuova mail</h1>

<div class="main-container d-flex align-items-center flex-column">
    <div class="back text-center">
        <div>
           <!-- <h1>  </h1> 
            <p>Grazie per averci scelto !</p> -->
            <h3>Il tuo ordine :</h3>            
        </div>
        <ul>
            @foreach ($data1['plates'] as $elem)
            <li>
                {{$elem['name']}} {{$elem['pivot']['quantity']}}x 
            </li>
            @endforeach
        </ul>
        <div>
            <strong>Totale : {{$data1['total']}}</strong>
        </div>
    </div>
  </div>

  <style>
      ul{
    list-style-type: none;
    padding: 0px;
}

.back{
    background-color: #00ccbb;
    color: white;
    font-size: 15px;
    padding: 9px;
    border-radius: 10px;
    width: 80%;
    a{
        text-decoration-line: none;
    }
  }

.option-btn{
    color: $light-color;
    background-color: $primary-color;
    border: 1px solid $third-color;
    &:hover{
    color: $primary-color;
    background-color: $third-color;
    border: 1px solid $third-color;
    }
}
  </style>