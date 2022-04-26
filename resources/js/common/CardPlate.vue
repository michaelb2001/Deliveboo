<template>
  <div class="card_container">
      <div class="col">
        <div class="m-2 ms_margin d-flex justify-content-between">
          <div>
            <p class="ms_name_plate">{{plate.name}}</p>
            <p class="ms_ingredients">{{plate.ingredients}}</p>
            <p class="ms_price">{{plate.price}}€</p>
          </div>

          <div class="image">
            qua va l'image
          </div>
        </div>
      </div>
      
  </div>
</template>

<script>
export default {
    name:"CardPlate",
    props:{
        plate: Object
    }
}
</script>

<style lang="scss" scoped>
.ms_name_plate{
  font-weight: bold;
  margin-bottom: 0;
}

.ms_ingredients{
  margin-bottom: 0;
}

.ms_price{
  margin-bottom: 0;
}

.ms_margin{
  padding: 10px;
  background: rgba( 255, 255, 255, 0.9 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.2 );
  border-radius: 5px;
  transition: all 0.7s ease;
  cursor: pointer;
}


.ms_margin:hover{
    transform: scale(.9);
}

.ms_margin:active{
    transform: scale(.8);
}


.col{
  padding: 0;
}
</style>