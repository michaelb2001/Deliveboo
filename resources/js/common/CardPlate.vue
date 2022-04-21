<template>
  <div class="card_container">
      <div>
        <div class="col">
          <p class="ms_name_plate">{{plate.name}}</p>
          <p class="ms_ingredients">{{plate.ingredients}}</p>
          <p>{{plate.price}}€</p>
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

</style>