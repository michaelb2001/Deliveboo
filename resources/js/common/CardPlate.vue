<template>
  <div class="card_container">
      <div class="col">
        <p class="ms_name_plate">{{plate.name}}</p>
        <p class="ms_ingredients">{{plate.ingredients}}</p>
        <p>{{plate.price}}€</p>
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

.col{
  padding: 10px;
  background: rgba( 255, 255, 255, 0.9 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 20px );
  -webkit-backdrop-filter: blur( 20px );
  border-radius: 10px;
}

</style>